<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="User")
 */
class User implements UserInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $signDate;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\Length(min=4, minMessage="Debe tener al menos 4 caracteres")
     * @Assert\NotBlank()
     * @var String
     */
    private $login;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\Length(min=4, minMessage="Debe tener al menos 4 caracteres")
     * @Assert\NotBlank()
     * @var String
     */
    private $nickname;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(min=6, minMessage="Debe tener al menos 6 caracteres")
     * @Assert\NotBlank()
     * @var String
     */
    private $password;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     * @var bool
     */
    private $esAdmin;

    /**
     * @ORM\Column(type="string",nullable=true)
     * @var String
     */
    private $avatar;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $credits;



    public function __construct()
    {
    }

    /**
     * @return \DateTime
     */
    public function getSignDate()
    {
        return $this->signDate;
    }

    /**
     * @param \DateTime $signDate
     * @return User
     */
    public function setSignDate(\DateTime $signDate)
    {
        $this->signDate = $signDate;
        return $this;
    }


    /**
     * @return String
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param String $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return String
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param String $nickname
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param String $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEsAdmin()
    {
        return $this->esAdmin;
    }

    /**
     * @param bool $esAdmin
     * @return User
     */
    public function setEsAdmin($esAdmin)
    {
        $this->esAdmin = $esAdmin;
        return $this;
    }

    /**
     * @return int
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * @param int $credits
     * @return User
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
        return $this;
    }

    /**
     * @return String
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param String $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }



    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }




    public function getRoles()
    {
        $roles = ['ROLE_PLAYER'];

        if ($this->isEsAdmin()){
            $roles[] = 'ROLE_ADMIN';
        }

        return $roles;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUsername()
    {
        return $this->login;
    }

    public function __toString()
    {
        return $this->getNickname();
    }


}