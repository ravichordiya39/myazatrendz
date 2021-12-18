@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/image-uploader.css') }}">
    <script src="{{ asset('assets/editor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/editor/sample.js') }}"></script>
    <script src="{{ asset('assets/editor/sample2.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/editor/toolbarconfigurator/lib/codemirror/neo.css') }}">
    <style>

        #img-cross{
            position:absolute;
            right : -7px;
            top : -7px;
            color : white;
            background-color : grey;
            padding-left: 8px;
            padding-right: 8px;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius : 25px;
            cursor:pointer;
        }

        #add-image{
            position:relative;
            min-height : 170px;
        }

        #add-image #img-cross{
            visibility: hidden;
        }

        #add-image:hover #img-cross{
            visibility: visible;
        }

        .btn-circle.btn-sm {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            font-size: 8px;
            text-align: center;
        }
        .btn-circle.btn-md {
            width: 50px;
            height: 50px;
            padding: 7px 10px;
            border-radius: 25px;
            font-size: 10px;
            text-align: center;
        }
        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            border-radius: 35px;
            font-size: 12px;
            text-align: center;
        }
            .icheck-primary > span{
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;

            /* Position the tooltip */
            position: absolute;
            z-index: 1;
            bottom: 100%;
            right: 50%;
            margin-left: -60px;
            /* padding : 3px; */
            }

            .icheck-primary:hover span{
                visibility: visible;
            }

        </style>

