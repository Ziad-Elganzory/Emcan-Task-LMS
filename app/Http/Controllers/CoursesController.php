<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class CoursesController extends Controller
{
    public function index(){
        $allCourses = Course::all();
        return view('Courses.index',['Courses'=>$allCourses]);
    }

    public function create(){
        return view('Courses.create');
    }

    public function store(){
        Course::create([
            'title' => request()->title,
            'description'=> request()->description
        ]);

        return to_route('courses.index');

    }

    public function show(Course $id){
        $lessons = $id->lessons;
        return view('Courses.show',['course'=>$id,'lessons'=>$lessons]);
    }

    public function edit(Course $id){
        return view('Courses.edit',['course'=>$id]);
    }

    public function update(Course $id){

        $id->update([
            'title'=> request()->title,
            'description'=> request()->description
        ]);

        return to_route('courses.show',$id);
    }

    public function destroy(Course $id){

        $id->delete();
        return to_route('courses.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $courses = Course::where('id', $query)
                        ->orWhere('title', 'like', '%'.$query.'%')
                        ->orWhere('description', 'like', '%'.$query.'%')
                        ->get();

        return view('Courses.search', ['courses' => $courses, 'query' => $query]);
    }

}
