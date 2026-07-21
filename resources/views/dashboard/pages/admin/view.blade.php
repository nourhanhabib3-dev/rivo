@extends('dashboard.layout.main')

@section('body')

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
        @foreach ($adminData as $value )
        <div class="row g-4 mb-4">
          <div class="col-sm-6 col-lg-3">
            <div class="rivo-admin-card">
              <img src="{{asset('storage/.$value->img')}}" alt="Sarah Mitchell">
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

        </div>
       @endforeach
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
                  <td><div class="rivo-table__user"><img src="{{ asset('storage/.$value->img')}}" alt=""></div></td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->phone}}</td>
                  <td>{{$value->address}}</td>
                  <td><span class="rivo-badge warning">{{$value->role}}</span></td>
                  <td>{{$value->created_at}}</td>
                  <td class="d-flex">
                    <a href="{{route('admin.edit' , $value->id)}}" class="rivo-action-btn"><i class="bi bi-pencil"></i></button>
                    <form action="{{route('admin.destroy' , $value->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="rivo-action-btn"><i class="bi bi-shield"></i></button>
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

