@extends('layouts.admin')

@push('styles')
<style>
    .bs-setting{
    	margin: 20px;
    }
</style>
@endpush

@section('content')
@if(\Session::has('success'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> {{\Session::get('success')}}
  </div>
@endif
<form action="{{route('admin.setting.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="card" style="display : block;" id="normal-products">
    <div class="card-header font-weight-bold">
        {{ trans('cruds.setting.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="bs-setting">
            <ul class="nav nav-tabs ">
                <li class="nav-item">
                    <a href="#home" class="nav-link active font-weight-bold" data-toggle="tab">Website Information</a>
                </li>
                <li class="nav-item">
                    <a href="#profile" class="nav-link font-weight-bold" data-toggle="tab">Api Config</a>
                </li>
                <li class="nav-item">
                    <a href="#messages" class="nav-link font-weight-bold" data-toggle="tab">Social Link Config</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="home">
                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter company name" name="company_name"
                                value="{{$setting->company_name}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Company email" name="company_email" value="{{$setting->company_email}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Us Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter contact us email" name="contact_us_email" value="{{$setting->contact_us_email}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputAddress">Company Address</label>
                                <textarea class="form-control" id="exampleInputAddress" aria-describedby="emailHelp" placeholder="Enter address" name="address">{{$setting->address}}</textarea>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Info</label>
                                <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="description">{{$setting->description}}</textarea>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Working Days/Hours text</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter working days text" name="working_day" value="{{$setting->working_day}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>

                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputWhatsapp">Whatsapp Number</label>
                                <input type="text" class="form-control" id="exampleInputWhatsapp" aria-describedby="emailHelp" placeholder="Enter country" name="whatsapp" value="{{$setting->whatsapp}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Country</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter country" name="country" value="{{$setting->country}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">State</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter state" name="state" value="{{$setting->state}}">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">City</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter city" name="city" value="{{$setting->city}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Zip</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter zip" name="zip" value="{{$setting->zip}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone number</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone number" name="phone" value="{{$setting->phone}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">favicon</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="select favicon" name="favicon" >
                                <img src="{{asset("file/$setting->favicon")}}" style="width : 100px;"/>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Logo</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="select logo" name="logo">
                                <img src="{{asset("file/$setting->logo")}}" style="width : 100px;"/>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile">
                    <div class="row mt-5">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook Login</label><br>
                                <input type="checkbox" id="exampleInputEmail1"  name="facebook_login"  @if($setting->fb_login) checked @endif>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook App Id</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter facebook app id" name="facebook_app_id" value="{{$setting->fb_app_id}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook Secret Id</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter facebook secret id" name="facebook_secret_id" value="{{$setting->fb_secret_id}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Google Login</label><br>
                                <input type="checkbox"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter google login" name="google_login" @if($setting->google_login) checked @endif>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Google App Id</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter google app id" name="google_app_id" value="{{$setting->google_app_id}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Google Secret Id</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter google secret id" name="google_secret_id" value="{{$setting->google_secret_id}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Firebase notification api</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter firebase notification api" name="firebase_api" value="{{$setting->firebase_api}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="messages">
                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook Link</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter facebook link" name="fb_link" value="{{$setting->fb_link}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Google  Link</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter google link" name="google_link" value="{{$setting->google_link}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Twitter Link</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter twitter link" name="twitter_link" value="{{$setting->twitter_link}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Instagram Link</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter instagram link" name="instagram_link" value="{{$setting->instagram_link}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInstagramUsername">Instagram Username</label>
                                <input type="text" class="form-control" id="exampleInstagramUsername" aria-describedby="emailHelp" placeholder="Enter instagram username" name="instagram_profile" value="{{$setting->instagram_profile}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pinterest Link</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter pinterest link" name="pinterest_link" value="{{$setting->pinterest_link}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Whatsapp Link</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter whatsapp link" name="whatsapp_link" value="{{$setting->whatsapp_link}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted w-100 ">
        <button class="btn btn-warning float-right" type="submit">save</button>
    </div>
  </div>
</form>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
    });
</script>
@endsection
