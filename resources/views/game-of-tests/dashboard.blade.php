@extends('layouts.standaard')

@section('fullWidth')
<div class="row">
    <div class="col-xs-12 col-md-12">
        <h1>Game of Tests for Laravel</h1>
        <p>This site shows the <a href="https://github.com/swisnl/game-of-tests-laravel">Game of Tests</a>&nbsp;for the Laravel Github organisation. Who made most tests?</p>
    </div>
</div>
@endsection

@section('leftColumn')
    @each('game-of-tests.partials.list-monthsback', $leftColumnResults, 'ranking')
@endsection

@section('middleColumn')
    @each('game-of-tests.partials.list-from-monthsback', $middleColumnResults, 'ranking')
@endsection

@section('rightColumn')
    @each('game-of-tests.partials.list-alltime', $rightColumnResults, 'ranking')
@endsection
