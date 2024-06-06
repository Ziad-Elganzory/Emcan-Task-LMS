@extends('layout.app')

@section('title','Add Course')

@section('content')

<div class="col-7 mx-auto">
    <form action="{{route('courses.store')}}" method="post">
        @csrf
        <div class="h1">Add Course</div>
        <div class="input-group mb-3 mt-5">
            <span class="input-group-text" id="inputGroup-sizing-default">Course Title</span>
            <input type="text" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mt-4">
            <span class="input-group-text">Course Description</span>
            <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg mt-5">Submit</button>
    </form>
</div>



@endsection