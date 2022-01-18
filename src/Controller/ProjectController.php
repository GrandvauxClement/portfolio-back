<?php

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

class ProjectController extends AbstractController
{
    /**
     * @Route("/admin/project/delete/{id}", name="project", methods="DELETE")
     */
    public function index($id): Response
    {
        $projectToDelete = $this->getDoctrine()->getRepository(Projet::class)->find($id);
        if ($projectToDelete instanceof Projet){
            $imagesProject = $projectToDelete->getImages();
        }
        $filesystem = new Filesystem();
        foreach ($imagesProject as $image){
            $url = $this->getParameter('uploads_directory').'/'. $image;
            $filesystem->remove( $this->getParameter('uploads_directory').'/'. $image);
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($projectToDelete);
        $em->flush();

        return new JsonResponse(['response'=> true]);
    }
}
