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
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Contact Us</span></li>
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
            <h1 class="page-title">Contact Us</h1>
          </div>
            <div class="content-area">
              <div class="contact-page-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14242.464848998903!2d75.7723984!3d26.8203463!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd9ee3578b103cf96!2sBaba%20Garments!5e0!3m2!1sen!2sin!4v1628670901620!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
              <div class="contact-info-section">
                <div class="contact-info">
                  <h3 class="contact-info-title">Contact Info</h3>
                  <ul>
                      <li>
                          <div class="contact-wrap">
                              <div class="contact-icon"> <i class="fas fa-address-card"></i> </div>
                              <div class="contact-text">
                                  <h5 class="contact-title">Address</h5>
                                  <p>06, Shakti Vihar Kalyanpura Sanganer,
                                    Jaipur – 302029
                                    Rajasthan, India</p>
                              </div>
                          </div>
                      </li>
                      <li>
                        <div class="contact-wrap">
                            <div class="contact-icon"> <i class="fa fa-phone-alt"></i> </div>
                            <div class="contact-text">
                                <h5 class="contact-title">Phone</h5>
                                <p><a href="tel:+91 7737384209">+91-7737384209</a></p>
                            </div>
                        </div>
                    </li>                     
                      <li>
                          <div class="contact-wrap">
                              <div class="contact-icon"> <i class="fa fa-envelope"></i> </div>
                              <div class="contact-text">
                                  <h5 class="contact-title">Email</h5>
                                  <p><a href="mailto:info@myazakurties.com">info@myazakurties.com</a></p>
                              </div>
                          </div>
                      </li>
                  </ul>
                </div>
                <!--contact-info-->
                <div class="contact-page-form">
                  <h3 class="contact-form-title">Get in Touch With us!</h3>
                  <div class="form">
                      <form action="{{url('contact-us')}}" method="post" role="form">
                          <div class="row">
                              <div class="form-group col-sm-6 col-12">
                                  <label>Name</label><input id="set_contact_name" type="text" name="Name" value="" size="40"
                                      class="form-control">
                              </div>
                              <div class="form-group col-sm-6 col-12">
                                  <label>Email</label><input id="set_contact_email" type="email" name="Email" value="" size="40"
                                      class="form-control">
                              </div>
                              <div class="form-group col-sm-6 col-12">
                                  <label>Phone</label><input id="set_contact_phone" type="tel" name="Phone" value="" size="40"
                                      class="form-control">
                              </div>
                              <div class="form-group col-sm-6 col-12">
                                  <label>Subject</label><input id="set_contact_subject" type="text" name="Subject" value="" size="40"
                                      class="form-control">
                              </div>                           
                              <div class="form-group col-sm-12 col-12">
                                  <label>Message</label><textarea id="set_contact_text" name="Message" cols="40" rows="10"
                                      class="form-control"></textarea>
                              </div>
                              <div class="form-submit col-sm-12 col-12">
                                  <input type="button" id="contact_sub_btn" value="Submit" class="btn btn-secondary">
                              </div>
                          </div>
                      </form>
                  </div>
                </div>
                <!-- contact-page-form -->
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
    $(document).on('click','#contact_sub_btn', function(e){
      
        if( ( $('#set_contact_text').val() == '' ) || ( $('#set_contact_subject').val() == '' ) || ( $('#set_contact_phone').val() == '' ) || ( $('#set_contact_name').val() == '' ) || ( $('#set_contact_email').val() == '' ) ){
          toastr.error("Please enter all filled!");
        }else{
          if( isEmail($('#set_contact_email').val()) ){
            var set_url = "{{url('contact-us-post')}}";
            var contact_text = $('#set_contact_text').val();
            var contact_subject = $('#set_contact_subject').val();
            var contact_phone = $('#set_contact_phone').val();
            var contact_name = $('#set_contact_name').val();
            var contact_email = $('#set_contact_email').val();
            $.ajax({
                url : set_url,
                type : 'post',
                datatype : 'json',
                data : {contact_text : contact_text,contact_subject : contact_subject,contact_phone : contact_phone,contact_name : contact_name,contact_email : contact_email,_token: "{{ csrf_token() }}",},
                success : function(response){
                  if( response.success == false ){
                    toastr.error('Something went wrong, Please try again later!');
                  }else{
                    toastr.success('Thank you for filling out your information!');
                    $('#set_contact_text').val('');
                    $('#set_contact_subject').val('');
                    $('#set_contact_phone').val('');
                    $('#set_contact_name').val('');
                    $('#set_contact_email').val('');
                  }
                },
                error : function(err){
                  toastr.error("No response from server");
                }
            });
          }else{
            toastr.error("Please enter valid email!");
          }
          
          
        }
    });

    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
</script>

@endpush
