<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BtProject;

use AppBundle\Mapper\IssueMapper;
use AppBundle\Repository\IssueRepository;
use AppBundle\Repository\ProjectRepository;
use AppBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends Controller
{

    /**
     * @Route("/project/{btProject}/issue", methods={"post"}, requirements={"btProject": "\d+" })
     */
    public function createIssue(Request $request, IssueMapper $issueMapper,UserRepository $userRepository, IssueRepository $issueRepository, BtProject $btProject)
    {
        return new Response( $issueRepository->saveIssue( $issueMapper->parse($request, $btProject, $userRepository)), 200);
    }

    /**
     * @Route("/project/{btProject}/", methods={"get"}, requirements={"btProject": "\d+" })
     */
    public function getProject(BtProject $btProject)
    {
        return new Response( $btProject, 200);
    }

    /**
     * @Route("/project/{btProject}", methods={"DELETE"}, requirements={"btProject": "\d+"})
     */
    public function deleteProject( BtProject $btProject, ProjectRepository $projectRepository)
    {

        return new Response($projectRepository->deleteProject($btProject), 200);
    }


}
