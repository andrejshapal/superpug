<?php

use App\Mail\KeepStreak;
use App\Models\Models\Profile;
use App\Models\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $profiles = Profile::whereNot('last_streak_day', date('Y-m-d'))->with('user')->get();
    foreach($profiles as $profile){
        \Log::info('⏰ Sending email to '.$profile->user->email);
        try {
            Mail::to($profile->user)->send(new KeepStreak($profile));
        } catch (\Throwable $e) {
            // Log the error and continue the loop
            \Log::error("Error processing user {$profile->user->email}: " . $e->getMessage());
        }
    }
})->everyMinute();
