@extends('admin.admin_master')

@section('admin')
<h1>Brands</h1>

<div class="container">

    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
    @endif --}}
    {{-- Add brands --}}
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add New Brands
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Brands</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <form action="{{ route('brands.new') }}" method="POST">
                  @csrf
                  <div class="mb-3 mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Brand Name</label>
                    <input type="text" class="form-control text-center" id="exampleFormControlInput1" style="border: 2px solid black" name="brand_name">
                  </div>
                  {{-- username --}}
                  <div class="mb-3 mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Brand Image</label>
                    <input type="file" class="form-control text-center" id="exampleFormControlInput1" style="border: 2px solid black" name="brand_image">
                  </div>
                  {{-- email --}}
                  {{-- <div class="mb-3 mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control text-center" id="exampleFormControlInput1" style="border: 2px solid black" name="email">
                  </div> --}}
  
                  {{-- <button type="submit" class="btn btn-success">Add this Brand</button> --}}
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                  </div>
                </form>
            
              </div>
        </div>
       
      </div>
    </div>
  </div>

  {{-- datatable --}}
    <div class="card">
        <div class="card-body">
            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Brand Name</th>
                        <th>Brand Image</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td><img src="{{ asset($brand->brand_image) }}" alt="" style="width: 70px; height:40px"></td>
                            <td>
                                <a href="" class="btn btn-info">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>

                    
                        </tr>
                        
                    @endforeach
                    {{-- <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                   
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        
                    </tr> --}}
                    
                </tbody>
                <tfoot>
                    {{-- <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr> --}}
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
