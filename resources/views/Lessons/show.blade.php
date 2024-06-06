@extends('layout.app')

@section('title','Lesson Details')

@section('content')
        <div class="card">
            <div class="card-header">
              Lesson Info
            </div>
            <div class="card-body mt-4">
              <h5 class="card-title">Lesson Title: {{$lesson->title}}</h5>
              <p class="card-text">Lesson Content: {{$lesson->content}}</p>
              <br>
              <h5 class="card-title">Course Title: {{$course->title}}</h5>
              <p class="card-text">Course Description: {{$course->description}}</p>
              <div class="text-center">
                <a href="#">
                  <button type="button" class="btn btn-primary btn-lg">Watch Lesson</button>
                </a>
              </div>
            </div>
          </div>
          {{--<div class="card mt-4">
            <div class="card-header">
              Lessons
            </div>
             <div class="card-body mt-4">
                <div class="overflow-y-auto">
                    <table class="table">
                        <tbody>
                            {{-- @foreach ($lessons as $lesson)
                            <tr>
                                <td class="col-9">{{$lesson}}</td>
                                <td>
                                    <a href="#">
                                        <button type="button" class="btn btn-info">View</button>
                                    </a>
                                    <a href="#">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="#">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                              </tr>
                            @endforeach 
                        </tbody>
                      </table>
                </div>
            </div> --}}
          </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
@endsection