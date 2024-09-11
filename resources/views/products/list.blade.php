<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD OPERATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-2">
        <h4 class="text-white text-center">Simple Laravel CRUD Operation</h4>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
          <div class="col-md-8 d-flex justify-content-end">
            <a href="http://localhost:8000/products/create" class="btn btn-dark">create</a>

          </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
            <div class="col-md-8 mt-4">
              <div class="alert alert-success">
              {{Session::get('success')}}
              </div>
            </div>
            @endif
            <div class="col-md-8">
                <div class="card borde-0 shadow-lg my-3">
                    <div class="card-header bg-dark">
                        <h3 class="text-white"> product list</h3>
                    </div>
                        <div class="card-body">
                          <table class="table">
                            <tr>
                              <th>ID</th>
                              <th></th>
                              <th>Name</th>
                              <th>Sku</th>
                              <th>Price</th>
                              <th>Created at</th>
                              <th>Action</th>
                            </tr>
                            @if ($product->isNotEmpty())
                            @foreach ( $product as $products)
                            <tr>
                              <td>{{ $products->id }}</td>
                              <td>
                                @if($products->image !="")
                                  <img width="50" src="{{ asset('upload_image/products/'.$products->image)}}" alt="">
                                @endif
                              </td>
                              <td>{{ $products->name }}</td>
                              <td>{{ $products->sku }}</td>
                              <td>${{ $products->price }}</td>
                              <td>{{ \carbon\carbon::parse($products->created_at)->format('d M, Y') }}</td>
                              <td>
                                <a href="{{ route('products.edit',$products->id)}}" class="btn btn-dark">Edit</a>
                                <a href="{{route('products.destroy',$products->id)}}" class="btn btn-danger">Delete</a>
                             </td>
                            </tr>
                            @endforeach 
                            @endif
                          </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html> 
