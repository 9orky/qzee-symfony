<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\QuizService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuizController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function index(QuizService $quizService): Response
    {
        $quizzes = $quizService->readYamlFiles(__DIR__ . '/../qzee/quiz_files');
        $tableData = [];

        foreach ($quizzes as $quiz) {
            $tableData[] = $quiz;
        }

        return $this->render('quiz/index.html.twig', [
            'quiz' => $tableData,
        ]);
    }
}
