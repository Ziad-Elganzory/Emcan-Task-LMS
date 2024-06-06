@extends('layout.app')

@section('title','Add Lesson')

@section('content')

<div class="col-7 mx-auto">
    <form action="{{route('lessons.store',$course->id)}}" method="post">
        @csrf
        @method('POST')
        <div class="h1">Add Lesson</div>
        <div class="input-group mb-3 mt-5">
            <span class="input-group-text" id="inputGroup-sizing-default">Lesson Title</span>
            <input type="text" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mt-4">
            <span class="input-group-text">Lesson content</span>
            <textarea class="form-control" name="content" aria-label="With textarea"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg mt-5">Add</button>
    </form>
</div>



@endsection