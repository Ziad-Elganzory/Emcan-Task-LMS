<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;



class LessonsController extends Controller
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
    public function create(Course $id)
    {
        return view('Lessons.create',['course'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $id->lessons()->create($validated);

        return redirect()->route('courses.show', $id);
    }
    /**
     * Display the specified resource.
     */
    public function show(Course $id, Lesson $lid)
    {
        return view('Lessons.show', ['lesson' => $lid, 'course' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $id, Lesson $lid)
    {
        return view('Lessons.edit', ['lesson' => $lid, 'course' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $id, Lesson $lid)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $lid->update($validated);

        return redirect()->route('courses.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $id, Lesson $lid)
    {
        $lid->delete();
        return to_route('courses.show',$id);
    }
}
