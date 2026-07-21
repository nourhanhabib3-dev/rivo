@extends('ecom.layout.main')

@section('content')

   <!-- Start Page Header -->
    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumb">
              <a href="#"><i class="icon-home"></i> Home</a>
              <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
              <span class="current">Login / Register</span>
              <h2 class="entry-title">Account</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Header -->

    <!-- Start Content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="d-flex justify-center">
            <div class="login">
              <div class="login-form-container">
                <div class="login-text">
                  <h3>Login</h3>
                  <p>Please Register using account detail bellow.</p>
                </div>
                <!-- Login Form Start -->
                <form  class="login-form" role="form" action="{{ route('user.login.check') }}" method="post">
                    @csrf
                  <div class="form-group">
                    <div class="controls">
                        <label for="email">Email</label>
                      <input type="text" id="email" class="form-control" name="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="controls">
                        <label for="pass">Password</label>
                      <input type="password" id="pass" class="form-control"  name="password">
                    </div>
                  </div>
                  <div class="button-box">
                    <div class="login-toggle-btn">
                        <input type="checkbox">
                        <label>Remember me</label>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-common log-btn">Login</button>
                  </div>
                </form>
                <!-- Login Form End -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Content -->


@endsection
