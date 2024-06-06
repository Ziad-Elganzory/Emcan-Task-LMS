<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(){
        $allCourses = [
            ['id'=>1,'Title'=>'JS','PostedBy'=>'Ziad','createdAt'=>date("Y-m-d h:i a")],
            ['id'=>2,'Title'=>'Java','PostedBy'=>'Mohamed','createdAt'=>date("Y-m-d h:i a")],
            ['id'=>3,'Title'=>'Ts','PostedBy'=>'Hamed','createdAt'=>date("Y-m-d h:i a")],

        ];
        return view('Courses.index',['Courses'=>$allCourses]);
    }

    public function create(){
        return view('Courses.create');
    }

    public function store(){
        
        $title = request()->title;
        $desc = request()->description;

        return to_route('courses.index');

    }

    public function show($courseID){
        $singleCourse = ['id'=>$courseID,'Title'=>'JavaScript','desc'=>'lorem ipsum' ];
        $lessons = [
            'Lesson 1',
            'Lesson 2',
            'Lesson 3',
    ];
        return view('Courses.show',['Course'=>$singleCourse,'lessons'=>$lessons]);
    }

    public function edit($courseID){
        $singleCourse = ['id'=>$courseID,'Title'=>'JavaScript','desc'=>'lorem ipsum' ];
        return view('Courses.edit',['course'=>$singleCourse]);
    }

    public function update($courseID){
        $title = request()->title;
        $desc = request()->description;

        return to_route('courses.show',$courseID);
    }

    public function destroy($courseID){
        return to_route('courses.index');
    }
}
