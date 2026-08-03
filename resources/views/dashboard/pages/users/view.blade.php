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

    .pagination .page-item.active .page-link{
        background-color: #ffc933 ;
        border-color: #ffc933;
        color: #ffffff;
    }

    .pagination .page-link{
        color: #ffc933
    }
    .pagination .page-link:hover{
        background-color: #f8f9fa;
        color: #ffc933 ;
    }
</style>

      <main class="rivo-content">
        <div class="rivo-page-header d-flex flex-wrap justify-content-between align-items-start gap-3">
          <div>
            <h1>User</h1>
            <div class="rivo-breadcrumb"><a href="index.html">Dashboard</a> / User</div>
          </div>
        </div>


        <!-- User Table -->
        <div class="rivo-card">
          <div class="rivo-card__header">
            <h3 class="rivo-card__title">All the Users</h3>
          </div>
          <div class="table-responsive">
            <table class="table rivo-table mb-0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ( $userData as $value)
                <tr>
                  <td>{{$value->name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->created_at}}</td>
                  <td class="d-flex">
                    <a href="{{route('user.edit' , $value->id)}}" class="rivo-action-btn ">
                        <i class="bi bi-pencil"></i>
                    </a>
                        <form action="{{route('dash.users.index' , $value->id)}}" method="POST" class="d-inline-block m-0 p-0">
                            @csrf
                            @method('delete')
                            <button class="rivo-action-btn danger " onclick="return confirm('Are you sure want to delete this person')">
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
            {{$userData->links()}}
        </div>
      </main>

@endsection

