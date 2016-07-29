<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(\Swis\GotLaravel\Models\Results::class, function (Faker\Generator $faker) {
    $name =  $faker->name;
    // $filename, $line, $commitHash, $author, $email, $date, $parser
    return [
        'remote' => 'git@github.org:swisnl/gameoftests',
        'filename' => 'tests/MyTest.php',
        'line' => $faker->numberBetween(1, 150),
        'commitHash' => $faker->md5,
        'author' => $name,
        'author_normalized' => $name,
        'author_slug' => \Illuminate\Support\Str::slug($name),
        'email' => $faker->email,
        'date' => $faker->time(),
        'parser' => 'Swis\GoT\Parsers\PhpUnit',

    ];
});