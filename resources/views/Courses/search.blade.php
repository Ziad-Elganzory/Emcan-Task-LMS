@extends('layout.app')

@section('title','Courses')

@section('content')
        <div class="card-body mt-4">
            <h5 class="card-title">Search Results For: {{$query}}</h5>
            <br>
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
                    @foreach ($courses as $course)
                        <tr>
                            <th scope="row">{{$course->id}}</th>
                            <td>{{$course->title}}</td>
                            <td>{{$course->description}}</td>
                            <td>
                              {{-- Enroll Button here --}}
                              @if (Auth::check() && !$course->isEnrolled(Auth::id()))
                              <form style="display: inline" action="{{route('courses.enroll', $course->id)}}" method="POST">
                                  @csrf
                                  <button type="submit" class="btn btn-primary btn-md">Enroll</button>
                              </form>
                              @else
                                <button type="button" class="btn btn-outline-secondary" disabled>Enrolled</button>
                              @endif
                              <a href="{{route('courses.show',$course->id)}}">
                                <button type="button" class="btn btn-info">View</button>
                              </a>
                              @if (Auth::user()->role === 'admin')
                              <a href="{{route('courses.edit',$course->id)}}">
                                <button type="button" class="btn btn-primary">Edit</button>
                              </a>
                              <form style="display: inline" action="{{route('courses.destroy',$course->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                              @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
    
        </div>
@endsection
        
