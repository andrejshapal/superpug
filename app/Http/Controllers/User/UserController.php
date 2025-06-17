<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy(int $userId): RedirectResponse
    {
        if (auth()->user()->cannot('delete', auth()->user())) {
            abort(403, 'You are not authorized to delete users.');
        }
        User::find($userId)->delete();

        return redirect('/');
    }
}
