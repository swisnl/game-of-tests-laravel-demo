<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SiteTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testSeeLastThreeMonths()
    {
        $this->visit('/')
             ->see(\Carbon\Carbon::create()->format('F'));
        $this->see(\Carbon\Carbon::create()->subMonths(1)->format('F'));
        $this->see(\Carbon\Carbon::create()->subMonths(2)->format('F'));
    }

    public function testOneTestPerMonth(){
        $this->visit('/')
            ->see('No tests found.');



        $resultOne = factory(\Swis\GotLaravel\Models\Results::class)->create([
            'created_at' => \Carbon\Carbon::create()
        ]);
        $resultTwo = factory(\Swis\GotLaravel\Models\Results::class)->create([
            'created_at' => \Carbon\Carbon::create()->subMonths(1)
        ]);
        $resultThree = factory(\Swis\GotLaravel\Models\Results::class)->create([
            'created_at' => \Carbon\Carbon::create()->subMonths(2)
        ]);

        $this->visit('/')
            ->dontSee('No tests found.');

        $this->see($resultOne->author_normalized);
        $this->see($resultTwo->author_normalized);
        $this->see($resultThree->author_normalized);
        //die();
    }

    public function testUserOverview(){
        $result = factory(\Swis\GotLaravel\Models\Results::class)->create([
            'created_at' => \Carbon\Carbon::create()
        ]);
        $this->visit('/game-of-tests/' . $result->author_slug);

        $this->see($result->filename . ':' . $result->line);
        $this->see($result->parser);
        $this->see($result->remote);

    }
}
