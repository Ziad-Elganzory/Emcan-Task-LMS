@extends('layout.app')

@section('title','Enrolled Courses')

@section('content')
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
                @foreach ($enrollments as $enrollment)
                    <tr>
                        <th scope="row">{{$enrollment->id}}</th>
                        <td>{{$enrollment->course->title}}</td>
                        <td>{{$enrollment->course->description}}</td>
                        <td>
                          @if (Auth::check() && $enrollment->course->isEnrolled(Auth::id()))
                          <button type="button" class="btn btn-outline-secondary" disabled>Enrolled</button>
                          <a href="{{route('courses.show',$enrollment->course->id)}}">
                            <button type="button" class="btn btn-info">View</button>
                          </a>
                          <form style="display: inline" action="{{route('user.coursesdest',$enrollment->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Quit</button>
                          </form>        
                          @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
@endsection
        
