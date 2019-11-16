<?php
namespace AppBundle\Repository;
use AppBundle\Entity\BtProject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BtProject::class);
    }

    public function saveProject(BtProject $entity) : BtProject {
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