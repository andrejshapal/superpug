<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\DifficultyController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\RegisterUserController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\Localization;
use App\Models\Models\Profile;
use App\Models\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/', [PlanController::class, 'create'])->name('start');
    Route::put('/', [PlanController::class, 'store']);


    Route::get('activity', [ActivityController::class, 'create'])->name('activity')->middleware(IsAdmin::class);
    Route::put('activity', [ActivityController::class, 'store'])->middleware(IsAdmin::class);

    Route::get('difficulty', [DifficultyController::class, 'create'])->name('difficulty')->middleware(IsAdmin::class);
    Route::put('difficulty', [DifficultyController::class, 'store'])->middleware(IsAdmin::class);

    Route::get('item/{activityId}',  [ItemController::class, 'edit'])->name('item')->where('activityId', '[0-9]+')->middleware(IsAdmin::class);
    Route::put('item/{activityId}', [ItemController::class, 'update'])->where('activityId', '[0-9]+')->middleware(IsAdmin::class);

    Route::get('user/delete/{userId}', [UserController::class, 'destroy'])->middleware(IsAdmin::class);

    Route::get('challenge/{challengeId}/{status}',  [ChallengeController::class, 'edit'])->name('challenge')->where('challengeId', '[0-9]+')->where('status', '[0-9]+');

    Route::get('leaderboard',  [ProfileController::class, 'index'])->name('leaderboard');
    Route::get('inventory',  [ProfileController::class, 'show'])->name('inventory');

});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterUserController::class, 'create'])->name('register');

    Route::post('register', [RegisterUserController::class, 'store']);

    Route::get('login', [LoginUserController::class, 'create'])->name('login');

    Route::post('login', [LoginUserController::class, 'store']);

    Route::get('/auth/redirect', function () {

        return Socialite::driver('google')->redirect();

    })->name('google');
    Route::get('/auth2callback', function () {
        $googleUser = Socialite::driver('google')->user();

        User::withTrashed()->where('email', $googleUser->email)->restore();

        $user = User::withTrashed()->updateOrCreate([
            'email' => $googleUser->email,
        ], [
            'name' => $googleUser->name,
            'google_id' => $googleUser->id,
            'password'=>Hash::make(Str::random(32)),
        ]);

        Profile::query()->firstOrCreate(
            ['user_id' => $user->id],
            [
            'gold'=>0,
            'rest_days'=>0,
            'experience'=>0,
            'backpacks'=>0,
            'streak_days'=>0,
            'last_streak_day'=>'1970-01-01'
        ]);
        Auth::login($user);

        return redirect('/');
    });
});

Route::get('logout', [LoginUserController::class, 'destroy'])->name('logout');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, config('app.locales'))) {
        session()->put('locale', $locale);
    }
    return redirect('/');
})->name('lang');
