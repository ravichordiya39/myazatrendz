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
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Sign Up</span></li>
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
            <h1 class="page-title">Sign Up</h1>
          </div>
            <div class="content-area">
              <div class="content-section">
                <div class="loginregister-page register-wrap">
                  <div class="loginregister-header">
                      <h3>Register</h3>
                      <p>Create an account to latest Update.</p>
                  </div>
                  <div class="loginregister-body">
                    <form action="{{url('sign-up-post')}}" method="post" id="sign_up_form">
                      @csrf
                      <div class="form-row">  
                        <div class="form-group required col-sm-6 col-12">
                          <label for="name">First Name</label>
                          <input name="first_name" type="text" class="form-control" id="name" placeholder="First Name">
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="name">Last Name</label>
                          <input name="last_name" type="text" class="form-control" id="lastname" placeholder="Last Name">
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="email">Email address</label>
                          <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="phone_number">Phone Number</label>
                          <input name="phone_number" type="tel" class="form-control" id="phone_number" placeholder="Phone Number">
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="country">Country</label>
                          <select name="country" id="country" class="form-control" required>
                              <option value="">Select a country / region…</option>
                              @foreach ($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="state">State</label>
                          <input name="state" type="text" class="form-control" id="state" placeholder="State">
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="city">City</label>
                          <input name="city" type="text" class="form-control" id="city" placeholder="City">
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="city">Postal Code</label>
                          <input name="postol_code" type="text" class="form-control" id="postal_code" placeholder="Postal Code">
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="address">Address</label>
                          <input name="address" type="text" class="form-control" id="address" placeholder="Address">
                        </div>
                        <div class="form-group col-sm-6 col-12">
                          <label for="address2">Address 2</label>
                          <input name="address2" type="text" class="form-control" id="address2" placeholder="Address 2">
                        </div>
                        <!-- <div class="form-group col-sm-6 col-12">
                          <label for="phone_number">Referal Code</label>
                          <input type="text" class="form-control" id="referal" placeholder="Referal Code">
                        </div>
                        <div class="form-group col-sm-6 col-12">
                          <label for="gst">GST Number</label>
                          <input type="text" class="form-control" id="gst" placeholder="GST Number">
                        </div> -->
                        <div class="form-group required col-sm-6 col-12">
                          <label for="passwordfiled">Password</label>
                          <input name="password" type="password" class="form-control" id="passwordfiled" placeholder="Password">
                          <span toggle="#passwordfiled" class="fa fa-eye toggle-password"></span>
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="confirm_password">Confirm Password</label>
                          <input name="confirm_password" type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                          <span toggle="#confirm_password" class="fa fa-eye toggle-password"></span>
                        </div>
                      </div>
                      <div class="form-submit">
                          <button type="button" class="btn btn-primary create_account_btn">Create an account</button>
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
                        <h4>Already have an account?</h4>
                        <a href="{{url('sign-in')}}" class="account-link login">Sign in?</a>
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
  $(document).on('click','.create_account_btn', function(e){
    // toastr.success('Coupon removed successfully.');
    var set_validation = 1;
    if( $('#sign_up_form #name').val() == '' ){
      toastr.error('Please enter first name.');
      set_validation = 0;
    }
    if( $('#sign_up_form #lastname').val() == '' && set_validation == 1 ){
      toastr.error('Please enter last name.');
      set_validation = 0;
    }
    if( $('#sign_up_form #email').val() == '' && set_validation == 1 ){
      toastr.error('Please enter email address.');
      set_validation = 0;
    }
    if( $('#sign_up_form #phone_number').val() == '' && set_validation == 1 ){
      toastr.error('Please enter phone number.');
      set_validation = 0;
    }
    if( $('#sign_up_form #country').val() == '' && set_validation == 1 ){
      toastr.error('Please select country.');
      set_validation = 0;
    }
    if( $('#sign_up_form #state').val() == '' && set_validation == 1 ){
      toastr.error('Please enter state.');
      set_validation = 0;
    }
    if( $('#sign_up_form #city').val() == '' && set_validation == 1 ){
      toastr.error('Please enter city.');
      set_validation = 0;
    }
    if( $('#sign_up_form #postal_code').val() == '' && set_validation == 1 ){
      toastr.error('Please enter postal code.');
      set_validation = 0;
    }
    if( $('#sign_up_form #address').val() == '' && set_validation == 1 ){
      toastr.error('Please enter address.');
      set_validation = 0;
    }
    
    if( $('#sign_up_form #passwordfiled').val() == '' && set_validation == 1 ){
      toastr.error('Please enter password.');
      set_validation = 0;
    }
    if( $('#sign_up_form #confirm_password').val() == '' && set_validation == 1 ){
      toastr.error('Please enter confirm password.');
      set_validation = 0;
    }

    if( ( $('#sign_up_form #passwordfiled').val() != $('#sign_up_form #confirm_password').val() ) && set_validation == 1 ){
      toastr.error('Confirm password is not matched to password.');
      set_validation = 0;
    }

    if( set_validation == 1 ){
      $('#sign_up_form').submit();
    }
  });
</script>

@endpush
