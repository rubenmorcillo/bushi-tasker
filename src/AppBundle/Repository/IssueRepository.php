<?php
namespace AppBundle\Repository;
use AppBundle\Entity\BtIssue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class IssueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BtIssue::class);
    }

    public function saveIssue(BtIssue $entity) : BtIssue {
        try{
            $em = $this->getEntityManager();
            $em->getConnection()->beginTransaction();
            $em->persist($entity);
            $em->flush();
            $em->getConnection()->commit();

            return $entity;
        }catch (Exception $e){
            $em->getConnection()->rollBack();
            throw new BadRequestHttpException($e);
        }


    }



}