<?php
/**
 * Created by JetBrains PhpStorm.
 * User: blorenz
 * Date: 15.07.12
 * Time: 14:07
 */

namespace Highscore\StoreBundle\Entity {
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="project_option")
     */
    class ProjectOption extends NamedEntity
    {
        /**
         * @ORM\ManyToOne(targetEntity="ProjectVersion")
         */
        protected $projectVersion;

        /**
         * @param $projectVersion
         */
        public function setProjectVersion($projectVersion)
        {
            $this->projectVersion = $projectVersion;
        }

        /**
         * @return mixed
         */
        public function getProjectVersion()
        {
            return $this->projectVersion;
        }
    }
}