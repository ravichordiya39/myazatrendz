<?php
  use App\Models\Images;
?>

@push('stylesheet')


<style>
    #toast-container{
        margin-top : 20px;
    }

    #toast-container > .toast {
    width: 370px !important;
    }

    .thumbnail-imgess{
        height : 90px !important;
        vertical-align: middle;
        border : 1px solid lightgray;
        border-radius : 5px 5px 0px 0px !important;
    }

    .margin-bottomset:hover{
        transform: scale(1.05);
    }

    .box-images{
        padding : auto;
        width : 100%;
        height : 70px;

    }
    .img-thubnail img{
        vertical-align: middle;
    }

    #add-banner-body{
        /* min-height : 300px;
        max-height : auto; */
    }

    input[type="checkbox"][id^="myCheckbox"] {
    display: none;
    }

    label {
    border: 1px solid #fff;
    padding: 2px;
    display: block;
    position: relative;
    margin: 2px;
    cursor: pointer;
    }

    label:before {
    background-color: white;
    color: white;
    content: " ";
    display: block;
    border-radius: 50%;
    border: 1px solid grey;
    position: absolute;
    top: -5px;
    left: -5px;
    width: 25px;
    height: 25px;
    text-align: center;
    line-height: 28px;
    transition-duration: 0.4s;
    transform: scale(0);
    }

    label img {

    transition-duration: 0.2s;
    transform-origin: 50% 50%;
    }

    input[type="checkbox"][id^="myCheckbox"]:checked + label {
    border-color: #ddd;
    }

    input[type="checkbox"][id^="myCheckbox"]:checked + label:before {
    content: "✓";
    background-color: grey;
    transform: scale(1);
    }

    input[type="checkbox"][id^="myCheckbox"]:checked + label img {
    transform: scale(0.9);
    /* box-shadow: 0 0 5px #333; */
    z-index: -1;
    }
    .modal-xl {
            width: 60%;
            max-width:1200px;
     }

     .modal-body{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }
</style>
@endpush

<div class="modal fade take-banner-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content" id="add-image-body">
         <div class="modal-header text-center">
            <h5 class="modal-title w-100">Select Images from the list</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <?php
                  $images = Images::all();
                ?>
                @foreach($images as $image)
                <div class="col-xs-4 col-md-2 margin-bottomset py-2">
                    <div class="img-thumbnail thumbnail-imgess">
                        <input type="checkbox" id="myCheckbox{{$image->id}}" data-id="{{$image->id}}" data-img="{{$image->name}}"/>
                          <label for="myCheckbox{{$image->id}}">
                            <img class="box-images px-2 py-2" image_id="" src="{{asset("file")}}/{{$image->name}}" alt="..." >
                        </label>
                    </div>
                    {{-- <button class="btn btn-block btn-secondary" id="view-btn" style="border : 2px solid #5A6268;border-radius: 0px 0px 5px 5px !important;" data-id="{{$image->id}}"> View Detail</button> --}}
                </div>
                @endforeach
            </div>
          </div>
      </div>
    </div>
</div>

@section('script')
<script>

</script>
@endsection
