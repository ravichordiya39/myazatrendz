@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show USP
        <a class="btn btn-secondary float-right" href="{{ route('admin.usp.index') }}">
            Back To USP
        </a>
    </div>
   

    <div class="card-body">
        <div class="form-group">
            {{-- <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.usp.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> --}}
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $usp_data->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Title
                        </th>
                        <td>
                            {{ $usp_data->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                            {{ $usp_data->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Icon
                        </th>
                        <td>
                            <i class="fas {{ $usp_data->image }}"></i>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status
                        </th>
                        <td>
                            {{ App\Models\UspSection::STATUS_SELECT[$usp_data->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
           
        </div>
    </div>
</div>



@endsection