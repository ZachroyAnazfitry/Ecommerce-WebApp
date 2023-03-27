@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<h1>New Products</h1>

<br>

<div class="container-fluid">
  <div class="row">

      <div class="card" style="text-align: center;">

        <div class="card-header card-header-text card-header-primary">
          <div class="card-text">
            <h4 class="card-title">Adding New Products</h4>
          </div>
        </div>

        {{-- <h2>Adding New Products</h2> --}}
        
         <div class="card-body">
          <div class="row">
            <form action="" method="POST">
             
              @csrf

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Brand</label>
                <input type="text" class="form-control text-center" id="brand_name" style="border: 2px solid black" name="brands_id"  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Category</label>
                <input type="text" class="form-control text-center" id="brand_name" style="border: 2px solid black" name="category_id"  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Sub Category</label>
                <input type="text" class="form-control text-center" id="brand_name" style="border: 2px solid black" name="sub_category_id"  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Vendor</label>
                <input type="text" class="form-control text-center" id="brand_name" style="border: 2px solid black" name="vendor_id"  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Brand</label>
                <input type="text" class="form-control text-center" id="brand_name" style="border: 2px solid black" name="brands_id"  >
              </div>
              
              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Name</label>
                <input type="text" class="form-control text-center" id="brand_name" style="border: 2px solid black" name="brand_name"  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Code</label>
                <input type="text" class="form-control text-center" id="code" style="border: 2px solid black" name="brand_name"  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Quantity</label>
                <input type="number" min="0" class="form-control text-center" id="quantity" style="border: 2px solid black" name="brand_name"  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Tags</label>
                <input type="text" class="form-control text-center" id="tags" style="border: 2px solid black" name="brand_name"  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Size</label>
                <input type="text" class="form-control text-center" id="size" style="border: 2px solid black" name="brand_name"  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Color</label>
                <input type="text" class="form-control text-center" id="color" style="border: 2px solid black" name="brand_name"  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Description</label>
                <textarea class="form-control text-center" style="border: 2px solid black" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Images</label>
                <input type="file" class="form-control text-center" style="border: 2px solid black"
                       onchange="prod(this)" name="picture" >

                {{-- display image --}}
                <img src="" id="prodPic">
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Thumbnails</label>
                <input type="file" class="form-control text-center" style="border: 2px solid black"
                       id="thumb" name="thumbnails[]" multiple placeholder="Upload your products images" >

                {{-- display multiple images --}}
                <div class="row" id="imgThumb">

                </div>
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Price</label>
                <input type="text" class="form-control text-center" id="color" style="border: 2px solid black" name="price" multiple  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Discount Price</label>
                <input type="text" class="form-control text-center" id="color" style="border: 2px solid black" name="discount_price" multiple  >
              </div>

              <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Products Special Offer</label>
                <input type="text" class="form-control text-center" id="color" style="border: 2px solid black" name="special_offer" multiple  >
              </div>

              {{-- checkbox --}}
              <div class="row g-3">
                <div class="col md-6">
                  <div class="form-check">
                    <input class="form-check-input" name="hot_deals" type="checkbox" value="1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Hot Deals
                    </label>
                  </div>
                </div>

                <div class="col md-6">
                  <div class="form-check">
                    <input class="form-check-input" name="specification" type="checkbox" value="1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Features
                    </label>
                  </div>
                </div>

                <div class="col md-6">
                  <div class="form-check">
                    <input class="form-check-input" name="special_offer" type="checkbox" value="1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Special Offer
                    </label>
                  </div>
                </div>

              </div>

              <br>
              
        
              <a href="{{ route('products.manage') }}"><button type="button" class="btn btn-info">Back</button>
              <button type="submit" class="btn btn-success">Add new products</button>
              </a>
            </form>
        
          </div>
         </div>

      </div>
  </div>
</div>

{{-- thumbnails --}}
<script>
  function prod(input) {
    // condition
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#prodPic').attr('src', e.target.result).width(80).height(80);

      };
      reader.readAsDataURL(input.files[0]);
      
    } 
  }

</script>

{{-- for multiple images(thumbnails) --}}
<script> 
 
  $(document).ready(function(){
   $('#thumb').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element 
                      $('#imgThumb').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>



@endsection
