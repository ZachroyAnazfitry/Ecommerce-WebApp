@extends('admin.admin_master')

@section('admin')
<h1>Manage Products</h1>

<br>

<div class="container">
  
    <div class="card" style="width: auto">
      
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
                    {{-- <th> Description</th> --}}
                    <th> Quantity</th>
                    <th> Price</th>
                    <th>Discount</th>
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
                            {{-- <td>{{ $product->description }}</td> --}}
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                              @if ($product->discount_price == NULL)
                                   <span class="badge rounded-pill bg-success">No discount</span>
                              @else
                                  {{-- calculation for discounted price --}}
                                  @php
                                      $calculated = $product->price - $product->discount_price;
                                      $final_amount = ($calculated/$product->price)*100;
                                  @endphp
                                  {{-- display calculation --}}
                                  <span class="badge rounded-pill bg-danger">{{ round($final_amount) }}%</span>

                              @endif
                            <td>
                              @if ($product->status == 1)
                                  <span class="badge rounded-pill bg-success">Active</span>
                              @else
                                  <span class="badge rounded-pill bg-danger">Inactive</span>
                              @endif
                            </td>
                            <td>
                              {{-- applied others design instead of words, use icons from font awesome --}}
                              <a href="" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="See this products details"><i class="fa-solid fa-eye"></i></a>
                              <a href="" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit this products"><i class="fa-solid fa-pen-to-square"></i></a>
                              <a href="" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove this products"><i class="fas fa-trash"></i></a>
                              {{-- to change products status --}}
                              @if ($product->status == 1)
                                <a href="" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Deactivate this product"><i class="fa-solid fa-circle-xmark"></i></a>
                              @else
                                <a href="" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Activate this product"><i class="fa-solid fa-check"></i></a>
                              @endif
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
