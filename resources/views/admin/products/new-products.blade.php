@extends('admin.admin_master')

@section('admin')
<h1>New Products</h1>

<br>

<div class="container">
  
  
      
       {{-- Add brands --}}
       <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Projects</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">30 done</span> this month
                  </p>
                </div>
                
              </div>
            </div>
            <div class="card-body px-0 pb-2">

              {{-- form --}}
              <div class="row">
                {{-- using same blade for store & edit --}}
            
               
                    <form action="" method="POST" id="commentForm" enctype="multipart/form-data">
                      
                      @csrf
                      <div class="card-header card-header-text card-header-info">
                          <div class="card-text">
                              {{-- <h1>@if (isset($editCategory)) Edit @else Add New @endif Products Category</h1> --}}
                          </div>
                      </div>
      
                      <div class="mb-3 mt-3">
                          <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                          <input type="text" class="form-control text-center" id="exampleFormControlInput1" style="border: 2px solid black" name="category_name" value="">
                      </div>


                      <div class="mb-3 mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                        <input type="text" class="form-control text-center" id="exampleFormControlInput1" style="border: 2px solid black" name="category_name" value="">
                      </div>
                      
      
                      <button type="submit" class="btn btn-success">Submit</button>
                      
                                              
             
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Orders overview</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> this month
              </p>
            </div>
            <div class="card-body p-3">

              {{-- forms --}}
              <div class="row">
                           
                    

                      <div class="row">
                        <div class="col">

                          <div class="mb-3 mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                            <input type="text" class="form-control text-center" id="exampleFormControlInput1" style="border: 2px solid black" name="category_name" value="">
                          </div>

                        </div>

                        <div class="col">

                          <div class="mb-3 mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                            <input type="text" class="form-control text-center" id="exampleFormControlInput1" style="border: 2px solid black" name="category_name" value="">
                          </div>

                        </div>
                      </div>

                      <div class="card-header card-header-text card-header-info">
                          <div class="card-text">
                              {{-- <h1>@if (isset($editCategory)) Edit @else Add New @endif Products Category</h1> --}}
                          </div>
                      </div>
      
                     


                     
                      
      
                      <button type="submit" class="btn btn-success">Submit</button>
                      
                                                
             
              </div>

                      </form>  

              
            </div>
          </div>
        </div>
    </div>
  
   
    
</div>




@endsection
