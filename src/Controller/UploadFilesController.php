<?php

namespace App\Controller;

use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class UploadFilesController extends AbstractController
{
    /**
     * @Route("/admin/upload/files", name="upload_files")
     */
    public function index(Request $request, FileUploader $fileUploader): Response
    {
        $uploadedFile = $request->getContent();
       $request->getContent();
        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required'.$request->getContent());
        }
        $newName = $fileUploader->upload($uploadedFile);
        return new JsonResponse($newName);
    }
}
