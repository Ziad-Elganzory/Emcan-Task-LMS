@extends('layout.app')

@section('title','Course Details')

@section('content')
        <div class="card">
            <div class="card-header">
              Course Info
            </div>
            <div class="card-body mt-4">
              <h5 class="card-title">Title: {{$course->title}}</h5>
              <p class="card-text">Course Description: {{$course->description}}</p>
              <div class="text-center">
                @if (Auth::check() && !$course->isEnrolled(Auth::id()))
                <form style="display: inline" action="{{route('courses.enroll', $course->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg">Enroll</button>
                </form>
                @else
                  <button type="button" class="btn btn-outline-secondary btn-lg" disabled>Enrolled</button>
                @endif    
              </div>
            </div>
          </div>
          <div class="card mt-4">
            <div class="card-header">
              Lessons
            </div>
            <div class="card-body mt-4">
                <div class="overflow-y-auto">
                  @if (Auth::user()->role === 'admin')
                  <div class="text-center">
                    <a href="{{route('lessons.create',$course->id)}}">
                      <button type="button" class="btn btn-success">Add Lesson</button>
                    </a>
                  </div>
                  @endif
                    <table class="table">
                        <tbody>
                            @foreach ($lessons as $lesson)
                            <tr>
                                <td class="col-9">{{$lesson->title}}</td>
                                <td>
                                    <a href="{{route('lessons.show',[$course->id,$lesson->id])}}">
                                        <button type="button" class="btn btn-info">View</button>
                                    </a>
                                    @if (Auth::user()->role === 'admin')
                                    <a href="{{route('lessons.edit',[$course->id,$lesson->id])}}">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    <form style="display: inline" method="POST" action="{{route('lessons.destroy',[$course->id,$lesson->id])}}">
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
            </div>
          </div>
@endsection