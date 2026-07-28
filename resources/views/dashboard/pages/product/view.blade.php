@extends('dashboard.layout.main')

@section('body')


 <style>
    .rivo-table td,
    .rivo-table th{
        vertical-align: middle ;
    }
    .rivo-table td *{
        box-shadow: :none ;
    }
    .rivo-table tbody td{
        border: none ;
    }
    .rivo-table tr::after , .rivo-tabletr::before,
    .rivo-table td::after , .rivo-table td::before{
        display:  none ;
        content:  none;
    }
    .rivo-table *{
        box-shadow: none ;
    }
    .image-overlay-card{
        position: relative;
        display: inline-block;
        overflow: hidden;
        border: 1px solid #ddd;
        border-radius: 8px;
        transition: transform 0.3s ease ;
    }
    .image-overlay-card:hover{
        transform: scale(1.03);
        border-color: #a0a0a0;
    }
    .overlay-delete{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        visibility: hidden;
        display: flex;
        background-color: rgba(0,0,0,0.6);
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease ;
    }
    .image-overlay-card:hover .overlay-delete{
        opacity: 1;
        visibility: visible;
    }
    .overlay-delete button.btn-delete{
        border: none;
        border-radius: 50%;
        background-color: #dc3545;
        color: white;
        width: 32px;
        height: 32px;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        cursor: pointer;
        transform: translateY(10px);
        transition: all 0.3s ease 0.1s;

    }
    .image-overlay-card:hover .overlay-delete button.btn-delete{
        transform: translateY(0);
    }
    .overlay-delete button.btn-delete:hover{
        background-color: #a71d2a;
        transform: scale(1.1);
    }
    .overlay-delete button.btn-delete i{
        pointer-events: none;
    }




 </style>

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
            <table class="table rivo-table mb-0 align-middle">
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
                        <div class="d-flex gap-1 mt-1 flex-wrap rivo-table__user rivo-table__product">

                            @foreach ($value->images as $v )
                            <div class="image-overlay-card" style="width: 50px ; height:50px ;">
                                <img src="{{asset('storage/'.$v->name)}}" alt="" style="width: 50px; height:50px; object-fit: cover;">
                                    <div class="overlay-delete">

                                        <form action="{{route('product.image.delete' , $v->id)}}" method="POST" style="margin: 0;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-delete" title="delete this photo" onclick="return confirm('Are you sure want to delete this photo')">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </div>
                            </div>
                            @endforeach
                            <div><strong>{{$value->name}}</strong>
                                {{-- <div class="small text-muted">SKU: PRD-001</div> --}}
                           </div>
                        </div>
                    </td>
                    <td>${{$value->price}}</td>
                    <td><span class="rivo-badge danger">{{$value->sale}}% OFF</span></td>
                    <td>{{$value->count}}</td>
                    <td>{{$value->cat->name}}</td>
                    <td><span class="rivo-badge success">{{$value->brand}}</span></td>
                    <td class="d-flex align-items-center gap-2 mt-3 ">
                      {{-- <button class="rivo-action-btn"><i class="bi bi-eye"></i></button> --}}
                        <a href="{{route('product.edit' , $value->id)}}" class="rivo-action-btn ">
                          <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{route('product.destroy' , $value->id)}}" method="POST" class="d-inline-block m-0 p-0">
                            @csrf
                            @method('delete')
                            <button class="rivo-action-btn danger " onclick="return confirm('are you sure want to delete this product')"><i class="bi bi-trash"></i></button>
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

