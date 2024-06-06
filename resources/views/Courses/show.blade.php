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
                <a href="{{route('courses.create')}}">
                  <button type="button" class="btn btn-primary btn-lg">Enroll</button>
                </a>
              </div>
            </div>
          </div>
          <div class="card mt-4">
            <div class="card-header">
              Lessons
            </div>
            <div class="card-body mt-4">
                <div class="overflow-y-auto">
                  <div class="text-center">
                    <a href="{{route('lessons.create',$course->id)}}">
                      <button type="button" class="btn btn-success">Add Lesson</button>
                    </a>
                  </div>
                    <table class="table">
                        <tbody>
                            @foreach ($lessons as $lesson)
                            <tr>
                                <td class="col-9">{{$lesson->title}}</td>
                                <td>
                                    <a href="{{route('lessons.show',[$course->id,$lesson->id])}}">
                                        <button type="button" class="btn btn-info">View</button>
                                    </a>
                                    <a href="{{route('lessons.edit',[$course->id,$lesson->id])}}">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    <form style="display: inline" method="POST" action="{{route('lessons.destroy',[$course->id,$lesson->id])}}">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
          </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
@endsection