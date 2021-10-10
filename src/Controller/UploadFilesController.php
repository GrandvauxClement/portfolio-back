<?php

namespace App\Controller;

use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UploadFilesController extends AbstractController
{
    /**
     * @Route("/admin/upload/files", name="upload_files")
     */
    public function index(Request $request, FileUploader $fileUploader): Response
    {
        $uploadedFile = $request->files->get('file');
       $request->getContent();
        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required'.$request->getContent());
        }
        $newName = $fileUploader->upload($uploadedFile);
        return new JsonResponse($newName);
    }

    /**
     * @Route("/admin/getFiles", name="get_upload_file")
     */
    public function getFiles(SerializerInterface $serializer) {
        $errors = [['name' => "luffy-6159fca62f14e.png", 'url' => "http://127.0.0.1:8000/images/projet/luffy-6159fca62f14e.png"], ['name' => "luffy-6159fca62f14e.png", 'url' => "http://127.0.0.1:8000/images/projet/luffy-6159fca62f14e.png"]];
        $errors = $serializer->serialize($errors, 'json');
        return new Response($errors, 200, [
            'Content-Type' => 'application/json'
        ]);

    }
}
