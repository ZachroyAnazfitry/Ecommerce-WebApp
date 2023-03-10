@extends('homepage.main')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="card" style="width: 18rem;">
            <center>
                <img src="{{ asset('admin/') }}/assets/img/marie.jpg" class="rounded-circle avatar-x1 card-img-top" alt="...">
            </center>
            <div class="card-body">
              <h5 class="card-title">Name: </h5>
              <hr>
              <h5 class="card-title">Username: </h5>
              <hr>
              <h5 class="card-title">User Email:</h5>
              <hr>
              <a href="{{ route('admin.edit') }}" class="btn btn-info">Edit my profile</a>
              {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="" class="btn btn-primary">Go somewhere</a> --}}
            </div>
          </div>

    </div>
</div>
    
@endsection