<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('subjects.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        Subject::create($request->validate(['name' => 'required']));
        return redirect()->route('subjects.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $subject = Subject::with('activities')->findOrFail($id);
        return view('subjects.show', compact('subject'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $subject = Subject::findOrFail($id);
        $subject->update($request->validate(['name' => 'required']));
        return redirect()->route('subjects.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        Subject::destroy($id);
        return redirect()->route('subjects.index');
    }
    
}
