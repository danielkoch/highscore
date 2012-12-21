<?php
namespace Highscore\StoreBundle\Entity {
    use Highscore\StoreBundle\Tools\UUID;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\MappedSuperclass
     * @ORM\HasLifecycleCallbacks
     */
    abstract class BaseEntity
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        protected $id;

        /**
         * @ORM\Column(type="string")
         */
        protected $uuid;

        /**
         * @ORM\Column(type="datetime")
         */
        protected $modified;

        /**
         * @ORM\Column(type="datetime")
         */
        protected $created;

        /**
         *
         */
        public function getUuid()
        {
            return $this->uuid;
        }

        /**
         *
         */
        public function getCreated()
        {
            return $this->created;
        }

        /**
         *
         */
        public function getModified()
        {
            return $this->modified;
        }

        /**
         *
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @ORM\PrePersist
         */
        public function prePersist()
        {
            $this->created = new \DateTime();
            $this->modified = new \DateTime();
            $this->uuid = UUID::v4();
        }

        /**
         * @ORM\PreUpdate
         */
        public function preUpdate()
        {
            $this->modified = new \DateTime();
        }

        /**
         *
         * @param $offset
         */
        public function offsetExists($offset)
        {
            $value = $this->{"get$offset"}();
            return $value !== null;
        }

        /**
         *
         * @param unknown_type $offset
         * @param unknown_type $value
         */
        public function offsetSet($offset, $value)
        {
            $this->{"set$offset"}($value);
        }

        /**
         *
         * @param unknown_type $offset
         */
        public function offsetGet($offset)
        {
            return $this->{"get$offset"}();
        }

        /**
         *
         * @param unknown_type $offset
         */
        public function offsetUnset($offset)
        {
            $this->offsetSet($offset, null);
        }
    }
}
