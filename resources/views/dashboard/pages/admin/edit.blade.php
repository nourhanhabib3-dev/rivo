@extends('dashboard.layout.main')


@section('body')

    <main class="rivo-content">
        <div class="rivo-page-header">
          <h1> Update the User ( {{$admin->name}} )</h1>
          <div class="rivo-breadcrumb"><a href="index.html">Dashboard</a> / <a href="users.html">Users</a> / Update</div>
        </div>

        <div class="alert alert-success rivo-form-success" style="display:none;" role="alert">
          <i class="bi bi-check-circle me-2"></i>User saved successfully! (Demo)
        </div>

        <div class="rivo-form-card">

          <form method="POST" action="{{ route('admin.update' , $admin->id) }}"  enctype="multipart/form-data">
              @csrf
              @method('put')
            <div class="row g-4">

              <div class="col-md-4">
                    @error('img') <p style="color: red" >{{$message}}</p> @enderror
                    <label class="d-block mb-2 fw-semibold">Profile Image</label>
                    <input type="file" class="d-none"  name="img">
                    <div class="rivo-upload">
                      <i class="bi bi-cloud-arrow-up d-block"></i>
                      <p class="rivo-upload__text mb-1">Click to upload image</p>
                      <small class="text-muted">PNG, JPG up to 2MB</small>
                    </div>
              </div>


              <div class="col-md-8">
                <div class="row g-3">

                  <div class="col-md-6">
                    <div class="rivo-form-group">
                        @error('name') <p style="color: red" >{{$message}}</p> @enderror
                      <label>Name</label>
                      <div class="rivo-input-wrap">
                        <i class="bi bi-person"></i>
                        <input type="text" value="{{$admin->name}}" class="form-control" name="name">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="rivo-form-group">
                        @error('email')
                        <p style="color: red" >{{$message}}</p>
                        @enderror
                      <label>Email Address</label>
                      <div class="rivo-input-wrap">
                        <i class="bi bi-envelope"></i>
                        <input type="email" value="{{$admin->email}}" name="email" class="form-control">
                      </div>
                    </div>
                  </div>



                  <div class="col-md-6">
                    <div class="rivo-form-group">
                        @error('phone')
                        <p style="color: red" >{{$message}}</p>
                        @enderror
                      <label>Phone Number</label>
                      <div class="rivo-input-wrap">
                        <i class="bi bi-telephone"></i>
                        <input type="tel" value="{{$admin->phone}}" name="phone" class="form-control"  >
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="rivo-form-group">
                        @error('role') <p style="color: red" >{{$message}}</p> @enderror
                      <label>Role</label>
                      <div class="rivo-input-wrap">

                        <select name="role" value="{{$admin->role}}" class="form-select" required>
                          <option value="admin">Admin</option>
                          <option value="super admin">Super Admin</option>
                          <option value="manager">Manager</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="rivo-form-group mb-0">
                        @error('address') <p style="color: red" >{{$message}}</p> @enderror
                      <label>Address</label>
                      <div class="rivo-input-wrap">
                        <i class="bi bi-geo-alt"></i>
                        <input type="text" value="{{$admin->address}}" name="address" class="form-control" >
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <hr class="my-4">
            <div class="d-flex gap-2 flex-wrap">
              <button type="submit" class="btn btn-rivo-primary"><i class="bi bi-check-lg me-2"></i>Update
            </button>
            </div>

          </form>
        </div>
    </main>


@endsection
