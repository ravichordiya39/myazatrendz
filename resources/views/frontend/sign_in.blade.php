@extends('frontend.layouts.app')

@push('styles')

@endpush

@section('content')

    <section class="site-content">
      <div class="page-banner-section">
        <div class="page-banner page-banner-bg">
          <div class="container">
            <div class="page-banner-wrap">
              <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
                <ul class="breadcrumb-items">
                  <li class="breadcrumb-item trail-begin"><a href="{{url('/')}}" rel="home"><span itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Sign In</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- page-banner-section -->
      <div class="content-wrapper">
        <div class="container">
          <div class="page-header text-center">
            <h1 class="page-title">Sign In</h1>
          </div>
            <div class="content-area">
              <div class="content-section">
                <div class="loginregister-page">
                  <div class="loginregister-header">
                      <h3>Login</h3>
                      <p>Enter your email address to sign in.</p>
                  </div>
                  <div class="loginregister-body">
                      <form action="{{url('sign-in-post')}}" method="post" id="sign_in_form">
                        @csrf
                          <div class="form-group required">
                              <label for="email">Email address</label>
                              <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                          </div>
                          <div class="form-group required">
                              <label for="password">Password</label>
                              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                          </div>
                          <div class="form-forgot-pass">
                              <a href="{{url('forget-password')}}" class="forgot-pass">Forgot Password?</a>
                          </div>
                          <div class="form-submit">
                              <button type="button" class="btn btn-primary sign_in_btn">Submit</button>
                          </div>
                      </form>

                      <div class="login-social">
                          <p class="login-social-title"><strong> OR SIGN IN USING </strong></p>
                          <div class="social">
                              <ul class="social-icon">
                                  <li class="facebook"><a target="_blank" href="{{url('login')}}/facebook"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                                  <li class="google"><a target="_blank" href="{{url('login')}}/google"><i class="fab fa-google"></i><span>Google</span></a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="loginregister-now">
                          <h4>Do not have an account?</h4>
                          <a href="{{url('sign-up')}}" class="account-link register">Sign Up?</a>
                      </div>
                  </div>
              </div>
              </div>
            </div>
            <!--content-area-->         
        </div>
        <!--container-->
      </div>     
      <!--content-wrapper-->
    </section>

@endsection

@push('scripts')

  <script>
      $(document).on('click','.sign_in_btn', function(e){
        var set_validation = 1;
        
        if( $('#sign_in_form #email').val() == '' && set_validation == 1 ){
          toastr.error('Please enter email address.');
          set_validation = 0;
        }
          
        if( $('#sign_in_form #password').val() == '' && set_validation == 1 ){
          toastr.error('Please enter password.');
          set_validation = 0;
        }

        if( set_validation == 1 ){
          $('#sign_in_form').submit();
        }

      });
  </script>

@endpush
