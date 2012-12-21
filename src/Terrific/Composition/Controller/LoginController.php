<?php

namespace Terrific\Composition\Controller {
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Terrific\ComposerBundle\Annotation\Composer;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Doctrine\ORM\EntityManager;
    use Symfony\Component\Security\Core\SecurityContext;


    /**
     *
     */
    class LoginController extends Controller {

        /**
         * @Route("/login_check", name="login_check")
         */
        public function loginCheckAction() {

        }


        /**
         * @Route("/login", name="login")
         * @Template()
         */
        public function loginAction() {
            $request = $this->getRequest();
            $session = $request->getSession();

            // get the login error if there is one
            if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
                $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
            } else {
                $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
                $session->remove(SecurityContext::AUTHENTICATION_ERROR);
            }


            return array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME), 'error' => $error,
            );
        }

    }
}
