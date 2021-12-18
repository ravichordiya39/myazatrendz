@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Create USP
            <a class="btn btn-secondary float-right" href="{{ route('admin.usp.index') }}">
                Back To USP
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.usp.store') }}">
                @csrf
                <div class="row">

                    <div class="form-group col-md-6">
                        <label class="required" for="title">Title</label>
                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                            name="title" id="title" value="{{ old('title', '') }}" required>
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required" for="description">Description</label>
                        <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text"
                            name="description" id="description" value="{{ old('description', '') }}" required>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required">Status</label>
                        <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                            id="status" required>
                            <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Models\UspSection::STATUS_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('status', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        @endif
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="image">Icon Class</label>
                        <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text"
                            name="image" id="image" value="{{ old('image', '') }}" required>
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-md-12  text-right">
                        <button class="btn btn-success " type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@include('admin.upload.index');
@endsection
@section('scripts')
@include('admin.mediascript.singlecategory')
@endsection
