<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(5,10)),'.'),  /* remove traling dot */
        'body'  => $faker->paragraphs(rand(3,7),true), /* make array into single paragraph with new lines */
        'views'  => rand(0,10),
        // 'answers_count'  => rand(0,10),
        'votes'  => rand(-3,10)
    ];
});


/* 
In tinker write
# factory(App\User::class,3)->create() To make 3 fake data 
# You can put this code on run method of database seed class

*/