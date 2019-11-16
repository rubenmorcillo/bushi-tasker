<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 14/11/2019
 * Time: 22:54
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bt1_company")
 */
class BtCompany
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\BtUser")
     * @ORM\JoinTable(name="bt2_company_members")
     * @var BtUser[]
     */
    private $members;


    public function __construct()
    {
        $this->members = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BtCompany
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return BtUser[]
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param BtUser[] $members
     * @return BtCompany
     */
    public function setMembers($members)
    {
        $this->members = $members;
        return $this;
    }

    public function __toString()
    {
        return $this->getName()." Id -> ".$this->getId();
    }


}