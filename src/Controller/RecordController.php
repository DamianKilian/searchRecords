<?php

namespace App\Controller;

use App\Repository\RecordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecordController extends AbstractController
{
    /**
     * @Route("/", name="searchRecords")
     */
    public function index(Request $request, RecordRepository $recordRepository): Response
    {
        $records = $recordRepository->searchRecords($request->query->all());        
        return $this->json($records);
    }
}
