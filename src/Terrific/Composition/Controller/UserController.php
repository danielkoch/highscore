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
    use JMS\SecurityExtraBundle\Annotation\Secure;


    /**
     *
     */
    class UserController extends Controller {

        /**
         * @param $id
         * @return \Highscore\StoreBundle\Entity\User
         */
        protected function getDbUser($id, $buildNew = false) {
            $user = $this->getDoctrine()->getEntityManager()->find('Highscore\StoreBundle\Entity\User', $id);

            if ($user === null && $buildNew) {
                $user = new \Highscore\StoreBundle\Entity\User();
            }

            return $user;
        }

        /**
         * @Route("/user/list", name="user_list")
         * @Template()
         */
        public function listAction() {
            $qry = $this->getDoctrine()->getManager()->createQuery('SELECT U FROM Highscore\StoreBundle\Entity\User U');
            $userList = $qry->getResult();

            return array("users" => $userList);
        }

        /**
         * @Route("/user/{id}", name="user_show")
         * @Template()
         */
        public function indexAction($id) {
            return array('user' => $this->getDbUser($id));
        }

        /**
         * @Route("/user/del/{id}", name="user_delete")
         */
        public function delAction($id, Request $request) {
            $user = $this->getDbUser($id);

            $this->getDoctrine()->getManager()->remove($user);
            $this->getDoctrine()->getManager()->flush();

            $count = ($user->getId() == null ? 1 : 0);
            $result["count"] = $count;
            $result["message"] = ($count == 1 ? 'user.delete.result.success' : 'user.delete.result.error');
            $result["data"] = array("%login%" => $user->getLogin());

            $params = array('result' => $result);
            $params = array_merge($params, $this->listAction());

            return $this->render("TerrificComposition:User:list.html.twig", $params);
        }

        /**
         * @Secure(roles="ROLE_USER")
         * @Route("/user/edit/{id}", name="user_edit")
         * @Template()
         */
        public function editAction($id, Request $request) {
            $user = $this->getDbUser($id, true);

            $form = $this->createFormBuilder($user)->add('login', 'text')->add('firstname', 'text')->add('lastname', 'text')->add('email', 'email')->add('password', 'password')->getForm();


            if ($request->getMethod() == 'POST') {
                $form->bindRequest($request);

                if ($form->isValid()) {
                    $this->getDoctrine()->getEntityManager()->persist($user);
                    $this->getDoctrine()->getEntityManager()->flush();

                    return $this->redirect($this->generateUrl("user_list"));
                }
            }

            return array(
                'form' => $form->createView(), 'id' => $id
            );
        }
    }
}
