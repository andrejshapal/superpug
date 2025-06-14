<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Mail\KeepStreak;
use App\Models\Models\Activity;
use App\Models\Models\Challenge;
use App\Models\Models\Day;
use App\Models\Models\Difficulty;
use App\Models\Models\Plan;
use App\Models\Models\Profile;
use Illuminate\Support\Facades\Mail;

class PlanController extends Controller
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
        $pending = Day::with('challenge')->with('plan.difficulty')->whereDoesntHave('challenge', function ($query) {
            $query->where('status', 2)->where('user_id', auth()->id());
        })->whereHas('challenge', function ($query) {
            $query->where('user_id', auth()->id());
        })->orderBy('number')->limit(1)->get();

        $completed = Day::with(['challenge' => function ($query) {
            $query->where('user_id', auth()->id())->with('activity')->orderBy('status');
        }])->whereHas('challenge', function ($query) {
            $query->where('status', 2)->where('user_id', auth()->id());
        })->orderByDesc('number')->limit(5)->get();

        $profile = Profile::query()->where('user_id', auth()->id())->firstOrFail();

        if(date('Y-m-d') === $profile->last_streak_day) {
            $pending = $completed->take(1);
            $completed->shift();
        }

        if($pending->isNotEmpty()) {
            return view('path', [
                'pending'=> $pending,
                'completed'=> $completed
            ]);
        }
        return view('start', [
            'activities' => Activity::all(),
            'difficulties'=> Difficulty::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {

        $difficulty = Difficulty::query()->findOrFail($request->get('level'));

        $userId = auth()->id();
        $plan_id = Plan::query()->create([
            'user_id'      => $userId,
            'difficulty_id'     => $request->get('level'),
            'available_activities' => json_encode($request->input('fields.available')),
            'main_activities' => json_encode($request->input('fields.main')),
        ]);
        $days = [];
        for ($i = 0; $i < $difficulty->days; $i++) {
            $day = Day::query()->create([
                'plan_id' => $plan_id->id,
                'number' => $i+1,
            ]);
            $days[$i] = $day->id;
        }
        $low_priority = array_diff($request->input('fields.available'), $request->input('fields.main'));
        $high_priority = $request->input('fields.main');
        $base_exp = 5;
        $diff_exp = $base_exp*$request->get('level');
        for ($i = 0; $i < $difficulty->days; $i++) {
            shuffle($high_priority);
            $n = 0;
            foreach ($high_priority as $activity_id) {
                $exp = $diff_exp * 2;
                if($n==0){
                    $exp = $diff_exp * 3;
                    $n++;
                }
                Challenge::query()->create([
                    'user_id' =>  $userId,
                    'day_id'  =>  $days[$i],
                    'activities_id' => $activity_id,
                    'status' => 0,
                    'experience' => $exp,
                ]);
            }
            foreach ($low_priority as $activity_id) {
                Challenge::query()->create([
                    'user_id' =>  $userId,
                    'day_id'  =>  $days[$i],
                    'activities_id' => $activity_id,
                    'status' => 0,
                    'experience' => $diff_exp,
                ]);
            }
        }
        return redirect('/')->with('success', 'Plan created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
