<?php
/**
 * Created by JetBrains PhpStorm.
 * User: blorenz
 * Date: 15.07.12
 * Time: 14:14
 * To change this template use File | Settings | File Templates.
 */

namespace Highscore\StoreBundle\Entity {
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="option_relation")
     */
    class OptionRelation extends BaseEntity
    {

        /**
         * @ORM\ManyToOne(targetEntity="User")
         */
        protected $user;

        /**
         * @ORM\ManyToOne(targetEntity="ProjectOption")
         */
        protected $fromOption;

        /**
         * @ORM\ManyToOne(targetEntity="ProjectOption")
         */
        protected $toOption;

        /**
         * @ORM\ManyToOne(targetEntity="Relation")
         */
        protected $relation;


        public function setFromOption($fromOption)
        {
            $this->fromOption = $fromOption;
        }

        public function getFromOption()
        {
            return $this->fromOption;
        }

        public function setRelation($relation)
        {
            $this->relation = $relation;
        }

        public function getRelation()
        {
            return $this->relation;
        }

        public function setToOption($toOption)
        {
            $this->toOption = $toOption;
        }

        public function getToOption()
        {
            return $this->toOption;
        }

        public function setUser($user)
        {
            $this->user = $user;
        }

        public function getUser()
        {
            return $this->user;
        }
    }
}