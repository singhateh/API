<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>STUDENT API </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Styles -->
   
    </head>
    @include('style')
    <body>
        <div class="card col-md-9 mx-auto">

                <a href="{{ url('/')}}" class="btn btn-info">Add</a>
            <div class="card-header" style="text-align: center; font-weight:bold;
             font-size:25px; backgroud:#fff"> RESTFUL STUDENT API</div>

             <div class=" col-md-9 mx-auto" style="margin-top:2.5rem">
            
                @if (isset($student))
                <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                
                @else
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="form-group" aria-autocomplete="none">
                    <div class="form-row">
                        <div class="col">
                        <input type="text" name="first_name"  @if (isset($student)) value="{{ $student->first_name }}" @endif 
                         class="form-control" placeholder="First Name">
                    </div>
                    <div class="col">
                        <input type="text" name="last_name" @if (isset($student)) value="{{ $student->last_name }}" @endif class="form-control" placeholder="Last Name">
                </div>
            </div>
                </div>
                <div class="form-group" aria-autocomplete="none">
                    <div class="form-row">
                        <div class="col-md-3">
                      <select name="gender" class="form-control">
                        <option value="" selected>------</option>
                        <option value="male"
                         @if (isset($student)) 
                        {{ $student->gender == 'male' || $student->gender == 'Male' ? 'selected' : '' }}
                         @endif>Male</option>
                        <option value="female"  @if (isset($student)) 
                        {{ $student->gender == 'female' || $student->gender == 'Female' ? 'selected' : '' }} 
                        @endif>Female</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                        <select name="class" class="form-control">
                          <option value="" selected  @if (isset($student)) 
                          {{ $student->class == 'class A' ? 'selected' : ''}}
                           @endif>>------</option>
                          <option value="class B"  @if (isset($student)) 
                          {{ $student->class == 'class B' ? 'selected' : ''}}
                           @endif>Class B</option>
                          <option value="class C"  @if (isset($student)) 
                          {{ $student->class == 'class C' ? 'selected' : ''}}
                           @endif>Class C</option>
                          <option value="class D"  @if (isset($student)) 
                          {{ $student->class == 'class D' ? 'selected' : ''}}
                           @endif>Class D</option>
                          <option value="class E"  @if (isset($student)) 
                          {{ $student->class == 'class E' ? 'selected' : ''}}
                           @endif>Class E</option>
                          <option value="class F"  @if (isset($student)) 
                          {{ $student->class == 'class F' ? 'selected' : ''}}
                           @endif>Class F</option>
                        </select>
                      </div>
                    <div class="col">
                        <input type="text" name="country"  @if (isset($student)) 
                       value="{{ $student->country }}"
                         @endif  class="form-control" placeholder="Country">
                </div>
            </div>
                </div>
                <div class="form-group" aria-autocomplete="none">
                    <div class="form-row">
                        <div class="col">
                        <input type="text" name="phone"  @if (isset($student)) 
                        value="{{ $student->phone }}"
                          @endif  class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="col">
                        @if (isset($student))  <img src="{{ asset('images/students/' .$student->image) }}" width="50px" alt=""> @endif
                        <input type="file" name="image"  @if (isset($student)) 
                        value="{{ $student->image }}"
                          @endif  class="form-control">
                </div>
            </div>
                </div>
                <div class="">
                <button class="btn btn-block btn-info"> Register Student</button>
            </div>
            </form>
            </div> 
        </div>

        <div class=" col-md-9 mx-auto  row watch_container" style="margin-top: 4.5rem"> 
@foreach (App\Student::paginate(6) as $std)
<div class="col-md-4">
    <div class="watch">
        <div class="watch_header d-flex justify-content-around align-items-center text-center">
        <span class="icon rounded-circle d-flex justify-content-center align-items-center text-center">
           <span>{{ $std->id }}</span>
        </span>
        <span class="name">{{ $std->first_name .' '. $std->last_name }}</span>
        </div>
        <div class="inner-border">
        <img src="{{ asset('images/students/' .$std->image) }}" width="120px" alt="sm-profile" border="0" 
        class="d-flex justify-content-center align-items-center" style="padding-top: 2rem;padding-left: 2rem;">
        </div><br>
        <span class="duration_time">Gender: {{ $std->gender}}</span><br>
        <span class="duration_time">Country: {{ $std->country }}</span><br>
        <span class="duration_time">Phone: {{ $std->phone }}</span><br>
        <span class="duration_time">Class: {{ $std->class }}</span>
        <div class="btn-group vertical-center ">
            <a href="{{ route('students.show', $std->id) }}"> <button type="submit"
                 class="btn btn-sm btn-warning">Show</button></a>
           <a href="{{ route('students.edit', $std->id) }}"> <button type="submit" 
            class="btn btn-sm btn-info" >Edit</button></a>
            <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" 
            data-target="#dialogFormDelete{{ $std->id }}">Delete</button>
        </div>
    </div>
</div>

      <!-- Modal -->
      <div class="modal fade " id="dialogFormDelete{{ $std->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header btn-danger">
              <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('students.destroy', $std->id) }}" method="post">
                @method('DELETE')
            <div class="modal-body">
             <p>Are you sure you want to Delete this student <b>( {{ $std->first_name .' '. $std->last_name }} )</b> ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-danger">Yes</button>
            </div>
        </form>
          </div>
        </div>
      </div>
  @endforeach
</div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
