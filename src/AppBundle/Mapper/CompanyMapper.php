<?php

namespace AppBundle\Mapper;


use AppBundle\Entity\BtCompany;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CompanyMapper
{

    public function parse(Request $request){

        if ($request->get("name") == null){
            throw new BadRequestHttpException("ponle un nombre, cojones!");
        }
        $name = $request->get("name");
        $btCompany = new BtCompany();
        $btCompany->setName($name);

        return $btCompany;
    }

}