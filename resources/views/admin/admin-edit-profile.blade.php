@extends('admin.admin_master')

{{-- Google jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

@section('admin')


<div class="container-fluid">
    <div class="row">

        <div class="card" style="text-align: center; width: 18rem">
            <center>
                <img id="showImage" src="{{ asset('admin/') }}/assets/img/marie.jpg" class="rounded-circle avatar-x1 card-img-top" alt="...">
            </center>
           <div class="row">
              <form action="{{ route('store.profile') }}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                  <label for="exampleFormControlInput1" class="form-label">Name</label>
                  <input type="text" class="form-control text-center" id="exampleFormControlInput1" style="border: 2px solid black" name="name"  value="{{ $admin->name }}">
                </div>
                {{-- username --}}
                <div class="mb-3 mt-3">
                  <label for="exampleFormControlInput1" class="form-label">Username</label>
                  <input type="text" class="form-control text-center" id="exampleFormControlInput1" style="border: 2px solid black" name="username" value="{{ $admin->username }}">
                </div>
                {{-- email --}}
                <div class="mb-3 mt-3">
                  <label for="exampleFormControlInput1" class="form-label">Email address</label>
                  <input type="email" class="form-control text-center" id="exampleFormControlInput1" style="border: 2px solid black" name="email" value="{{ $admin->email }}">
                </div>

                {{-- profile image --}}
                {{-- <div class="mb-3 mt-3">
                  <label for="exampleFormControlInput1" class="form-label">Profile Image</label>
                  <input type="file" class="form-control text-center" id="image" style="border: 2px solid black" name="image" value="{{ $admin->image }}">
                </div> --}}

                <button type="submit" class="btn btn-success">Update my Profile</button>
              </form>
          
            </div>

    </div>
</div>

<script type="text/javascript">
  // load document
  $(document).ready(function(){
    // call id
    $('#image').change(function(e){
      var reader = new fileReader();
      reader.onload = function(e){
        $('#showImage').attr('src', e.target.result);
      }
      // display
      reader.readAsDataUrl(e.target.files['0']);
    });
  })
</script>


    
@endsection