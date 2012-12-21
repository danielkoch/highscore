<?php
/**
 * Created by JetBrains PhpStorm.
 * User: blorenz
 * Date: 15.07.12
 * Time: 19:09
 */

namespace Terrific\Composition\Controller {
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Terrific\ComposerBundle\Annotation\Composer;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Component\HttpFoundation\Request;
    use Doctrine\ORM\EntityManager;


    /**
     *
     */
    class UserController extends Controller
    {

        /**
         * @param $id
         * @return mixed
         */
        protected function getUser($id, $buildNew = false)
        {
            $user = $this->getDoctrine()->getEntityManager()->find('Highscore\StoreBundle\Entity\User', $id);

            if ($user === null && $buildNew) {
                $user = new \Highscore\StoreBundle\Entity\User();
            }

            return $user;
        }


        /**
         * @Composer("User")
         * @Route("/user/{id}", name="user_show")
         * @Template()
         */
        public function indexAction($id)
        {
            return array('user' => $this->getUser($id));
        }

        /**
         * @Composer("User")
         * @Route("/user/edit/{id}", name="user_edit")
         * @Template()
         */
        public function editAction($id, Request $request)
        {
            $user = $this->getUser($id, true);

            $form = $this->createFormBuilder($user)
                ->add('login', 'text')
                ->add('firstname', 'text')
                ->add('lastname', 'text')
                ->add('email', 'email')
                ->add('password', 'password')
                ->getForm();


            if ($request->getMethod() == 'POST') {
                $form->bindRequest($request);

                if ($form->isValid()) {
                    $this->getDoctrine()->getEntityManager()->persist($user);
                    $this->getDoctrine()->getEntityManager()->flush();

                    return $this->redirect($this->generateUrl("user_edit", array(
                        "id" => $id
                    )));
                }
            }

            return array(
                'form' => $form->createView(),
                'id' => $id
            );
        }
    }
}