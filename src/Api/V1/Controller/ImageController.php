<?php


namespace Api\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Api\Controller\BaseController;

class ImageController extends BaseController {

    public function __construct ($request, $app)
    {
        $this->app = $app;
        $this->request = $request;
        $this->response = new Response();
    }

    public function handleUpload ($uploadFolder, $userId)
    {

        $fileinfo = $this->request->files;


        print_r ($fileinfo);
        exit;
    }



}