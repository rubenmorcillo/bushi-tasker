<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BtCompany;
use AppBundle\Mapper\CompanyMapper;

use AppBundle\Mapper\ProjectMapper;
use AppBundle\Repository\CompanyRepository;
use AppBundle\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends Controller
{

    /**
     * @Route("/company", methods={"post"})
     */
    public function createCompany(Request $request, CompanyMapper $companyMapper, CompanyRepository $companyRepository)
    {
            return new Response( $companyRepository->saveCompany( $companyMapper->parse($request)), 200);
    }

    /**
     * @Route("/company/{btCompany}", methods={"get"}, requirements={"btCompany": "\d+"})
     */
    public function getOneCompany( BtCompany $btCompany)
    {
        return new Response( $btCompany, 200);
    }

    /**
     * @Route("/company/{btCompany}/project", methods={"post"}, requirements={"btCompany": "\d+"})
     */
    public function createProject(Request $request, ProjectMapper $projectMapper, ProjectRepository $projectRepository, BtCompany $btCompany)
    {
        return new Response( $projectRepository->saveProject( $projectMapper->parse($request, $btCompany)), 200);
    }


}
