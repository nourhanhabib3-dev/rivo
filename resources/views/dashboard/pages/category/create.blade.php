@extends('dashboard.layout.main')



@section('body')


    <main class="rivo-content">

        <div class="rivo-page-header">
          <h1>Add New User</h1>
          <div class="rivo-breadcrumb"><a href="index.html">Dashboard</a> / <a href="users.html">Users</a> / Add User</div>
        </div>

        <div class="alert alert-success rivo-form-success" style="display:none;" role="alert">
          <i class="bi bi-check-circle me-2"></i>User saved successfully! (Demo)
        </div>

        <div class="rivo-form-card">

          <form method="POST" action="{{ route('cat.store') }}">
              @csrf
            <div class="row g-4">

              <div class="col-md-8">
                <div class="row g-3">

                  <div class="col-md-6">
                    <div class="rivo-form-group">
                        @error('name') <p style="color: red" >{{$message}}</p> @enderror
                      <label>Name Category</label>
                      <div class="rivo-input-wrap">
                        <input type="text" value="{{old('name')}}" class="form-control" name="name">
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <hr class="my-4">
            <div class="d-flex gap-2 flex-wrap">
              <button type="submit" class="btn btn-rivo-primary"><i class="bi bi-check-lg me-2"></i>Add category</button>
            </div>

          </form>
        </div>
    </main>

@endsection
