<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\QuizFormType;
use App\Service\QuizLoader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuizController extends AbstractController
{
    #[Route(path: '/quiz', name: 'get_all', methods: ['GET'])]
    public function getAll(QuizLoader $quizLoader): Response
    {
        $quizzes = $quizLoader->readYamlFiles(__DIR__.'/../qzee/quiz_files');
        $tableData = [];

        foreach ($quizzes as $quiz) {
            $tableData[] = $quiz;
        }

        return $this->render('quiz/getAll.html.twig', [
            'quizzes' => $tableData,
        ]);
    }

    #[Route(path: '/quiz/add', name: 'add', methods: ['GET', 'POST'])]
    public function add(Request $request): Response
    {
        $form = $this->createForm(QuizFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // TODO
            return $this->redirectToRoute('get_all');
        }

        return $this->render('quiz/add.html.twig', [
            'form' => $form
        ]);
    }
}
