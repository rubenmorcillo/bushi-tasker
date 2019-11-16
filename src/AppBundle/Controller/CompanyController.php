<?php

namespace AppBundle\Controller;

use AppBundle\Mapper\CompanyMapper;

use AppBundle\Repository\CompanyRepository;
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
}
