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
    use JMS\SecurityExtraBundle\Annotation\Secure;
    use Doctrine\ORM\EntityManager;


    /**
     *
     */
    class ProjectController extends Controller {

        protected function getProject($id, $buildNew = false) {
            $project = $this->getDoctrine()->getManager()->find('Highscore\StoreBundle\Entity\Project', $id);

            if ($project === null && $buildNew) {
                $project = new \Highscore\StoreBundle\Entity\Project();
            }

            return $project;
        }


        /**
         * @Route("/project/edit/{id}", name="project_edit")
         * @Secure(roles="ROLE_ADMIN")
         * @Template()
         */
        public function editAction($id, Request $request) {
            $project = $this->getProject($id, true);

            $form = $this->createFormBuilder($project);

            $form->add('name', 'text');

            if ($request->getMethod() == 'POST') {
                $form->bindRequest($request);

                if ($form->isValid()) {
                    $this->getDoctrine()->getManager()->persist($project);
                    $this->getDoctrine()->getManager()->flush();

                    return $this->redirect($this->generateUrl("project_list"));
                }
            }

            return array(
                'form' => $form->getForm()->createView(), 'id' => $id
            );
        }

    }
}
