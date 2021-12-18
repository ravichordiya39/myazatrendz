@extends('layouts.admin')
@push('stylesheet')
<style>
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }

    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }

    #toast-container{
        margin-top : 20px;
    }

    #toast-container > .toast {
    width: 370px !important;
    }
</style>
@endpush
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{ route('admin.usp.create') }}">
                Add USP
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            USP List
        </div>
        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Category text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Icon
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            @lang('global.action')
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usp_data as $row)
                        <tr>
                            <td>{{ $row->id ?? '' }}</td>
                            <td>
                                <span class="badge badge-primary p-2">{{ $row->title ?? '' }}</span>
                            </td>
                            <td class="text-left">
                                <p class="text-secondary">{{ $row->description ?? '' }}</p>
                            </td>
                            <td class="text-left">
                                <p class="text-secondary"><i class="fas {{ $row->image }}"></i></p>
                            </td>
                            <td>
                            <?php $status =  App\Models\UspSection::STATUS_SELECT[$row->status] ;

                                $is_attribute = $status == 'Active' ? 'checked' : '';

                                ?>
                                        <div class="text-center">
                                            <label class="switch">
                                                <input type="checkbox"  <?php echo $is_attribute; ?> id="is-attribute-chk" data-id="{{$row->id}}">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.usp.show', $row->id) }}" title="{{ trans('global.view') }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ route('admin.usp.edit', $row->id) }}" title="{{ trans('global.edit') }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.usp.destroy', $row->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger" title="{{ trans('global.delete') }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">
                                No record found!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function() {

            @if(\Session::has('success'))
                toastr.success('Success!', "{{\Session::get('success')}}",{
                    positionClass: 'toast-top-center',
                    iconClass:'toast-success',
                });
            @endif

            @if(\Session::has('warning'))
                toastr.warning('Warning!', "{{\Session::get('warning')}}",{
                    positionClass: 'toast-top-center',
                    iconClass:'toast-warning',
                });
            @endif
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            

            $(document).on('click','#is-attribute-chk', function(){
                var id =  $(this).attr('data-id');
                $this = $(this);
                var status = '';
                if ($(this).is(':checked')) {status = 1;}
                else{ status = 0;}

                $.ajax({
                    type:'POST',
                    url:"{{ route('admin.usp.status.update') }}",
                    data:{id:id, status:status},
                    success:function(data){
                        if(data.success){
                            toastr.success('Success!', data.message,{
                            positionClass: 'toast-top-center',
                            iconClass:'toast-success',
                            });
                        }
                        else{
                            toastr.warning('Warning!', data.message,{
                            positionClass: 'toast-top-center',
                            iconClass:'toast-warning',
                            });

                            $this.prop('checked', true);
                        }
                    },
                    error : function(err){
                        toastr.error('Error!', data.message,{
                            positionClass: 'toast-top-center',
                            iconClass:'toast-error',
                        });
                    }
                });
            });

        });
    </script>
@endsection
