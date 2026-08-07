@extends('dashboard.layout.main')

@section('body')


    <main class="rivo-content">

         <div class="rivo-page-header d-flex flex-wrap justify-content-between align-items-start gap-3">
          <div>
            <h1>Categories</h1>
            <div class="rivo-breadcrumb"><a href="index.html">Dashboard</a> / Category</div>
          </div>

          <a href="{{route('cat.create')}}" class="btn btn-rivo-primary"><i class="bi bi-person-plus me-2">
             </i>Add category
          </a>
        </div>


        <!-- Admins Table -->
        <div class="rivo-card" style="max-width: 500px ">
          <div class="rivo-card__header">
            <h3 class="rivo-card__title">All Categoreis</h3>
          </div>
          <div class="table-responsive">
            <table class="table rivo-table mb-0  table-sm table-borde ">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $catData as $value )
                <tr>
                  <td><strong>{{$value->name}}</strong></td>
                  <td class="align-middle text-center col-1 ">
                        <div class="d-inline-flex gap-2 ">
                          <a href="{{route('cat.edit' , $value->id)}}" class="rivo-action-btn ">
                          <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{route('cat.destroy' , $value->id)}}" method="POST" class="d-inline-block m-0 p-0">
                            @csrf
                            @method('delete')
                            <button class="rivo-action-btn danger btn_delete "
                               type="button"
                                btn_url="{{route('cat.destroy' , $value->id)}}"
                                onclick="return confirm('are you sure want to delete this product')">
                                    <i class="bi bi-trash"></i>
                            </button>
                        </form>
                            {{-- <a href="{{route('cat.edit' , $value->id)}}"
                                 class=" btn btn-sm btn-primary text-white border-0 rounded-2 p-2 d-flex align-items-center justify-content-center ">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{route('cat.destroy' , $value->id)}}" method="POST" class="m-0 p-0 d-inline">
                                @csrf
                                @method('delete')
                               <button
                                 class=" btn btn-sm btn-danger text-denger border-0 rounded-2 p-2 d-flex align-items-center justify-content-center " onclick="return confirm('are you sure want to delete this product')">
                                 <i class="bi bi-trash "></i>
                                </button>
                            </form> --}}
                        </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </main>
@endsection

@push('script')
 <script>
    $(document).on('click' , '.btn_delete' , function(e){
        e.preventDefault();
        console.log("button clicked");
        var url = $(this).attr('btn_url');
        var row = $(this).closest('tr');
        var _token ="{{csrf_token()}}";

        $.ajax({
            url:url,
            method:"POST",
            data:{
                _method:'DELETE',
                _token:_token
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
