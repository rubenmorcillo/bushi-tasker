<?php

namespace AppBundle\Mapper;


use AppBundle\Entity\BtCompany;
use AppBundle\Entity\BtIssue;
use AppBundle\Entity\BtProject;
use AppBundle\Entity\BtUser;
use AppBundle\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class IssueMapper
{

    public function parse (Request $request, BtProject $btProject, UserRepository $userRepository) {
        $valid = true;
        if ($request->get("title") == null){
            $valid = false;
        }
//        if ($request->get("priority") == null ){
//            $valid = false;
//        }
//        if ($request->get("type") == null){
//            $valid = false;
//        }
//        if ($request->get("informer") == null ){
//            $valid = false;
//        }


        $btIssue = new BtIssue();
        $btIssue->setTitle( $request->get("title"));
        $btIssue->setDetail($request->get("detail"));
        $btIssue->setPriority($request->get("priority"));
        $btIssue->setInformer($userRepository->find($request->get("informer")));
        if ($request->get("responsable") <> null){
            $btIssue->setResponsable($request->get("responsable"));
        }

        $btIssue->setType($request->get("type"));
        $btIssue->setProject($btProject);

        if ($valid == false){
            throw new BadRequestHttpException("faltan campos para el Issue!");
        }



        return $btIssue;
    }

}