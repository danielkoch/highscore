<?php
/**
 * Created by JetBrains PhpStorm.
 * User: blorenz
 * Date: 15.07.12
 * Time: 13:18
 */

namespace Highscore\StoreBundle\Entity {
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="project_version")
     */
    class ProjectVersion extends NamedEntity
    {

        /**
         * @ORM\ManyToOne(targetEntity="Project")
         */
        protected $project;

        /**
         * @ORM\ManyToOne(targetEntity="User")
         */
        protected $user;


        /**
         * @param $project
         */
        public function setProject(Project $project)
        {
            $this->project = $project;
        }

        /**
         * @return mixed
         */
        public function getProject()
        {
            return $this->project;
        }

        /**
         * @param $user
         */
        public function setUser($user)
        {
            $this->user = $user;
        }

        /**
         * @return mixed
         */
        public function getUser()
        {
            return $this->user;
        }
    }
}