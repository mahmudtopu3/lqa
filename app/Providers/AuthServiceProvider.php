<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Question;
use App\Answer;
use App\Policies\AnswerPolicy;

use App\Policies\QuestionPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Question::class => QuestionPolicy::class,
        Answer::class => AnswerPolicy::class,

        
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Gate::define('update-question',function($user,$question){
            return $user->id === $question->user_id; //pass boolean value
        });

        \Gate::define('delete-question',function($user,$question){
            return $user->id === $question->user_id; //pass boolean value
        });

    }
}
