@extends('admin.admin_master')

@section('admin')
<h1>Manage Products</h1>

<br>

<div class="container">
  
    <div class="card">
      
       {{-- Add brands --}}
      
          <!-- Link to add products -->
          <a href="{{ route('products.new') }}" style="color: white"><button style="width: 40%; margin: 20px 0 20px 10px" type="button" class="btn btn-primary">Add New Products Category</button>
          </a>
      

      <div class="card-footer p-3">
        {{-- datatable --}}
        <div class="card-body">
          <table id="dataTable" class="table table-striped" style="width:auto">
              <thead>
                  <tr>
                    <th>No.</th>
                    <th>Products</th>
                    <th> Name</th>
                    <th> Description</th>
                    <th> Quantity</th>
                    <th> Price</th>
                    <th>Status</th>
                    <th>Action</th>
                      
                  </tr>
              </thead>
              <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset($product->picture) }}" alt="" style="width: 70px; height:40px"></td>
                            <td>{{ $product->products_name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->status }}</td>
                            <td>
                              <a href="" class="btn btn-info">Edit</a>
                  
                              <a href="" class="btn btn-danger">Delete</a>
                          </td>
                        
                        </tr>
                    
                    @endforeach  
              </tbody>
          </table>
        </div> 
      </div>
    </div>
    
</div>




@endsection
