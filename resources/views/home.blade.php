@extends('layouts.main')

@section('title')
<title>{{ Auth::user()->name }}</title>
@endsection



@section('content')

<style>
    .card{
        margin: 200px 0px !important;
    }
    .product_buttons > div > div svg {
        max-width: 15% !important;
        height: auto;
    }
    .modal-header{
        background: #f1c40f !important;
        color: #fff !important;
    }
    .btn-info{
        background: transparent !important;
        border:1px solid #000 !important;
        color: #242424 !important; 
    }
</style>
<div class="super_container_inner">
        <div class="super_overlay"></div>
    <div class="container">
        
            <div class="products">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="section_title text-center">My Prodcuts</div>
                            </div>
                        </div>
                    
                        <div class="row products_row">
                            
            
                    @foreach ($products as $key => $product)
                        
                    <!-- Product -->
                    <div class="col-xl-4 col-md-6">
                        <div class="product">
                            <div class="product_image"><img src="{{ $product->image }}" alt=""></div>
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name"><a href="product.html">{{ $product->name }}</a></div>
                                            <div class="product_category">In <a href="category.html">Category</a></div>
                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="product_price text-right">${{ $product->price }}</div>
                                    </div>
                                </div>
                                <div class="product_buttons">
                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                            <a href="#" id="edit{{$product->id}}" data-toggle="modal" data-target="#updateModal"><div><img src="images/heart_2.svg" class="svg" alt="">
                                            <p class="text-hide">{{$product->id}}</p></div></a>
                                        </div>
                                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                            <a href="#" id="delete{{$product->id}}"><div><img src="images/delete.svg" class="svg" alt=""><p class="text-hide">{{$product->id}}</p></div></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            
                        </div>
                        <div class="row load_more_row">
                            <div class="col">
                                <div class="button load_more ml-auto mr-auto">
                                  
                                    <a  href="#"  data-toggle="modal" data-target="#myModal">
                                            Add Product
                                     </a>
                                </div>
                               
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            
       


        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Add New Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

            
                <div class="modal-body">
                     <form action="{{ url('productupload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Prodcut Name">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="action" value="create">
                            </div>
                            <div class="form-group">
                                <p>Add Imgae</p>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" name="price" class="form-control" placeholder="price">
                            </div>
                            <div class="form-group">
                            <button class="btn btn-info">Upload</button>
                            <button class="btn btn-warning">Save</button>

                            </div>
                        </form>
                </div>

            
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="updateModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

            
                <div class="modal-body">
                     <form action="{{ url('productupload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="input_name" class="form-control" placeholder="Prodcut Name">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="update_id" id="input_id">
                                <input type="hidden" name="action" value="update">
                            </div>
                            <div class="form-group">
                                <p>Add Imgae</p>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="input_description" name="description" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" name="price" id="input_price" class="form-control" placeholder="price">
                            </div>
                            <div class="form-group">
                            <button class="btn btn-info">Update</button>
                           

                            </div>
                        </form>
                </div>

            
               {{--  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> --}}

                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection

@section('script')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    }); 

     $(function(){

      

      $('[id^=delete]').each(function(index, el) {


       $(this).click(function(event) {
        
         var id = $(this).text();
        console.log(id);

        if (confirm('Are you sure you want to delete Product?')) {
          $.ajax({
              url: '/productDelete/'+id+'',
              type: "post",
              data: {

                 //get field names
                  'product_id':$(this).text(),
              }, 
              success: function(response) {
                   var type = (response.alert);
                    switch(type){
                        case 'info':
                            toastr.info(response.message);
                            break;
                        case 'warning':
                            toastr.warning(response.message);
                            break;
                        case 'success':
                            toastr.success(response.message);
                            break;
                        case 'error':
                            toastr.error(response.message);
                            break;
                   
                   }
             
              console.log(response);     
            }
          });
        } else {
           toastr.info('Product not deleted!');
        }


       

       });
       
       

      });


    });   


    $(function(){

      

      $('[id^=edit]').each(function(index, el) {


       $(this).click(function(event) {
        
         var id = $(this).text().trim();
        console.log(id);

          $.ajax({
          url: '/product/'+id+'',
          type: "post",
          data: {

          //get field names
          'edit_id':$(this).text().trim(),
          },
          success: function(response) {
          console.log(response);
          $('#modal-title').text(response.name);
          $('#input_name').val(response.name);
          $('#input_id').val(response.id);
          $('#input_description').html(response.description);
          $('#input_price').val(response.price);
                  
              
            }
          });
      

       

       });
       
       

      });


    });
        
</script>


@endsection
