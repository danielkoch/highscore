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
    class RelationController extends Controller
    {

        /**
         * @param $id
         * @return mixed
         */
        protected function getRelation($id, $buildNew = false)
        {
            $relation = $this->getDoctrine()->getEntityManager()->find('Highscore\StoreBundle\Entity\Relation', $id);

            if ($relation === null && $buildNew) {
                $relation = new \Highscore\StoreBundle\Entity\Relation();
            }

            return $relation;
        }


        /**
         * @Composer("Relation")
         * @Route("/relation/{id}", name="relation_show")
         * @Template()
         */
        public function indexAction($id)
        {
            return array('relation' => $this->getRelation($id));
        }

        /**
         * @Composer("Relation")
         * @Route("/relation/edit/{id}", name="relation_edit")
         * @Template()
         */
        public function editAction($id, Request $request)
        {
            $relation = $this->getRelation($id, true);

            $form = $this->createFormBuilder($relation)
                ->add('name', 'text')
                ->getForm();


            if ($request->getMethod() == 'POST') {
                $form->bindRequest($request);

                if ($form->isValid()) {
                    $this->getDoctrine()->getEntityManager()->persist($relation);
                    $this->getDoctrine()->getEntityManager()->flush();

                    return $this->redirect($this->generateUrl("relation_edit", array(
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