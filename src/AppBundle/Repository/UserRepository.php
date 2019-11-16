<?php
namespace AppBundle\Repository;
use AppBundle\Entity\BtUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BtUser::class);
    }

    public function findById($id){

            return $this->createQueryBuilder('b')
                ->select('b')
                ->where('b.id = :user')
                ->setParameter('user', $id)
                ->getQuery()
                ->getResult();
    }

}