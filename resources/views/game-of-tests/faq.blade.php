@extends('layouts.standaard')

@section('fullWidth')
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <h2>Game of Tests!</h2>
            <p>Small demo site to show of the Game of Tests&nbsp;<a href="https://github.com/swisnl/game-of-tests-laravel" rel="external">Laravel package</a>&nbsp;and <a href="https://github.com/swisnl/game-of-tests" rel="external">library</a>.&nbsp;</p>
            <p>The Laravel package aims to enable a quick implementation of a Game of Tests in Laravel. It&nbsp;gives you a set of commands and basic templates to make your own Game of Tests.</p>
            <p>Currently it uses the <a href="https://github.com/laravel" rel="external">Laravel github organisation</a>&nbsp;as a source for tests to parse. The parser currently only supports PhpUnit, Behat and Codeception and is not really handeling cases like comments in tests very well, but hey, you shouldn't do that anyways. :)</p>
            <p>Want more parsers? Have a question? <a href="https://www.swis.nl/wie-zijn-wij/bjorn-brala">Contact me</a>&nbsp;or contribute on <a href="https://github.com/swisnl/game-of-tests">Github</a>.</p>
        </div>
    </div>
@endsection