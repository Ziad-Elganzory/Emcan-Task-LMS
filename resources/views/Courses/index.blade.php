@extends('layout.app')

@section('title','Courses')

@section('content')
        <div class="text-center">
          <a href="{{route('courses.create')}}">
            <button type="button" class="btn btn-success">Add Course</button>
          </a>
        </div>
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($Courses as $course)
                    <tr>
                        <th scope="row">{{$course->id}}</th>
                        <td>{{$course->title}}</td>
                        <td>{{$course->description}}</td>
                        <td>
                          {{-- Enroll Button here --}}
                          <a href="{{route('courses.show',$course->id)}}">
                            <button type="button" class="btn btn-info">View</button>
                          </a>
                          <a href="{{route('courses.edit',$course->id)}}">
                            <button type="button" class="btn btn-primary">Edit</button>
                          </a>
                          <form style="display: inline" action="{{route('courses.destroy',$course->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
@endsection
        
