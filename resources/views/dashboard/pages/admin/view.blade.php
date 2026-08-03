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
</style>

      <main class="rivo-content">
        <div class="rivo-page-header d-flex flex-wrap justify-content-between align-items-start gap-3">
          <div>
            <h1>Administrators</h1>
            <div class="rivo-breadcrumb"><a href="index.html">Dashboard</a> / Admins</div>
          </div>

          <a href="{{route('admin.create')}}" class="btn btn-rivo-primary"><i class="bi bi-person-plus me-2">
             </i>Add Admin
          </a>
        </div>

        <!-- Admin Cards -->

        <div class="row g-4 mb-4  ">
             @foreach ($adminData as $value )
          <div class="col-sm-6 col-lg-4  ">
            <div class="rivo-admin-card">
              <img src="{{asset('storage/'.$value->img)}}" alt="{{$value->name}}">
              <div class="rivo-admin-card__name">{{$value->name}}</div>
              <div class="rivo-admin-card__role">{{$value->role}}</div>
              <!-- <span class="rivo-badge success">Active</span> -->
              <div class="rivo-permissions">
                <span class="rivo-permission-tag">Full Access</span>
                <span class="rivo-permission-tag">Users</span>
                <span class="rivo-permission-tag">Orders</span>
                <span class="rivo-permission-tag">Settings</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <!-- Admins Table -->
        <div class="rivo-card">
          <div class="rivo-card__header">
            <h3 class="rivo-card__title">All Administrators</h3>
          </div>
          <div class="table-responsive">
            <table class="table rivo-table mb-0">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Role</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ( $adminData as $value)
                <tr>
                  <td><div class="rivo-table__user"><img src="{{ asset('storage/'.$value->img)}}" alt=""></div></td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->phone}}</td>
                  <td>{{$value->address}}</td>
                  <td><span class="rivo-badge warning">{{$value->role}}</span></td>
                  <td>{{$value->created_at}}</td>
                  <td class="d-flex">
                    <a href="{{route('admin.edit' , $value->id)}}" class="rivo-action-btn ">
                        <i class="bi bi-pencil"></i>
                    </a>
                        <form action="{{route('admin.destroy' , $value->id)}}" method="POST" class="d-inline-block m-0 p-0">
                            @csrf
                            @method('delete')
                            <button class="rivo-action-btn danger " onclick="return confirm('Are you sure want to delete this the person')"><i class="bi bi-trash"></i></button>
                        </form>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
        <div class=" d-flex justify-content-center my-4  ">
            {{$adminData->links()}}
        </div>
      </main>

@endsection

