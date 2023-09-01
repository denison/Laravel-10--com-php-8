<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateQuizSubmissionsTableSetSubscriptionMemberId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('quiz_submissions')
            ->join('quizzes', 'quiz_submissions.quiz_id', 'quizzes.id')
            ->join('subscriptions', 'quizzes.subscription_id', 'subscriptions.id')
            ->join(
                'subscription_member', 
                function ($query)
                {
                    $query->on('quizzes.subscription_id', 'subscriptions.id')
                        ->on('subscription_member.user_id', 'quiz_submissions.user_id');
                }
            )
            ->update(
                [
                    'quiz_submissions.subscription_member_id' => \DB::raw('subscription_member.id'),
                ]
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
