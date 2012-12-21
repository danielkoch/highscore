<?php
/**
 * Created by JetBrains PhpStorm.
 * User: blorenz
 * Date: 15.07.12
 * Time: 13:04
 */

namespace Highscore\StoreBundle\Entity {
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\MappedSuperclass
     */
    abstract class NamedEntity extends BaseEntity
    {
        /**
         * @ORM\Column(type="string", length=255)
         */
        protected $name;

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param $val
         */
        public function setName($val)
        {
            $this->name = $val;
        }
    }
}
