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
    use Symfony\Component\Security\Core\User\UserInterface;

    /**
     * @ORM\Entity
     * @ORM\Table(name="user")
     */
    class User extends BaseEntity implements UserInterface {
        /**
         * @ORM\Column(type="string", length=255)
         * @Assert\NotBlank()
         * @Assert\MinLength(5)
         */
        protected $login;

        /**
         * @ORM\Column(type="string", length=255)
         */
        protected $password;

        /**
         * @ORM\Column(type="string", length=255)
         */
        protected $firstname;

        /**
         * @ORM\Column(type="string", length=255)
         */
        protected $lastname;

        /**
         * @ORM\Column(type="string", length=255)
         */
        protected $email;

        /**
         * Returns the roles granted to the user.
         *
         * <code>
         * public function getRoles()
         * {
         *     return array('ROLE_USER');
         * }
         * </code>
         *
         * Alternatively, the roles might be stored on a ``roles`` property,
         * and populated in any number of different ways when the user object
         * is created.
         *
         * @return Role[] The user roles
         */
        public function getRoles() {
            return array("ROLE_USER");
        }

        /**
         * Returns the salt that was originally used to encode the password.
         *
         * This can return null if the password was not encoded using a salt.
         *
         * @return string The salt
         */
        public function getSalt() {
            return null;
        }

        /**
         * Returns the username used to authenticate the user.
         *
         * @return string The username
         */
        public function getUsername() {
            return $this->login;
        }

        /**
         * Removes sensitive data from the user.
         *
         * This is important if, at any given point, sensitive information like
         * the plain-text password is stored on this object.
         *
         * @return void
         */
        public function eraseCredentials() {
            $this->password = null;
        }


        /**
         * @Assert\True(message = "The password doesn't match ruleset. ")
         */
        public function isPasswordLegal() {
            return true;
        }

        /**
         * @param $email
         */
        public function setEmail($email) {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getEmail() {
            return $this->email;
        }

        /**
         * @param $firstname
         */
        public function setFirstname($firstname) {
            $this->firstname = $firstname;
        }

        /**
         * @return mixed
         */
        public function getFirstname() {
            return $this->firstname;
        }

        /**
         * @param $lastname
         */
        public function setLastname($lastname) {
            $this->lastname = $lastname;
        }

        /**
         * @return mixed
         */
        public function getLastname() {
            return $this->lastname;
        }

        /**
         * @param $login
         */
        public function setLogin($login) {
            $this->login = $login;
        }

        /**
         * @return mixed
         */
        public function getLogin() {
            return $this->login;
        }

        /**
         * @param $password
         */
        public function setPassword($password) {
            $this->password = $password;
        }

        /**
         * @return mixed
         */
        public function getPassword() {
            return $this->password;
        }
    }
}
