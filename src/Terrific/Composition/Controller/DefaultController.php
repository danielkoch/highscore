<?php

namespace Terrific\Composition\Controller {
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Terrific\ComposerBundle\Annotation\Composer;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Doctrine\ORM\EntityManager;


    /**
     *
     */
    class DefaultController extends Controller
    {
        /**
         * @Composer("Home")
         * @Route("/", name="home")
         * @Template()
         */
        public function indexAction()
        {
            return array();
        }
    }
}
