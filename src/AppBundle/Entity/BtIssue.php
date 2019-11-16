<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 14/11/2019
 * Time: 22:41
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Console\Helper\ProcessHelper;

/**
 * @ORM\Entity
 * @ORM\Table(name="bt1_issue")
 */
class BtIssue
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
    private $title;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $desc;

    /**
     * @ORM\Column(type="string", columnDefinition="enum('history', 'task', 'error')")
     * @var string
     */
    private $type;

    /**
     * @ORM\Column(type="string", columnDefinition="enum('highest','high', 'medium', 'low')")
     * @var string
     */
    private $priority;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BtProject")
     * @ORM\JoinColumn(nullable=false)
     * @var BtProject
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BtUser")
     * @ORM\JoinColumn(nullable=false)
     * @var BtUser
     */
    private $informer;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BtUser")
     * @var BtUser
     */
    private $responsable;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return BtIssue
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     * @return BtIssue
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BtIssue
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $priority
     * @return BtIssue
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return BtProject
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param BtProject $project
     * @return BtIssue
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }

    /**
     * @return BtUser
     */
    public function getInformer()
    {
        return $this->informer;
    }

    /**
     * @param BtUser $informer
     * @return BtIssue
     */
    public function setInformer($informer)
    {
        $this->informer = $informer;
        return $this;
    }

    /**
     * @return BtUser
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * @param BtUser $responsable
     * @return BtIssue
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
        return $this;
    }



}