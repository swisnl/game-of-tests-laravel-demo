<?php

namespace App\Http\Controllers;


use App\ResultsService;
use Illuminate\Http\Request;

class GameOfTestsController extends Controller
{
    public function index(ResultsService $resultsService)
    {
        return view(
            'game-of-tests.dashboard',
            [
                'leftColumnResults' => [
                    $resultsService->scoreForMonth(0),
                    $resultsService->scoreForMonth(1),
                    $resultsService->scoreForMonth(2),
                ],
                'middleColumnResults' => [
                    $resultsService->scoreLastMonths(1),
                    $resultsService->scoreLastMonths(3),
                    $resultsService->scoreLastMonths(6),
                ],
                'rightColumnResults' => [
                    $resultsService->alltime(),
                ],
            ]
        );
    }

    public function user($user, Request $request, ResultsService $resultsService)
    {
        return view(
            'vendor.game-of-tests.results.author',
            [
                'results' => $resultsService->resultForUser(
                    $user,
                    $request->input('monthsBack', false),
                    $request->input('fromMonthsBack', false)
                ),
            ]
        );
    }
}
