
@foreach ($students as $std)
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
