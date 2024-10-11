<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($subjectId) {
        $subject = Subject::with('activities')->findOrFail($subjectId);
        return view('activities.index', compact('subject'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create($subjectId) {
        $subject = Subject::findOrFail($subjectId);
        return view('activities.create', compact('subject'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $subjectId) {
        $subject = Subject::findOrFail($subjectId);
        $subject->activities()->create($request->validate([
            'type' => 'required',
            'grade' => 'required|numeric',
            'date' => 'required|date',
            'note' => 'nullable',
        ]));
        return redirect()->route('subjects.show', $subjectId);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity) {
        return view('activities.show', compact('activity'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($subjectId, $activityId) {
        $subject = Subject::findOrFail($subjectId);
        $activity = Activity::findOrFail($activityId);
        return view('activities.edit', compact('subject', 'activity'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $subjectId, $activityId) {
        $activity = Activity::findOrFail($activityId);
        $activity->update($request->validate([
            'type' => 'required',
            'grade' => 'required|numeric',
            'date' => 'required|date',
            'note' => 'nullable',
        ]));
        return redirect()->route('subjects.show', $subjectId);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($subjectId, $activityId) {
        Activity::destroy($activityId);
        return redirect()->route('subjects.show', $subjectId);
    }
    
}
