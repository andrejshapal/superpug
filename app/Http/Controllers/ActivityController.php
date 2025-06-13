<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activity', [
            'activities' => Activity::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        Activity::query()->create([
            'name'      => $request->get('name'),
            'unit'     => $request->get('unit'),
        ]);

        return redirect()->back()->with('success', 'Activity added successfully!');
    }
}
