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
     * @ORM\Column(type="string")
     * @var string
     */
    private $detail;

    /**
     * @ORM\Column(type="string", columnDefinition="enum('history', 'task', 'error')")
     * @var string
     */
    private $type;

    /**
     * @ORM\Column(type="string",  columnDefinition="enum('highest','high', 'medium', 'low')")
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BtUser", cascade={"refresh"})
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return BtIssue
     */
    public function setTitle(string $title): BtIssue
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDetail(): string
    {
        return $this->detail;
    }

    /**
     * @param string $detail
     * @return BtIssue
     */
    public function setDetail(string $detail): BtIssue
    {
        $this->detail = $detail;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BtIssue
     */
    public function setType(string $type): BtIssue
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getPriority(): string
    {
        return $this->priority;
    }

    /**
     * @param string $priority
     * @return BtIssue
     */
    public function setPriority(string $priority): BtIssue
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return BtProject
     */
    public function getProject(): BtProject
    {
        return $this->project;
    }

    /**
     * @param BtProject $project
     * @return BtIssue
     */
    public function setProject(BtProject $project): BtIssue
    {
        $this->project = $project;
        return $this;
    }

    /**
     * @return BtUser
     */
    public function getInformer(): BtUser
    {
        return $this->informer;
    }

    /**
     * @param BtUser $informer
     * @return BtIssue
     */
    public function setInformer(BtUser $informer): BtIssue
    {
        $this->informer = $informer;
        return $this;
    }

    /**
     * @return BtUser
     */
    public function getResponsable(): BtUser
    {
        return $this->responsable;
    }

    /**
     * @param BtUser $responsable
     * @return BtIssue
     */
    public function setResponsable(BtUser $responsable): BtIssue
    {
        $this->responsable = $responsable;
        return $this;
    }

    public function __toString()
    {
        return $this->getTitle().": ".$this->getDetail();
    }


}