<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 14/11/2019
 * Time: 23:00
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bt1_project")
 */
class BtProject
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
     * @ORM\Column(type="string")
     * @var string
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="BtCompany")
     * @ORM\JoinColumn(nullable=false)
     * @var BtCompany
     */
    private $company;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BtIssue", mappedBy="project", orphanRemoval=true)
     * @var BtIssue[]
     */
    private $issues;

    /**
     * BtProject constructor.
     */
    public function __construct()
    {
        $this->issues = new ArrayCollection();
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
     * @return BtProject
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return BtProject
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return BtCompany
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param BtCompany $company
     * @return BtProject
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return BtIssue[]
     */
    public function getIssues(): array
    {
        return $this->issues;
    }

    /**
     * @param BtIssue[] $issues
     * @return BtProject
     */
    public function setIssues(array $issues): BtProject
    {
        $this->issues = $issues;
        return $this;
    }



    public function __toString()
    {
        return "Proyecto ".$this->getName()." (".$this->getCode().") "." Company: ".$this->getCompany()->getName();
    }

}