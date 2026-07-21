@extends('dashboard.layout.main')


@section('body')

   <main class="rivo-content">
        <div class="rivo-page-header">
          <h1>Add New Product</h1>
          <div class="rivo-breadcrumb"><a href="index.html">Dashboard</a> / <a href="products.html">Products</a> / Add Product</div>
        </div>

        <div class="alert alert-success rivo-form-success" style="display:none;" role="alert">
          <i class="bi bi-check-circle me-2"></i>Product saved successfully! (Demo)
        </div>

        <div class="rivo-form-card">
          <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row g-4">
              <div class="col-lg-4">
                @error('img')
                  <p style="color: red">{{$message}}</p>
                @enderror
                <label class="d-block mb-2 fw-semibold">Product Image</label>
                <input value="{{old('img')}}" type="file" class="d-none" name="img[]" multiple >
                <div class="rivo-upload">
                  <i class="bi bi-image d-block"></i>
                  <p class="rivo-upload__text mb-1">Upload product image</p>
                  <small class="text-muted">Recommended 800x800px</small>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="rivo-form-group">
                    @error('name')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                  <label>Product Name</label>
                  <div class="rivo-input-wrap">
                    <input value="{{old('name')}}" type="text" class="form-control" name="name" >
                  </div>
                </div>

                <div class="row g-3">
                  <div class="col-md-6">
                    <div class="rivo-form-group">
                      <label>Category</label>
                      <div class="rivo-input-wrap">
                        @error('cat_id')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                        <select name="cat_id" class="form-select">
                          @foreach ( $cats as $value )
                          <option value="{{$value->id}}">{{$value->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="rivo-form-group">
                        @error('price')
                         <p style="color: red">{{$message}}</p>
                        @enderror
                      <label>Regular Price ($)</label>
                      <div class="rivo-input-wrap">
                        <input value="{{old('price')}}" type="number" class="form-control" name="price">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="rivo-form-group">
                        @error('sale')
                         <p style="color: red">{{$message}}</p>
                        @enderror
                      <label>Sale Price ($)</label>
                      <div class="rivo-input-wrap">
                        <input value="{{old('sale')}}" type="number" class="form-control" name="sale" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="rivo-form-group">
                        @error('count')
                         <p style="color: red">{{$message}}</p>
                        @enderror
                      <label>Stock Quantity</label>
                      <div class="rivo-input-wrap">
                        <i class="bi bi-stack"></i>
                        <input value="{{old('count')}}" type="number" class="form-control" name="count" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="rivo-form-group mb-0">
                        @error('brand')
                          <p style="color: red">{{$message}}</p>
                        @enderror
                      <label>Brand</label>
                      <div class="rivo-input-wrap">
                        <input  value="{{old('brand')}}" type="text" class="form-control" name="brand" >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4">
            <div class="d-flex gap-2 flex-wrap">
              <button type="submit" class="btn btn-rivo-primary"><i class="bi bi-check-lg me-2"></i>Publish Product</button>
              <button type="button" class="btn btn-rivo-outline rivo-form-reset"><i class="bi bi-arrow-counterclockwise me-2"></i>Reset</button>
              <a href="products.html" class="btn btn-rivo-outline">Cancel</a>
            </div>
          </form>
        </div>
      </main>


@endsection
