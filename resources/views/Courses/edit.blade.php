@extends('layout.app')

@section('title','Edit Course')

@section('content')

<div class="col-7 mx-auto">
    <form method="POST" action="{{route('courses.update',$course['id'])}}">
        @csrf
        @method('PUT')
        <div class="h1">Edit Course {{$course['id']}}</div>
        <div class="input-group mb-3 mt-5">
            <span class="input-group-text" id="inputGroup-sizing-default">Course Title</span>
            <input type="text" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mt-4">
            <span class="input-group-text">Course Description</span>
            <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg mt-5">Update</button>
    </form>
</div>



@endsection