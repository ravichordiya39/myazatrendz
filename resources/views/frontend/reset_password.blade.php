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
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Reset Password</span></li>
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
            <h1 class="page-title">Reset Password?</h1>
          </div>
          <div class="row">           
            <div class="content-area col-md-12 col-sm-12 col-12">
              <div class="content-section">
                <div class="loginregister-page">
                  <div class="loginregister-header">
                      <h3>New Password</h3>
                  </div>
                  <div class="loginregister-body">
                    <form action="{{url('reset-password-post')}}" method="post" id="reset_pass_form">
                    @csrf
                      <div class="form-group required">
                          <label for="passwordfiled">Password</label>
                          <input type="password" name="password" class="form-control" id="passwordfiled" placeholder="Password">
                          <span toggle="#passwordfiled" class="fa fa-eye toggle-password"></span>
                      </div>
                      <div class="form-group required">
                          <label for="password">Confirm Password</label>
                          <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                          <span toggle="#confirm_password" class="fa fa-eye toggle-password"></span>
                      </div>  
                      <div class="form-submit">
                        <input type="hidden" name="user_id" value="{{$user_detail->id}}">
                        <button type="button" class="btn btn-primary reset_pass_btn">Submit</button>
                    </div>
                    </form>                     
                    
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
  $(document).on('click','.reset_pass_btn', function(e){
    var set_validation = 1;
    
    if( $('#reset_pass_form #passwordfiled').val() == '' && set_validation == 1 ){
      toastr.error('Please enter password.');
      set_validation = 0;
    }
    
    if( $('#reset_pass_form #confirm_password').val() == '' && set_validation == 1 ){
      toastr.error('Please enter confirm password.');
      set_validation = 0;
    }

    if( ( $('#reset_pass_form #passwordfiled').val() != $('#reset_pass_form #confirm_password').val() ) && set_validation == 1 ){
      toastr.error('Confirm password is not matched to password.');
      set_validation = 0;
    }

    if( set_validation == 1 ){
      $('#reset_pass_form').submit();
    }

  });
</script>

@endpush
