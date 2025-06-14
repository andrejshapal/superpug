<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDifficultyRequest;
use App\Models\Models\Difficulty;

class DifficultyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('difficulty', [
            'difficulties' => Difficulty::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDifficultyRequest $request)
    {
        Difficulty::query()->create([
            'name'      => $request->get('name'),
            'days'     => $request->get('days'),
        ]);

        return redirect()->back()->with('success', 'Difficulty added successfully!');
    }
}
