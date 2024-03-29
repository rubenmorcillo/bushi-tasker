<?php
namespace AppBundle\Repository;
use AppBundle\Entity\BtCompany;
use AppBundle\Entity\BtUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\ORMException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CompanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BtCompany::class);
    }

    public function saveCompany(BtCompany $company){
        try{
            $this->getEntityManager()->persist($company);
            $this->getEntityManager()->flush();

            return $company;
        }catch (ORMException $e){
            throw new BadRequestHttpException($e);
        }

    }

    public function getAllCompaniesByUser(BtUser $btUser){
        try{
            return $this->createQueryBuilder('c')
                ->innerJoin('c.members', 's', 'WITH', 's.id = :user')
                ->setParameter('user', $btUser)
                ->getQuery()
                ->getResult();
        }catch (Exception $e){
            throw new BadRequestHttpException($e);
        }

    }

    public function deleteCompany(BtCompany $btCompany, ProjectRepository $projectRepository){
        try{
            $this->getEntityManager()->remove($btCompany);
            $this->getEntityManager()->flush();
        }catch (ORMException $e){
            throw new Exception($e->getMessage(),404);
        }
    }





}