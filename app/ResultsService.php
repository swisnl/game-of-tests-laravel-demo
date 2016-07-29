<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Swis\GotLaravel\Models\ResultsRepository;

class ResultsService extends Controller
{

    /**
     * Show tests of all time
     *
     * @return mixed
     */
    public function alltime()
    {
        $repos = new ResultsRepository();
        return [
            'title' => 'All time',
            'results' => $repos->getScorePerUser()];
    }

    /**
     * Show rankings of specific month
     *
     * @param int $monthsBack Score for specific month
     * @return mixed
     */
    public function scoreForMonth($monthsBack = 0)
    {
        $repos = new ResultsRepository();
        $title = Carbon::createFromDate()->subMonths($monthsBack)->format('F');

        return [
            'title' => $title,
            'months_back' => $monthsBack,
            'results' => $repos->getScoreForMonth($monthsBack),
        ];
    }

    /**
     * Show rankings for last X months
     *
     * @param int $monthsBack Score for specific month
     * @return mixed
     */
    public function scoreLastMonths($monthsBack = 1)
    {
        $repos = new ResultsRepository();

        return [
            'title' => ($monthsBack === 1) ? 'Last 31 days' : 'Last ' . $monthsBack . ' ' . str_plural('month', $monthsBack),
            'type' => 'from',
            'months_back' => $monthsBack,
            'results' => $repos->getScoreLastMonths($monthsBack),
        ];
    }

    /**
     * Show result for specific user.
     *
     * @param $user
     * @param bool|int $monthsBack Score for specific month
     * @param bool|int $fromMonthsBack Score starting this amount of months back
     * @return mixed
     */
    public function resultForUser($user, $monthsBack = false, $fromMonthsBack = false)
    {
        $repos = new ResultsRepository();
        $results = $repos->getByUser(
            $user,
            $monthsBack,
            $fromMonthsBack
        );
        return $results;
    }
}
