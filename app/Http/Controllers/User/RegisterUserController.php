<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Models\Profile;
use App\Models\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::query()->create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => bcrypt($request->get('password'))
        ]);

        Profile::query()->create([
            'user_id'=>$user->id,
            'gold'=>0,
            'rest_days'=>0,
            'experience'=>0,
            'backpacks'=>0,
            'streak_days'=>0,
            'last_streak_day'=>'1970-01-01'
        ]);

        Auth::login($user);

        return redirect('/')
            ->with('flash_notification.message', 'User registered successfully')
            ->with('flash_notification.level', 'success');
    }
}
