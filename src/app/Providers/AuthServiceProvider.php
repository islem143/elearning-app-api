<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\Module' => 'App\Policies\ModulePolicy',
         'App\Models\Course' => 'App\Policies\CoursePolicy',
         'App\Models\Quiz' => 'App\Policies\QuizPolicy',
         'App\Models\User' => 'App\Policies\UserPolicy',
         'App\Models\Choice' => 'App\Policies\ChoicePolicy',
         'App\Models\Question' => 'App\Policies\QuestionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user, $ability) {
            return $user->hasRole("super-admin") ? true : null;
        });


        //
    }
}
