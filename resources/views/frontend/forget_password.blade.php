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
                  <li class="breadcrumb-item trail-begin"><a href="{{url('/')}}" rel="home"><span
                        itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Forgotten Password</span></li>
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
            <h1 class="page-title">Forgot Your Password?</h1>
          </div>
          <div class="row">           
            <div class="content-area col-md-12 col-sm-12 col-12">
              <div class="content-section">
                <div class="loginregister-page">
                  <div class="loginregister-header">
                      <h3>Reset Password</h3>
                      <p>Enter the e-mail address associated with your account. Click submit to have a password reset link e-mailed to you.</p>
                  </div>
                  <div class="loginregister-body">
                    <form action="{{url('forget-password-post')}}" method="post" id="forget_pass_form">
                    @csrf
                      <div class="form-group required">
                        <label for="input-email">Email Address</label>
                        <input name="email" placeholder="E-Mail Address" id="input-email" class="form-control" type="text">
                      </div>  
                      <div class="form-submit">
                        <button type="button" class="btn btn-primary forget_pass_btn">Submit</button>
                    </div>
                    </form>                     
                      <div class="loginregister-now">
                          <h4>Back to Login</h4>
                          <a href="{{url('sign-in')}}" class="account-link register">Sign In</a>
                      </div>
                  </div>
              </div>  
              </div>
            </div>
            <!--content-area-->
          </div>
          <!-- row -->
        </div>
        <!--container-->
      </div>     
      <!--content-wrapper-->
    </section>

@endsection

@push('scripts')

<script>
  $(document).on('click','.forget_pass_btn', function(e){
    var set_validation = 1;
    
    if( $('#forget_pass_form #input-email').val() == '' && set_validation == 1 ){
      toastr.error('Please enter email address.');
      set_validation = 0;
    }

    if( set_validation == 1 ){
      $('#forget_pass_form').submit();
    }

  });
</script>

@endpush
