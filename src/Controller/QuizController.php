<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\QuizFormType;
use App\Service\QuizService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuizController extends AbstractController
{
    #[Route(path: '/quiz', name: 'app_quiz', methods: ['GET'])]
    public function index(QuizService $quizService): Response
    {
        $quizzes = $quizService->readYamlFiles(__DIR__.'/../qzee/quiz_files');
        $tableData = [];

        foreach ($quizzes as $quiz) {
            $tableData[] = $quiz;
        }

        return $this->render('quiz/index.html.twig', [
            'quizzes' => $tableData,
        ]);
    }

    #[Route(path: '/quiz', name: 'app_quiz_add', methods: ['POST'])]
    public function addQuiz(): Response
    {
        $form = $this->createForm(QuizFormType::class);

        return $this->render('quiz/index.html.twig', [
            'quiz_form' => $form
        ]);
    }
}