@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
            <a class="btn btn-secondary float-right" href="{{ route('admin.products.index') }}">
                {{ trans('global.back') }}
            </a>
        </div>

        <div class="card-body">
            <form method="POST" id="formupdate" action="{{ route('admin.products.update',$product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="accordion" id="accordionProduct">
                    <div class="card">
                        <div class="card-header" id="productDetails">
                            <button class="btn btn-link text-dark font-weight-bold btn-block text-left text-uppercase"
                                type="button" data-toggle="collapse" data-target="#productDetail" aria-expanded="true"
                                aria-controls="productDetail">
                                @lang('cruds.product.product_details')
                            </button>
                        </div>

                        <div id="productDetail" class="collapse show" aria-labelledby="productDetails"
                            data-parent="#accordionProduct">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label class="required" for="name">
                                            {{ trans('cruds.product.fields.name') }}
                                        </label>

                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>

                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.name_helper') }}
                                        </span>
                                    </div>

                                    <div class="form-group col-3">
                                        <label class="required" for="optCategory">
                                            {{ trans('cruds.product.fields.category') }}
                                        </label>
                                        <select
                                            class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}"
                                            name="category_id" id="optCategory" required>
                                            @foreach ($categories as $id => $entry)
                                                <option value="{{ $id }}"
                                                    {{ old('category_id',$product->category_id) == $id ? 'selected' : '' }}>
                                                    {{ $entry }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('category'))
                                            <span class="text-danger">{{ $errors->first('category') }}</span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.category_helper') }}
                                        </span>
                                    </div>

                                    <div class="form-group col-3">
                                        <label class="required" for="optSubCategory">
                                            {{ trans('cruds.product.fields.sub_category') }}
                                        </label>

                                        <select
                                            class="form-control select2 {{ $errors->has('sub_category_id') ? 'is-invalid' : '' }}"
                                            name="sub_category_id" id="optSubCategory" required>
                                            @foreach ($sub_categories as $id => $entry)
                                                <option value="{{ $id }}"
                                                    {{ old('sub_category_id',$product->sub_category_id) == $id ? 'selected' : '' }}>
                                                    {{ $entry }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('subcategory_id'))
                                            <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.sub_category_helper') }}
                                        </span>
                                    </div>

                                    <div class="form-group col-3" id="child-category">
                                        <label class="required" for="optSubCategoryChild">
                                            {{ trans('cruds.product.fields.sub_child_category') }}
                                        </label>

                                        <select
                                            class="form-control select2 {{ $errors->has('sub_category_child_id') ? 'is-invalid' : '' }}"
                                            name="sub_category_child_id" id="optSubCategoryChild" required>
                                            @foreach ($child_categories as $id => $entry)
                                                <option value="{{ $id }}"
                                                    {{ old('sub_category_child_id',$product->sub_category_child_id) == $id ? 'selected' : '' }}>
                                                    {{ $entry }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('subcategory_id'))
                                            <span class="text-danger">{{ $errors->first('sub_category_child_id') }}</span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.sub_category_helper') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="required"
                                            for="sku_code">{{ trans('cruds.product.fields.sku_code') }}</label>
                                        <input class="form-control {{ $errors->has('sku_code') ? 'is-invalid' : '' }}"
                                            type="text" name="sku_code" id="sku_code" value="{{ old('sku_code', $product->sku_code) }}"
                                            required>
                                        @if ($errors->has('sku_code'))
                                            <span class="text-danger">{{ $errors->first('sku_code') }}</span>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.product.fields.sku_code_helper') }}</span>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="hsn_code">{{ trans('cruds.product.fields.hsn_code') }}</label>
                                        <input class="form-control {{ $errors->has('hsn_code') ? 'is-invalid' : '' }}"
                                            type="text" name="hsn_code" id="hsn_code" value="{{ old('hsn_code', $product->hsn_code) }}">

                                        @if ($errors->has('hsn_code'))
                                            <span class="text-danger">{{ $errors->first('hsn_code') }}</span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.hsn_code_helper') }}
                                        </span>
                                    </div>

                                    {{-- <div class="form-group col-4">
                                        <label class="required" for="mrp_price">
                                            {{ trans('cruds.product.fields.mrp_price') }}
                                        </label>

                                        <input class="form-control {{ $errors->has('mrp_price') ? 'is-invalid' : '' }}"
                                            type="text" name="mrp_price" id="txtMRPPrice" value="{{ old('mrp_price',$product->mrp_price) }}"
                                            onkeypress="return isFloat(event)" maxlength="10" required>

                                        @if ($errors->has('mrp_price'))
                                            <span class="text-danger">{{ $errors->first('mrp_price') }}</span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.mrp_price_helper') }}
                                        </span>
                                    </div> --}}

                                    <div class="form-group col-4">
                                        <label for="tax_rate">{{ trans('cruds.product.fields.tax_rate') }}</label>

                                        <input class="form-control {{ $errors->has('tax_rate') ? 'is-invalid' : '' }}"
                                            type="number" name="tax_rate" id="tax_rate" value="{{ old('tax_rate', $product->tax_rate) }}"
                                            step="0.01">

                                        @if ($errors->has('tax_rate'))
                                            <span class="text-danger">{{ $errors->first('tax_rate') }}</span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.tax_rate_helper') }}
                                        </span>
                                    </div>

                                    <div class="form-group col-4">
                                        <label>{{ trans('cruds.product.fields.discount_type') }}</label>
                                        <select
                                            class="form-control {{ $errors->has('discount_type') ? 'is-invalid' : '' }}"
                                            name="discount_type" id="discount_type">
                                            <option value disabled
                                                {{ old('discount_type', $product->discount_type) === null ? 'selected' : '' }}>
                                                {{ trans('global.pleaseSelect') }}
                                            </option>

                                            @foreach (App\Models\Product::DISCOUNT_TYPE_SELECT as $key => $label)
                                                <option value="{{ $key }}"
                                                    {{ old('discount_type', $product->discount_type) == $key ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('discount_type'))
                                            <span class="text-danger">{{ $errors->first('discount_type') }}</span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.discount_type_helper') }}
                                        </span>
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="discount">{{ trans('cruds.product.fields.discount') }}</label>
                                        <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}"
                                            type="number" name="discount" id="discount" value="{{ old('discount', $product->discount) }}"
                                            step="0.01">

                                        @if ($errors->has('discount'))
                                            <span class="text-danger">
                                                {{ $errors->first('discount') }}
                                            </span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.discount_helper') }}
                                        </span>
                                    </div>

                                    {{-- <div class="col-2">
                                        <div class="icheck-primary {{ $errors->has('is_bulk') ? 'is-invalid' : '' }}">
                                            <input type="checkbox" name="is_bulk" id="is_bulk" value="1"
                                                {{ old('is_bulk', $product->is_bulk) == 1 ? 'checked' : '' }}>
                                            <label for="is_bulk">
                                                @lang('cruds.product.fields.is_bulk')
                                            </label>
                                        </div>

                                        @if ($errors->has('is_bulk'))
                                            <span class="text-danger">{{ $errors->first('is_bulk') }}</span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.is_bulk_helper') }}
                                        </span>
                                    </div> --}}

                                    <div class="col-3">
                                        <div
                                            class="icheck-primary {{ $errors->has('is_exclusive') ? 'is-invalid' : '' }}">
                                            <input type="checkbox" name="is_exclusive" id="is_exclusive" value="1"
                                                {{ old('is_exclusive', $product->is_exclusive) == 1 ? 'checked' : '' }}>
                                            <label for="is_exclusive">
                                                {{ trans('cruds.product.fields.is_exclusive') }}
                                            </label>
                                        </div>

                                        @if ($errors->has('is_exclusive'))
                                            <span class="text-danger">
                                                {{ $errors->first('is_exclusive') }}
                                            </span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.is_exclusive_helper') }}
                                        </span>
                                    </div>

                                    <div class="col-3">
                                        <div
                                            class="icheck-primary {{ $errors->has('is_featured') ? 'is-invalid' : '' }}">
                                            <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                                {{ old('is_featured', $product->is_featured) == 1 ? 'checked' : '' }}>
                                            <label for="is_featured">
                                                 Deal Of The Day
                                            </label>
                                        </div>

                                        @if ($errors->has('is_featured'))
                                            <span class="text-danger">
                                                {{ $errors->first('is_featured') }}
                                            </span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.is_featured_helper') }}
                                        </span>
                                    </div>

                                    <div class="col-3">
                                        <div class="icheck-primary {{ $errors->has('is_new') ? 'is-invalid' : '' }}">
                                            <input type="checkbox" name="is_new" id="is_new" value="1"
                                                {{ old('is_new', $product->is_new) == 1 ? 'checked' : '' }}>
                                            <label for="is_new">
                                                 New Arrivals
                                            </label>
                                        </div>

                                        @if ($errors->has('is_new'))
                                            <span class="text-danger">
                                                {{ $errors->first('is_new') }}
                                            </span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.is_new_helper') }}
                                        </span>
                                    </div>

                                    {{-- <div class="form-group col-2">
                                        <label class="required">
                                            {{ trans('cruds.product.fields.in_stock') }}
                                        </label>

                                        <select class="form-control {{ $errors->has('in_stock') ? 'is-invalid' : '' }}"
                                            name="in_stock" id="in_stock" required>
                                            <option value disabled
                                                {{ old('in_stock', $product->in_stock) === null ? 'selected' : '' }}>
                                                {{ trans('global.pleaseSelect') }}
                                            </option>

                                            @foreach (App\Models\Product::IN_STOCK_SELECT as $key => $label)
                                                <option value="{{ $key }}"
                                                    {{ old('in_stock', $product->in_stock) == $key ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('in_stock'))
                                            <span class="text-danger">
                                                {{ $errors->first('in_stock') }}
                                            </span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.in_stock_helper') }}
                                        </span>
                                    </div> --}}

                                    <div class="form-group col-3">
                                        <label class="required">
                                            {{ trans('cruds.product.fields.status') }}
                                        </label>

                                        <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                            name="status" id="status" required>
                                            <option value disabled {{ old('status', $product->status) === null ? 'selected' : '' }}>
                                                {{ trans('global.pleaseSelect') }}
                                            </option>

                                            @foreach (App\Models\Product::STATUS_SELECT as $key => $label)
                                                <option value="{{ $key }}"
                                                    {{ old('status',  $product->status) == $key ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('status'))
                                            <span class="text-danger">
                                                {{ $errors->first('status') }}
                                            </span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.status_helper') }}
                                        </span>
                                    </div>
                                    <?php /* ?>
                                    <div class="form-group col-6">
                                        <label class="required">
                                            @lang('cruds.product.fields.gallery')
                                        </label>

                                        <div class="input-field">
                                            <div class="input-images" style="padding-top: .5rem;"></div>
                                        </div>

                                        @if ($errors->has('gallery'))
                                            <span class="text-danger">
                                                {{ $errors->first('gallery') }}
                                            </span>
                                        @endif
                                    </div>
                                    <?php */ ?>
                                    <div class="form-group col-6">
                                        <label for="description" class="required">
                                            {{ trans('cruds.product.fields.description') }}
                                        </label>
                                        <textarea
                                            class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                            name="description" id="editor" required>{!! old('description', $product->description) !!}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">
                                                {{ $errors->first('description') }}
                                            </span>
                                        @endif
                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.description_helper') }}
                                        </span>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="details" class="required">
                                            {{ trans('cruds.product.fields.detail') }}
                                        </label>
                                        <textarea
                                            class="form-control editor-details {{ $errors->has('details') ? 'is-invalid' : '' }}"
                                            name="details" id="detail" required>{!! old('details',$product->details) !!}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">
                                                {{ $errors->first('description') }}
                                            </span>
                                        @endif
                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.description_helper') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="productAttributes">
                            <button class="btn btn-block btn-link text-dark font-weight-bold text-left text-uppercase collapsed"
                                type="button" data-toggle="collapse" data-target="#productAttribute" aria-expanded="false"
                                aria-controls="productAttribute">
                                @lang('cruds.product.product_attributes')
                            </button>
                        </div>
                        <div id="productAttribute" class="collapse" aria-labelledby="productAttributes"
                            data-parent="#accordionProduct">
                            <div class="card-body" id="attributeBLock">
                            <div class="row">
@if (isset($attributes) && $attributes->count()>0)
@foreach ($attributes as $akey => $attribute)
    @php
        $attributeVal = App\Models\Attribute::where('id', $attribute->attribute_id)
                ->where('status', 1)
                ->select(['id', 'name'])
                ->first();
                $checknew=$attributeVal->attribute_values()->pluck('id')->toArray();
                $attributeVal->toArray();
        $attributeValues = [];
        if(isset($checknew)){

          $attributeValues = App\Models\AttributeValue::whereIn('id', $checknew)
                  ->where('status', 1)
                  ->select(['id', 'value'])
                  ->get()
                  ->toArray();
        }
    @endphp
    <div class="form-group col-3">
      <label for="attributeLabel_{{$akey}}">
          {{ $attributeVal['name'] }}
      </label>
      <select
          class="form-control"
          name="attributes[{{ $attribute->attribute_id}}]" id="attributeLabel_{{ $attribute->attribute_id}}">
            <option value="">
                  Select {{ $attributeVal['name'] }}
              </option>
          @foreach ($attributeValues as $id => $entry)
              <option value="{{ $entry['id'] }}" @if ($entry['id'] == $attribute->attribute_value_id)
                  selected
              @endif>
                  {{ $entry['value'] }}
              </option>
          @endforeach
      </select>
  </div>
@endforeach
@endif


</div>


                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="productVariants">
                            <button class="btn btn-block btn-link text-dark font-weight-bold text-left text-uppercase collapsed"
                                type="button" data-toggle="collapse" data-target="#productVariant" aria-expanded="false"
                                aria-controls="productVariant">
                                @lang('cruds.product.product_variants')
                            </button>
                            {{-- <button class="btn btn-info btn-add-more float-right" title="{{ trans('global.add_more') }}">
                                <i class="fas fa-plus-circle"></i>
                            </button> --}}
                        </div>

                        <div id="productVariant" class="collapse" aria-labelledby="productVariants"
                            data-parent="#accordionProduct">
                            <div class="card-body" id="variationBLock">
                                @if(isset($colors) && $colors->count() > 0)
                            @foreach ($colors as $ckey => $color)

    <div class="accordion" id="accordionVariation">
        <div class="card">
            <div class="card-header" id="colorHeading{{ $loop->iteration }}">
                <div class="row">
                <div class="col-2">
                        <div class="icheck-primary {{ $errors->has('same_price') ? 'is-invalid' : '' }}" style="display : inline-block";>
                            <input type="checkbox" name="same_price[]" id="same_price{{ $color->id }}"
                                class="same-price" data-number="{{ $color->id }}"
                                value="{{ $loop->iteration }}" {{ old('same_price', 0) == 1 ? 'checked' : '' }} style="display: inline-block;">
                            <label for="same_price{{ $color->id }}">
                            </label>
                            <span >For all sizes</span>
                        </div>

                         {{-- <div class="icheck-primary {{ $errors->has('same_price') ? 'is-invalid' : '' }}">
                            <input type="checkbox" name="same_price[]" id="same_price{{ $color->id }}"
                                class="same-price" data-number="{{ $color->id }}"
                                value="{{ $loop->iteration }}" {{ old('same_price', 0) == 1 ? 'checked' : '' }}>
                            <label for="same_price{{ $color->id }}">
                                {{ trans('cruds.product.fields.same_price') }}
                            </label>
                        </div> --}}

                        <button class="btn btn-link  text-dark font-weight-bold text-left text-uppercase"
                            type="button" data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}"
                            aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}" style="width : 80% !important;">
                            <span class="mr-2"
                                style="height: 20px; background: {{ $color->value }}; color: {{ $color->value }};">
                                {{ $color->value }}
                            </span>
                            {{ $color->name }}
                        </button>
                    </div>
                    <div class="form-group col-2">
                        <input class="form-control"
                            type="text" name="single_price_{{ $color->id }}" id="txtSinglePrice_{{ $color->id }}"
                            value="" onblur="txtSinglePrice('{{ $color->id }}')" onkeypress="return isFloat(event)"
                            maxlength="10" placeholder="{{ trans('cruds.product.fields.single_price') }}" disabled>
                    </div>
                    <div class="form-group col-2">
                        <input class="form-control"
                            type="text" name="single_price_quantity_{{ $color->id }}" id="txtSinglePrice_quantity_{{ $color->id }}"
                            value="" onblur="txtSinglePriceQuantity('{{ $color->id }}')" onkeypress="return isFloat(event)"
                            maxlength="10" placeholder="Single Price Qty" disabled>
                    </div>
                    <div class="form-group col-2">
                        <input class="form-control txtWholesalePrice"
                            type="text" name="wholesale_price_{{ $color->id }}" id="txtWholesalePrice_{{ $color->id }}"
                            value=""  onblur="txtWholesalePrice('{{ $color->id }}')" onkeypress="return isFloat(event)"
                            maxlength="10" placeholder="{{ trans('cruds.product.fields.wholesale_price') }}" disabled>
                    </div>
                    <div class="form-group col-2">
                        <input class="form-control"
                            type="text" name="wholesale_price_quantity_{{ $color->id }}" id="txtWholesalePrice_quantity_{{ $color->id }}"
                            value="" onblur="txtWholesalePriceQuantity('{{ $color->id }}')" onkeypress="return isFloat(event)"
                            maxlength="10" placeholder="Wholesale Price Qty" disabled>
                    </div>
                    <div class="col-1">
                        {{-- <div class="icheck-primary {{ $errors->has('same_price') ? 'is-invalid' : '' }}">
                            <input type="checkbox" name="same_price[]" id="same_price{{ $color->id }}"
                                class="same-price" data-number="{{ $color->id }}"
                                value="{{ $loop->iteration }}" {{ old('same_price', 0) == 1 ? 'checked' : '' }}>
                            <label for="same_price{{ $color->id }}">
                                {{ trans('cruds.product.fields.same_price') }}
                            </label>
                        </div> --}}

                        <div class="icheck-primary m-5 {{ $errors->has('same_price') ? 'is-invalid' : '' }}"">
                            <input type="checkbox" name="sameforall[]" id="sameforall_{{ $color->id }}"
                                class="same_for_all" data-number="{{ $color->id }}"
                                value="{{ $loop->iteration }}" disabled>
                            <label for="sameforall_{{ $color->id }}"></label>
                            <span >Same qty for all</span>
                        </div>
                    </div>
                    <div class="col-1">
                        {{-- <div class="">
                            <input type="checkbox" name="primary[{{$color->id}}]" value="1" class="foo" @if (isset($product->productProductVariations()->where('color_id',$color->id)->first()->primary_variation) && $product->productProductVariations()->where('color_id',$color->id)->first()->primary_variation == 1)
                            checked
                            @endif required>
                            <label >

                            </label>
                        </div> --}}

                        <div class="icheck-primary">
                            <input type="checkbox" name="primary[{{ $color->id }}]" id="primarydata{{$color->id}}" data-member="{{$color->id}}"
                                 value="1" data-toggle='tooltip' data-placement='right' data-original-title="tooltip here" class='checkbox'
                                 @if (isset($product->productProductVariations()->where('color_id',$color->id)->first()->primary_variation) && $product->productProductVariations()->where('color_id',$color->id)->first()->primary_variation == 1)
                            checked
                            @endif >
                                 <label for="primarydata{{$color->id}}"></label>
                                 <span >Primary Variation</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="collapse{{ $loop->iteration }}" class="collapse {{ $ckey ? '' : 'show' }}"
                aria-labelledby="colorHeading{{ $loop->iteration }}" data-parent="#accordionVariation">
                <div class="card-body">
                    <div class="row">
                      {{-- <div class="form-group col-12">
                        <input type="hidden" name="color_id[]" value="{{ $color->id }}">
                        <div class="input-field">
                            <div custom1="{{ $color->id }}" class="input-images-{{$ckey}} input-new" style="padding-top: .5rem;"></div>
                        </div>
                      </div> --}}
                      <?php
                    //   dd($color->id);
                      $proimages = DB::table('product_images')
                                ->where('product_id' ,$product->id)
                                ->where('product_color_id', $loop->iteration)
                                ->select('file_name')
                                ->get();
                      $myloop = $loop->iteration;
                      ?>
                      @foreach($proimages as $img)
                      <div class="col-2" id="{{strtok($img->file_name, '.')}}">
                        <div class="border p-2" id="add-image">
                            <i class="fa fa-times" style="" id="img-cross"> </i>
                            <img src="{{asset("file/$img->file_name")}}" class="w-100" style="height : 150px;">
                            <input type="hidden" name="gallery[{{$myloop}}][]" value="{{$img->file_name}}">
                        </div>
                      </div>
                      @endforeach

                      <div class="col-2" id="before-btn-{{$loop->iteration}}">
                        <div class="w-100" style="height : 170px;">
                            <button type="button" class="btn btn-primary btn-circle btn-sm center-block" style="margin-top : 40%; margin-left : 30px;" id="img-add-btn" data-id="color-{{$loop->iteration}}" onclick="load_media({{$loop->iteration}})">
                                <i class="fa fa-lg fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                      </div>

                        <?php /* ?>
                        <div class="form-group col-4">
                            @include('partials.single-image-upload', [
                            'input_name' => 'front_image[]',
                            'lable_name' => trans('cruds.product.fields.front_image'),
                            'image_view_name' => 'front_image_view',
                            'image_error_name' => 'front_image_error',
                            'required' => '',
                            'image_url' => ''
                            ])
                        </div>

                        <div class="form-group col-4">
                            @include('partials.single-image-upload', [
                            'input_name' => 'back_image[]',
                            'lable_name' => trans('cruds.product.fields.back_image'),
                            'image_view_name' => 'back_image_view',
                            'image_error_name' => 'back_image_error',
                            'required' => '',
                            'image_url' => ''
                            ])
                        </div>
                        <?php */ ?>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <label>
                            Size
                                    </label>
                                </div>
                                <div class="col-2">
                                    <label>
                            Single Price
                                    </label>
                                </div>
                                <div class="col-2">
                                    <label>
                            Single Price Qty
                                    </label>
                                </div>
                                <div class="col-2">
                                    <label>
                            Wholesale Price
                                    </label>
                                </div>
                                <div class="col-2">
                                    <label>
                            Wholesale Price Qty
                                    </label>
                                </div>
                                <div class="col-2">
                                    <label>
                            Stock
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($sizes as $key => $size)

                                    <div class="col-2">
                                        <div class="icheck-primary {{ $errors->has('sizes') ? 'is-invalid' : '' }}">
                                            <input type="checkbox" name="variation[{{ $color->id }}][sizes][]"
                                                id="cbSize{{ $ckey }}{{ $loop->iteration }}" value="{{ $size->id.','.$key }}"
                                                {{ old('sizes', $product->productProductVariations->where('color_id',$color->id)->where('size_id',$size->id)->first()->status??'') == 1 ? 'checked' : '' }}>
                                            <label for="cbSize{{ $ckey }}{{ $loop->iteration }}">
                                                {{ $size->name . ' (' . $size->value . ')' }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-2">
                                        <input class="form-control single_price_{{ $color->id }} {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                            type="text" name="variation[{{ $color->id }}][single_price][]" id="txtSinglePrice_{{ $loop->iteration }}_{{$size->id}}"
                                            value="{{ old('price',$product->productProductVariations->where('color_id',$color->id)->where('size_id',$size->id)->first()->single_price??'') }}" onkeypress="return isFloat(event)"
                                            maxlength="10" placeholder="{{ trans('cruds.product.fields.single_price') }}">
                                    </div>


                                    <div class="form-group col-2">
                                        <input class="form-control single_price_quantity_{{ $color->id }} {{ $errors->has('single_price_quantity') ? 'is-invalid' : '' }}"
                                            type="text" name="variation[{{ $color->id }}][single_price_quantity][]" value="{{ old('single_price_quantity',$product->productProductVariations->where('color_id',$color->id)->where('size_id',$size->id)->first()->single_price_quantity ?? '') }}"
                                            placeholder="Single Price Quantity"
                                            onkeypress="return isFloat(event)" maxlength="8">
                                    </div>

                                    <div class="form-group col-2">
                                        <input class="form-control wholesale_price_{{ $color->id }} {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                            type="text" name="variation[{{ $color->id }}][wholesale_price][]" id="txtWholesalePrice{{ $loop->iteration }}"
                                            value="{{ old('price',$product->productProductVariations->where('color_id',$color->id)->where('size_id',$size->id)->first()->wholesale_price??'') }}" onkeypress="return isFloat(event)"
                                            maxlength="10" placeholder="{{ trans('cruds.product.fields.wholesale_price') }}">
                                    </div>
                                    <div class="form-group col-2">
                                        <input class="form-control wholesale_price_quantity_{{ $color->id }} {{ $errors->has('wholesale_price_quantity') ? 'is-invalid' : '' }}"
                                            type="text" name="variation[{{ $color->id }}][wholesale_price_quantity][]" value="{{ old('wholesale_price_quantity',$product->productProductVariations->where('color_id',$color->id)->where('size_id',$size->id)->first()->wholesale_price_quantity ?? '') }}"
                                            placeholder="Wholesale Price Quantity"
                                            onkeypress="return isFloat(event)" maxlength="8">
                                    </div>


                                    <div class="form-group col-2">
                                        <select
                                            class="form-control {{ $errors->has('size_status') ? 'is-invalid' : '' }}"
                                            name="variation[{{ $color->id }}][size_status][]" id="size_status" required>
                                            <option value disabled
                                                {{ old('size_status', $product->productProductVariations->where('color_id',$color->id)->where('size_id',$size->id)->first()->size_status??'') === null ? 'selected' : '' }}>
                                                {{ trans('global.pleaseSelect') }}
                                            </option>

                                            @foreach (App\Models\Product::IN_STOCK_SELECT as $key => $label)
                                                <option value="{{ $key }}"
                                                    {{ old('size_status', 1) == $key ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('size_status'))
                                            <span class="text-danger">
                                                {{ $errors->first('size_status') }}
                                            </span>
                                        @endif

                                        <span class="help-block">
                                            {{ trans('cruds.product.fields.status_helper') }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endif
                            </div>
                        </div>
                    </div>

                    <!-- <div class="card">
                        <div class="card-header" id="headingThree">
                            <button
                                class="btn btn-link text-dark font-weight-bold btn-block text-left text-uppercase collapsed"
                                type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">

                                {{-- BULG CARD --}}
                                {{-- @lang('cruds.product.bulk_product') --}}
                            </button>
                        </div>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionProduct">
                            <div class="card-body">
                                Comming Soon
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="row">
                    <div class="col-12 text-right">
                        <button class="btn btn-success sub" type="button">
                            {{ trans('global.update') }}
                        </button>
                    </div>
                </div>
                <!-- <div class="input-field">
                <label class="active">Photos</label>
                <div class="input-images-2" style="padding-top: .5rem;"></div>
            </div> -->
            </form>
        </div>
    </div>
@include('admin.upload.multiple')
@endsection

@section('scripts')
@include('admin.mediascript.multiple')
    <script>
        var mycolor =  <?php echo json_encode($colors); ?>;

        var color_ids = [];
        for(var r=0 ; r < mycolor.length ; r++){
            color_ids.push(mycolor[r].id);
        }

        var all_id = 0;
        var global_color = <?php echo json_encode($colors); ?>;

        $(document).on('click','input:checkbox[id^="primarydata"]', function(){
          var id = $(this).attr('id');

          $this = $(this);
          var j = 0;
          for (i = 0; i < color_ids.length; ++i) {
            j++;
            if( $(document).find(`#primarydata${color_ids[i]}`).is(':checked')){
                document.getElementById(`primarydata${color_ids[i]}`).checked = false;
            }

          }
          document.getElementById(id).checked = true;

        });

        $(document).on('click','.same-price', function(){
          var str = $(this).attr('id');
          var id = str.substring(10);
          if($(this).is(':checked')){
            $(document).find(`#txtSinglePrice_${id}`).removeAttr('disabled');
            $(document).find(`#txtSinglePrice_quantity_${id}`).removeAttr('disabled');
            $(document).find(`#txtWholesalePrice_${id}`).removeAttr('disabled');
            $(document).find(`#txtWholesalePrice_quantity_${id}`).removeAttr('disabled');
          }
          else{
            $(document).find(`#txtSinglePrice_${id}`).attr('disabled', true);
            $(document).find(`#txtSinglePrice_quantity_${id}`).attr('disabled',true);
            $(document).find(`#txtWholesalePrice_${id}`).attr('disabled', true);
            $(document).find(`#txtWholesalePrice_quantity_${id}`).attr('disabled', true);
            }
        });

        function txtSinglePriceQuantity(id){
          $(".single_price_quantity_"+id).each(function() {
            $(this).val($('#txtSinglePrice_quantity_'+id).val());
          });
        }

        function txtWholesalePriceQuantity(id){
          $(".wholesale_price_quantity_"+id).each(function() {
            $(this).val($('#txtWholesalePrice_quantity_'+id).val());
          });
        }


    </script>
    <script>
        let imagesInputName = 'gallery[]';
        let token = "{{ csrf_token() }}";
        let pleaseSelect = "{{ trans('global.pleaseSelect') }}";
        // let subCategoryURL = "{{ route('admin.category.subCategories') }}";
        let subCategoryURL = "{{ route('admin.product.map.subcategories') }}";
        let attributeURL = "{{ route('admin.product.attributes') }}";
        let sizes = brands = colors = [];
        let  preloaded= [];

        $(document).on('input',`input[type="text"]`,function(){
            var i;
            var j = 0;
            var visible = false;
            for (i = 0; i < global_color.length; ++i) {
                j++;

                var single_price = $(document).find(`#txtSinglePrice_${j}`).val();
                var single_qty = $(document).find(`#txtSinglePrice_quantity_${j}`).val();
                var wholesale_price = $(document).find(`#txtWholesalePrice_${j}`).val();
                var wholesale_qty = $(document).find(`#txtWholesalePrice_quantity_${j}`).val();


                if(single_price !== '' && single_qty !== '' && wholesale_price !== '' && wholesale_qty  !== ''){
                    visible = true;
                }
            }

            if(visible){
                $(document).find('[id^="sameforall_"]').removeAttr('disabled');
            }
            else{
                $(document).find('[id^="sameforall_"]').attr('disabled',true);
            }

        });

        $(document).on('click','[id^="sameforall_"]', function(){
            var id = $(this).attr('data-number');
            all_id = id;
            if($(this).is(':checked')){
                $(document).find('[id^="sameforall_"]').attr('checked',true) ;
                var single_price = $(document).find(`#txtSinglePrice_${id}`).val();
                var single_qty = $(document).find(`#txtSinglePrice_quantity_${id}`).val();
                var wholesale_price = $(document).find(`#txtWholesalePrice_${id}`).val();
                var wholesale_qty = $(document).find(`#txtWholesalePrice_quantity_${id}`).val();

                var i;
                var j = 0;
                for (i = 0; i < global_color.length; ++i) {
                    j++;
                    if(all_id !== j)
                    {
                        $(document).find(`#txtSinglePrice_${j}`).val(single_price);
                        $(document).find(`#txtSinglePrice_quantity_${j}`).val(single_qty);
                        $(document).find(`#txtWholesalePrice_${j}`).val(wholesale_price);
                        $(document).find(`#txtWholesalePrice_quantity_${j}`).val(wholesale_qty);

                        $(document).find(`input[name="variation[${j}][single_price][]"]`).val(single_price);
                        $(document).find(`input[name="variation[${j}][single_price_quantity][]"]`).val(single_qty);
                        $(document).find(`input[name="variation[${j}][wholesale_price][]"]`).val(wholesale_price);
                        $(document).find(`input[name="variation[${j}][wholesale_price_quantity][]"]`).val(wholesale_qty);

                        $(document).find(`input:checkbox[id^="cbSize${i}"]`).attr('checked', true);
                    }
                }
            }
            else{

                $(document).find('[id^="sameforall_"]').attr('checked',false) ;
                $(document).find(`#txtSinglePrice_${id}`).val('');
                $(document).find(`#txtSinglePrice_quantity_${id}`).val('');
                $(document).find(`#txtWholesalePrice_${id}`).val('');
                $(document).find(`#txtWholesalePrice_quantity_${id}`).val('');

                var i;
                var j = 0;
                for (i = 0; i < global_color.length; ++i) {
                    j++;
                    if(id !== j)
                    {
                        $(document).find(`#txtSinglePrice_${j}`).val('');
                        $(document).find(`#txtSinglePrice_quantity_${j}`).val('');
                        $(document).find(`#txtWholesalePrice_${j}`).val('');
                        $(document).find(`#txtWholesalePrice_quantity_${j}`).val('');

                        $(document).find(`input[name="variation[${j}][single_price][]"]`).val('');
                        $(document).find(`input[name="variation[${j}][single_price_quantity][]"]`).val('');
                        $(document).find(`input[name="variation[${j}][wholesale_price][]"]`).val('');
                        $(document).find(`input[name="variation[${j}][wholesale_price_quantity][]"]`).val('');

                        $(document).find(`input:checkbox[id^="cbSize${i}"]`).attr('checked', false);
                    }
                }

                $(document).find('[id^="sameforall_"]').attr('checked',false);
                $(document).find('[id^="sameforall_"]').attr('disabled',true);
            }
        });
    </script>

    <script src="{{ asset('assets/js/image-uploader.js') }}"></script>

    <script>
        function txtSinglePrice(id){
          $(".single_price_"+id).each(function() {
            $(this).val($('#txtSinglePrice_'+id).val());
          });
        }
        function txtWholesalePrice(id){
          $(".wholesale_price_"+id).each(function() {
            $(this).val($('#txtWholesalePrice_'+id).val());
          });
        }
        $(document).ready(function() {
            $('.attributes').click(function() {
                $('#is_attribute').val("1");
            });

            $(document).on('change', '#has_varient', function() {
                let varient = $(this).val();

                if (varient == 1) {
                    $('.no-varient').hide();
                    $('.has-varient').show()
                } else {
                    $('.no-varient').show();
                    $('.has-varient').hide()
                }
            });

            $('.same-price').on('click', function() {
                let number = $(this).data('number');

                if ($(this).prop('checked') == true) {
                    $('#txtPrice' + number).val($('#txtMRPPrice').val())
                        .prop('readonly', true)
                        .attr("disabled", true);
                } else {
                    $('#txtPrice' + number).val('')
                        .prop('readonly', false)
                        .attr("disabled", false);
                }
            });

            $('#optCategory').change(function() {
                let parent_id = $(this).val();
                $('#optSubCategoryChild').empty().append(new Option(pleaseSelect));

                $('#child-category').hide();
                if (parent_id) {
                    $.ajax({
                        url: subCategoryURL,
                        data: {
                            _token: token,
                            parent_id: parent_id
                        },
                        method: 'POST',
                        success: function(res) {
                            console.log(res);
                            $('#optSubCategory').empty().append(new Option(pleaseSelect));

                            if (res.success) {
                                res.subCategories.map((item) => {
                                    $('#optSubCategory').append(new Option(item.name,
                                        item.id));
                                });
                            } else {
                                swal({
                                    title: "Warning",
                                    text: res.message,
                                    type: "warning",
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            }
                        },
                        failure: function(status) {
                            console.log(status);
                        }
                    });
                } else {
                    $('#optSubCategory').empty().append(new Option(pleaseSelect));
                }
            });

            let pleaseSelect = "{{ trans('global.pleaseSelect') }}";
            $('#optSubCategory').change(function() {
                let sub_category_id = $(this).val();
                let category_id = $('#optCategory').val();
                $('#attributeBLock').html('<div class="text-center">Please select sub category first!!</div>');
                if (sub_category_id > 0 && category_id > 0) {
                    $.ajax({
                        url: attributeURL,
                        data: {
                            _token: token,
                            category_id: category_id,
                            sub_category_id: sub_category_id,
                        },
                        method: 'POST',
                        success: function(res) {
                            console.log('Here');
                            console.log(res);
                            if (!res.success) {

                                swal({
                                    title: "error",
                                    text: res.message,
                                    type: "error",
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            }

                            var child = res.child_category;

                            if(child !== null){
                                var childname = child.name;
                                var childid = child.id;

                                $('#optSubCategoryChild').empty().append(new Option(pleaseSelect));
                                $('#optSubCategoryChild').append(
                                    // new Option(childname,childid)
                                    `<option value="${childid}">${childname}</option>`
                                  );
                                $('#cover').fadeOut(4000);
                                $('#child-category').delay(4000).show();
                            }
                            else{
                                $('#optSubCategoryChild').hide();
                            }

                            $('#variationBLock').html(res.html);
                            $('#attributeBLock').html(res.attribute_html);
                            $('.same-price').change(function() {
                                let id = $(this).attr( "data-number" );
                                if(this.checked) {
                                    $('#txtSinglePrice_'+id).removeAttr( "disabled" );
                                    $('#txtWholesalePrice_'+id).removeAttr( "disabled" );
                                }else{
                                  $('#txtSinglePrice_'+id).attr( "disabled",'disabled');
                                  $('#txtWholesalePrice_'+id).attr( "disabled",'disabled' );
                                }
                            });

                            mycolor = res.colors;
                            color_ids = [];
                            var my_id = 0;
                            for(var r=0 ; r < mycolor.length ; r++){
                                my_id++;
                                color_ids.push(my_id);
                            }

                            res.colors.forEach(element => {
                              $('#clr'+element.id).imageUploader();
                            });
                        },
                        failure: function(status) {
                            console.log(status);
                        }
                    });
                }
                let parent_id = $(this).val();
                if (parent_id == "Please select") {
                    $('#optSubCategoryChild').empty().append(new Option(pleaseSelect))
                }
                else{
                    if (parent_id) {
                    $.ajax({
                        url: subCategoryURL,
                        data: {
                            _token: token,
                            parent_id: parent_id
                        },
                        method: 'POST',
                        success: function(res) {

                            console.log('Response');
                            console.log(res);
                            console.log('Error');
                            // $('#optSubCategoryChild').empty().append(new Option(pleaseSelect));

                            // if (res.success) {
                            //     res.subCategories.map((item) => {
                            //         $('#optSubCategoryChild').append(new Option(item.name,
                            //             item.id));
                            //     });
                            // } else {
                            //     swal({
                            //         title: "Warning",
                            //         text: "Sub Child Category not Exists in selected sub category",
                            //         type: "warning",
                            //         timer: 3000,
                            //         showConfirmButton: false
                            //     });
                            // }
                        },
                        failure: function(status) {
                            console.log(status);
                        }
                    });
                } else {
                    // $('#optSubCategoryChild').empty().append(new Option(pleaseSelect));
                }
            }

            setTimeout(() => {
                for (let index = 0; index < $(".input-new").children().length; index++) {
                    const element = $(".input-new").children()[index];
                    const id=$(".input-new")[index].getAttribute('custom1');
                    element.children[0].setAttribute('name','gallery['+id+'][]');
                }
               }, 1000);
            });
        })
    </script>
    <script>
        $(function() {
            $('.delete-image').click(function() {
                alert('ndfk snlsdlsd');
            });

            $('.input-images').imageUploader();
        });
    </script>

    <script>
        Dropzone.options.frontImageDropzone = {
            url: '{{ route('admin.products.storeMedia') }}',
            maxFilesize: 1, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 1,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="front_image"]').remove()
                $('form').append('<input type="hidden" name="front_image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="front_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($product) && $product->front_image)
                    var file = {!! json_encode($product->front_image) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="front_image" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.backImageDropzone = {
            url: '{{ route('admin.products.storeMedia') }}',
            maxFilesize: 1, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 1,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="back_image"]').remove()
                $('form').append('<input type="hidden" name="back_image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="back_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($product) && $product->back_image)
                    var file = {!! json_encode($product->back_image) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="back_image" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('admin.products.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                                e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $product->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>
<script>
	initSample();

</script>

<script type="text/javascript">
      CKEDITOR.replace( 'details' );
      CKEDITOR.add
</script>

<script>
       let newloaded=[];
       @foreach($images as $key => $value)
       if( newloaded["{{$value['product_color_id']}}"] === undefined )
        newloaded["{{$value['product_color_id']}}"] = []
        newloaded["{{$value['product_color_id']}}"].push({id: "{{$value['id']}}", src: `{{asset('/storage/product').'/'.$value['file_name']}}`})
       @endforeach

       @foreach($colors as $key => $value)

            $(function () {
            let preloaded=newloaded["{{$value->id}}"];
                $('.input-images-'+'{{$key}}').imageUploader({
                    preloaded: preloaded,
                    imagesInputName: 'photos',
                    preloadedInputName: 'old',
                    maxSize: 2 * 1024 * 1024,
                    maxFiles: 10
                });
                $('.fkfnewform').on('submit', function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    let $form = $(this),
                        $modal = $('.modal');

                    // Set name and description
                    $modal.find('#display-name span').text($form.find('input[id^="name"]').val());
                    $modal.find('#display-description span').text($form.find('input[id^="description"]').val());

                    // Get the input file
                    let $inputImages = $form.find('input[name^="images"]');
                    if (!$inputImages.length) {
                        $inputImages = $form.find('input[name^="photos"]')
                    }

                    // Get the new files names
                    let $fileNames = $('<ul>');
                    for (let file of $inputImages.prop('files')) {
                        $('<li>', {text: file.name}).appendTo($fileNames);
                    }

                    // Set the new files names
                    $modal.find('#display-new-images').html($fileNames.html());

                    // Get the preloaded inputs
                    let $inputPreloaded = $form.find('input[name^="old"]');
                    if ($inputPreloaded.length) {

                        // Get the ids
                        let $preloadedIds = $('<ul>');
                        for (let iP of $inputPreloaded) {
                            $('<li>', {text: '#' + iP.value}).appendTo($preloadedIds);
                        }

                        // Show the preloadede info and set the list of ids
                        $modal.find('#display-preloaded-images').show().html($preloadedIds.html());

                    } else {

                        // Hide the preloaded info
                        $modal.find('#display-preloaded-images').hide();

                    }

                    // Show the modal
                    $modal.css('visibility', 'visible');
                });

                // Input and label handler
                $('input').on('focus', function () {
                    $(this).parent().find('label').addClass('active')
                }).on('blur', function () {
                    if ($(this).val() == '') {
                        $(this).parent().find('label').removeClass('active');
                    }
                });

                // Sticky menu
                let $nav = $('nav'),
                    $header = $('header'),
                    offset = 4 * parseFloat($('body').css('font-size')),
                    scrollTop = $(this).scrollTop();

                // Initial verification
                setNav();

                // Bind scroll
                $(window).on('scroll', function () {
                    scrollTop = $(this).scrollTop();
                    // Update nav
                    setNav();
                });

                function setNav() {
                    if (scrollTop > $header.outerHeight()) {
                        $nav.css({position: 'fixed', 'top': offset});
                    } else {
                        $nav.css({position: '', 'top': ''});
                    }
                }
            });
       @endforeach

       setTimeout(() => {
            $('.delete-image').click(function() {
                $.ajax({
                    url: "{{route('admin.product-images.destroy.new')}}",
                    data: {
                        _token: token,
                        id: $(this).parent().children('input').val()
                    },
                    method: 'POST',
                    success: function(res) {
                        swal({
                                title: "Success",
                                text: "Image Deleted Successfully",
                                type: "success",
                                timer: 3000,
                                showConfirmButton: false
                            });
                    },
                    failure: function(status) {
                        console.log(status);
                    }
                });
                console.log($(this).parent().children('input').val());
            });
       }, 2000);
</script>

<script>
    $('.sub').click(function() {
        $('#formupdate').submit();
        console.log("clicked");
    })
    setTimeout(() => {
    for (let index = 0; index < $(".input-new").children().length; index++) {
        const element = $(".input-new").children()[index];
        const id=$(".input-new")[index].getAttribute('custom1');
        element.children[0].setAttribute('name','gallery['+id+'][]');
    }
}, 1000);
</script>


<script>
    $('.foo').click(function(){
        if($(this).prop("checked") == true){
            $('.foo').attr('disabled', 'disabled');
            $('.foo').val("0");
            $(this).attr('disabled', false);
            $(this).val("1");
        }
        else{
            $('.foo').attr('disabled', false);
            $('.foo').val("1");
        }
    })
</script>
@endsection
