<?php
/**
 * Created by JetBrains PhpStorm.
 * User: blorenz
 * Date: 15.07.12
 * Time: 10:42
 * To change this template use File | Settings | File Templates.
 */
namespace Highscore\StoreBundle\Entity {
    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;

    /**
     * @ORM\Entity
     * @ORM\Table(name="user")
     */
    class User extends BaseEntity
    {
        /**
         * @ORM\Column(type="string", length="255")
         * @Assert\NotBlank()
         * @Assert\MinLength(5)
         */
        protected $login;

        /**
         * @ORM\Column(type="string", length="255")
         */
        protected $password;

        /**
         * @ORM\Column(type="string", length="255")
         */
        protected $firstname;

        /**
         * @ORM\Column(type="string", length="255")
         */
        protected $lastname;

        /**
         * @ORM\Column(type="string", length="255")
         */
        protected $email;


        /**
         * @Assert\True(message = "The password doesn't match ruleset. ")
         */
        public function isPasswordLegal()
        {
            return true;
        }

        /**
         * @param $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param $firstname
         */
        public function setFirstname($firstname)
        {
            $this->firstname = $firstname;
        }

        /**
         * @return mixed
         */
        public function getFirstname()
        {
            return $this->firstname;
        }

        /**
         * @param $lastname
         */
        public function setLastname($lastname)
        {
            $this->lastname = $lastname;
        }

        /**
         * @return mixed
         */
        public function getLastname()
        {
            return $this->lastname;
        }

        /**
         * @param $login
         */
        public function setLogin($login)
        {
            $this->login = $login;
        }

        /**
         * @return mixed
         */
        public function getLogin()
        {
            return $this->login;
        }

        /**
         * @param $password
         */
        public function setPassword($password)
        {
            $this->password = md5($password);
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }
    }
}