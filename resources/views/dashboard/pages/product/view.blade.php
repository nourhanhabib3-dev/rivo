@extends('dashboard.layout.main')

@section('body')


 <style>

    .customer{
        min-width: 180px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.5rem 1rem ;
        background-color: #ffffff;
        font-size: 0.9rem ;
        color: #334155;
        cursor: pointer;
        box-shadow: 0 1px rgba(0,0,0,0.05);
    }
    .customer:hover{
        border-color:#6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
    }
    .customer option{
        font-size: 0.95rem;
        color: #444a6c;
        background-color: #ffffff;
        padding: 10px;
    }
    .customer option:hover{
        background-color: #f1f3f9;
    }
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

        <div class="rivo-filter-bar d-flex align-items-center  mb-4 gap-3">
          <div class="rivo-search-inline flex-1">
            <i class="bi bi-search"></i>
            <input type="search" placeholder="Search products...">
          </div>
          <div style="min-width: 200px;">
          <select class="form-select customer " style="width: auto;">
            <option value="">All categories</option>
            @foreach ($cat as $option )
               <option value="{{ $option->id }}">{{$option->name}}</option>

            @endforeach
            {{-- <option>Electronics</option>
            <option>Fashion</option>
            <option>Home</option> --}}
          </select>
          </div>
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
                            <button class="rivo-action-btn danger btn_delete "
                                type="button"
                                btn_url="{{route('product.destroy' , $value->id)}}"
                                btn_id={{$value->id}}
                                onclick="return confirm('are you sure want to delete this product')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class=" d-flex justify-content-center my-4  ">
            {{$productData->links()}}
        </div>
      </main>

@endsection

@push('script')
<script>
    $(document).on('click' , '.btn_delete' , function(e){
        e.preventDefault();
        var url = $(this).attr('btn_url');
        var pro_id = $(this).attr('btn_id');
        var row = $(this).closest('tr');
        var _token = "{{csrf_token()}}";

        $.ajax({
            url:url,
            method:"POST",
            data:{
                _method:'DELETE',
                _token: _token
            },
            success:function(x){
                row.remove();
                // alert('successfully');

            },
            error:function(y){
                alert('try agin');
            }

        })
    })
</script>



@endpush

