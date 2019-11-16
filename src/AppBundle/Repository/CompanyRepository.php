<?php
namespace AppBundle\Repository;
use AppBundle\Entity\BtCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
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
        }catch (Exception $e){
            throw new BadRequestHttpException($e);
        }

    }

}