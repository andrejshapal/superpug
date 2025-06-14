<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\UpdateChallengeRequest;
use App\Models\Models\Challenge;
use App\Models\Models\Profile;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChallengeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Challenge $challenge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $challengeId, int $status)
    {
        $challenge = Challenge::query()->findOrFail($challengeId);
        if($challenge->user_id != auth()->id()){
            abort(403, 'Access Denied');
        }
        if($challenge->status === 0 && $status === 1){
            $challenge->updateOrFail(['status'=>1]);
            return redirect()->back()->with('success', 'Challenge updated successfully!');
        }
        if($challenge->status === 1 && $status === 2){
            $profile = Profile::query()->where('user_id', auth()->id())->firstOrFail();
            $profile->updateOrFail(['experience'=>($profile->experience + $challenge->experience)]);
            if(date('Y-m-d') != $profile->last_streak_day) {
                $profile->updateOrFail(['streak_days' => $profile->streak_days + 1, 'last_streak_day' => date('Y-m-d')]);
            }
            $challenge->updateOrFail(['status'=>2]);
            return redirect()->back()->with('success', 'Challenge updated successfully!');
        }
        abort(500, 'Something went wrong updating challenge status!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChallengeRequest $request, Challenge $challenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        //
    }
}
