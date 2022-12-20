<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Ajax Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                
            </div>
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="text-center mt-5">Laravel Crud Ajax</h1>
                        <a href="" class="btn btn-sm btn-success my-3" data-bs-toggle="modal" data-bs-target="#addProductModel">Add Product</a>
                        <input type="text" name="search" id="search" class="form-control mb-3" placeholder="Search Here....">
                    </div>
                    <div class="card-body">
                        
                        <table class="table table-bordered">
                            <thead>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $key=>$product)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <a href="" 
                                                class="btn btn-sm btn-primary showValueUpdateFrom" data-bs-toggle="modal" data-bs-target="#editProductModel" 
                                                data-id="{{ $product->id }}"
                                                data-name="{{ $product->name }}"
                                                data-price="{{ $product->price }}"
                                                ><i class="las la-edit"></i>
                                            </a>
                                            <a href="" 
                                                class="btn btn-sm btn-danger delete_product"
                                                data-id="{{ $product->id }}"
                                                >
                                                <i class="las la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('inlcude.add_product_modal')
    @include('inlcude.edit_product_modal')
    @include('inlcude.footer')
    {!! Toastr::message() !!}
  </body>
</html>
