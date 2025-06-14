<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateItemRequest;
use App\Models\Models\Activity;
use App\Models\Models\Difficulty;
use App\Models\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($activityId)
    {

        return view('item', [
            'activity' => Activity::findOrFail($activityId),
            'items' => Difficulty::with(['item' => function ($query) use ($activityId) {
                $query->where('activities_id', $activityId);
            }])->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, $activityId)
    {
        foreach ($request->get('fields') as $id => $field) {
            if($field['from'] && $field['to']) {
                Item::query()->updateOrCreate(
                    ['activities_id' => $activityId, 'difficulty_id' => $id],
                    ['from' => $field['from'], 'to' => $field['to']]
                );
            }
        }
        return redirect('/activity')->with('success', 'Item updated successfully!');}
}
