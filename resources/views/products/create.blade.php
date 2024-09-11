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
            <a href="{{route ('products.index')}}" class="btn btn-dark">back</a>

          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card borde-0 shadow-lg my-3">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">create product</h3>
                    </div>
                        <form action="{{route('products.stores')}}" method="POST" multipart="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-2">
                                    <label for="" class="form-lable h6">Name</label>
                                    <input value="{{ old('name') }}" type="text" class="@error ('name') is-invalid @enderror form-control form-control-lg" placeholder="name" name="name">
                                    @error('name')
                                    <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                                </div>
                            <div class="mb-2">
                                    <label for="" class="form-lable h6">Sku</label>
                                    <input value="{{ old('sku') }}" type="text" class="@error ('sku') is-invalid @enderror form-control form-control-lg" placeholder="sku" name="sku">
                                    @error('sku')
                                    <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="mb-2">
                                    <label for="" class="form-lable h6">Price</label>
                                    <input value="{{ old('price') }}" type="text" class="@error ('price') is-invalid @enderror form-control form-control-lg" placeholder="price" name="price">
                                    @error('price')
                                    <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="mb-2">
                                    <label for="" class="form-lable h6">Description</label>
                                    <textarea class="form-control" name="description" cols="30" rows="5" placeholder="Desciption">{{ old('sku') }}</textarea>
                            </div>
                            <div class="mb-2">
                                    <label for="" class="form-lable h6">Image</label>
                                    <input type="file" class="form-control form-control-lg" placeholder="price" name="image">
                            </div>
                            <div class="d-grid">
                                    <button class="btn btn-lg btn-primary">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
</html> 