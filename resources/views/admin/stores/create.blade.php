@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.store.title_singular') }}
        <a class="btn btn-secondary float-right" href="{{ route('admin.stores.index') }}">
            {{ trans('global.back') }}
        </a>
    </div>

    <div class="card-body">
        <form method="POST" class="form-row"  action="{{ route("admin.stores.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-4">
                <label class="required" for="name">{{ trans('cruds.store.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.name_helper') }}</span>
            </div>
            <div class="form-group col-4">
                <label class="required" for="contact_person_name">{{ trans('cruds.store.fields.contact_person_name') }}</label>
                <input class="form-control {{ $errors->has('contact_person_name') ? 'is-invalid' : '' }}" type="text" name="contact_person_name" id="contact_person_name" value="{{ old('contact_person_name', '') }}" required>
                @if($errors->has('contact_person_name'))
                    <span class="text-danger">{{ $errors->first('contact_person_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.contact_person_name_helper') }}</span>
            </div>
            <div class="form-group col-4">
                <label class="required" for="contact_person_number">{{ trans('cruds.store.fields.contact_person_number') }}</label>
                <input class="form-control {{ $errors->has('contact_person_number') ? 'is-invalid' : '' }}" type="text" name="contact_person_number" id="contact_person_number" value="{{ old('contact_person_number', '') }}" required>
                @if($errors->has('contact_person_number'))
                    <span class="text-danger">{{ $errors->first('contact_person_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.contact_person_number_helper') }}</span>
            </div>
            <div class="form-group col-4">
                <label for="contact_person_designation">{{ trans('cruds.store.fields.contact_person_designation') }}</label>
                <input class="form-control {{ $errors->has('contact_person_designation') ? 'is-invalid' : '' }}" type="text" name="contact_person_designation" id="contact_person_designation" value="{{ old('contact_person_designation', '') }}">
                @if($errors->has('contact_person_designation'))
                    <span class="text-danger">{{ $errors->first('contact_person_designation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.contact_person_designation_helper') }}</span>
            </div>
            <div class="form-group col-4">
                <label class="required" for="store_pin_code">{{ trans('cruds.store.fields.store_pin_code') }}</label>
                <input class="form-control {{ $errors->has('store_pin_code') ? 'is-invalid' : '' }}" type="text" name="store_pin_code" id="store_pin_code" value="{{ old('store_pin_code', '') }}" required>
                @if($errors->has('store_pin_code'))
                    <span class="text-danger">{{ $errors->first('store_pin_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.store_pin_code_helper') }}</span>
            </div>
            <div class="form-group col-4">
                <label class="required" for="store_contact">{{ trans('cruds.store.fields.store_contact') }}</label>
                <input class="form-control {{ $errors->has('store_contact') ? 'is-invalid' : '' }}" type="text" name="store_contact" id="store_contact" value="{{ old('store_contact', '') }}" required>
                @if($errors->has('store_contact'))
                    <span class="text-danger">{{ $errors->first('store_contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.store_contact_helper') }}</span>
            </div>
            <div class="form-group col-4">
                <label class="required" for="open_time">{{ trans('cruds.store.fields.open_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('open_time') ? 'is-invalid' : '' }}" type="text" name="open_time" id="open_time" value="{{ old('open_time') }}" required>
                @if($errors->has('open_time'))
                    <span class="text-danger">{{ $errors->first('open_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.open_time_helper') }}</span>
            </div>
            <div class="form-group col-4">
                <label class="required" for="close_time">{{ trans('cruds.store.fields.close_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('close_time') ? 'is-invalid' : '' }}" type="text" name="close_time" id="close_time" value="{{ old('close_time') }}" required>
                @if($errors->has('close_time'))
                    <span class="text-danger">{{ $errors->first('close_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.close_time_helper') }}</span>
            </div>
            <div class="form-group col-4">
                <label class="required">{{ trans('cruds.store.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Store::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.status_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="address">{{ trans('cruds.store.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" required>{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.address_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="pin_codes">{{ trans('cruds.store.fields.pin_codes') }}</label>
                <textarea class="form-control {{ $errors->has('pin_codes') ? 'is-invalid' : '' }}"  name="pin_codes" id="pin_codes" required> {{ old('pin_codes', '') }} </textarea>
                @if($errors->has('pin_codes'))
                    <span class="text-danger">{{ $errors->first('pin_codes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.pin_codes_helper') }}</span>
            </div>
            <div class="form-group text-right col-12">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection