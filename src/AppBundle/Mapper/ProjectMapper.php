<?php

namespace AppBundle\Mapper;


use AppBundle\Entity\BtCompany;
use AppBundle\Entity\BtProject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ProjectMapper
{

    public function parse (Request $request, BtCompany $btCompany) {
        $valid = true;
        if ($request->get("name") == null){
            $valid = false;
        }
        if ($request->get("code") == null ){
            $valid = false;
        }


        $name = $request->get("name");
        $code = $request->get("code");
        $btProject = new BtProject();
        $btProject->setName($name);
        $btProject->setCode($code);
        $btProject->setCompany($btCompany);

        if ($valid == false){
            throw new BadRequestHttpException("faltan campos para el project!");
        }

        return $btProject;
    }

}