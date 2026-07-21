@extends('dashboard.layout.main')

@section('body')

      <main class="rivo-content">
        <div class="rivo-page-header d-flex flex-wrap justify-content-between align-items-start gap-3">
          <div>
            <h1>Products</h1>
            <div class="rivo-breadcrumb"><a href="index.html">Dashboard</a> / Products</div>
          </div>
          <a href="{{route('product.create')}}" class="btn btn-rivo-primary"><i class="bi bi-plus-lg me-2"></i>Add Product</a>
        </div>

        <div class="rivo-filter-bar">
          <div class="rivo-search-inline">
            <i class="bi bi-search"></i>
            <input type="search" placeholder="Search products...">
          </div>
          <select class="form-select" style="width: auto;">
            <option>All Categories</option>
            <option>Electronics</option>
            <option>Fashion</option>
            <option>Home</option>
          </select>
        </div>

        <div class="rivo-card">
          <div class="table-responsive">
            <table class="table rivo-table mb-0">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Sale</th>
                  <th>Stock</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $productData as $value )
                <tr>
                  <td>
                    <div style="display: flex; gap:5px; margin-botton:5px;" class="rivo-table__user rivo-table__product">
                    @foreach ($value->images as $v )
                    <img src="{{asset('storage/'.$v->name)}}" alt="" style="width: 50px; height:50px; object-fit: cover;">
                    @endforeach
                    <div><strong>{{$value->name}}</strong><div class="small text-muted">SKU: PRD-001</div></div></div>
                  </td>
                  <td>${{$value->price}}</td>
                  <td><span class="rivo-badge danger">{{$value->sale}}% OFF</span></td>
                  <td>{{$value->count}}</td>
                  <td>{{$value->cat->name}}</td>
                  <td><span class="rivo-badge success">{{$value->brand}}</span></td>
                  <td class="d-flex">
                    <button class="rivo-action-btn"><i class="bi bi-eye"></i></button>
                    <button class="rivo-action-btn"><i class="bi bi-pencil"></i></button>
                    <form action="{{route('product.destroy' , $value->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="rivo-action-btn danger"><i class="bi bi-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </main>

@endsection

