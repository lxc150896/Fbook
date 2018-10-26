@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">{{ __('admin.book.newBook') }}</h3>
                </div>
            </div>
        </div>

        <div class="m-content">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.layout.notification')
                    <div class="m-portlet m-portlet--tab">
                        {!! Form::open(['method' => 'POST', 'route' => ['book.store'], 'files' => 'true', 'class' => 'm-form m-form--fit m-form--label-align-right']) !!}
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    {!! Form::label('title', __('admin.book.title'), ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::text('title', null, ['class' => 'form-control m-input', 'placeHolder' => __('admin.book.placeHolder.title'), 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('description', __('admin.description'), ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::textarea('description', null, ['id' => 'mytextarea']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                        {!! Form::label('avatar', __('admin.book.avatar'), ['class' => 'col-2 mb-0']) !!}
                                    <div class="col-10 custom-file">
                                        {!! Form::file('avatar', ['class' => 'custom-file-input', 'id' => 'customFile', 'required' => 'requiered']) !!}
                                        {!! Form::label('customFile', 'Choose file', ['class' => 'custom-file-label col-10 ml-3']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('author', __('admin.book.author'), ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::text('author', null, ['class' => 'form-control m-input', 'placeHolder' => __('admin.book.placeHolder.author'), 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('date', __('admin.book.publishDate'), ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::date('publish_date', null, ['class' => 'form-control m-input', 'id' => 'example-datetime-local-input', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('date', __('admin.book.totalPage'), ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::number('total_pages', null, ['class' => 'form-control m-input', 'placeHolder' => __('admin.book.placeHolder.totalPage'), 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('sku', __('admin.book.sku'), ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::text('sku', null, ['class' => 'form-control m-input', 'placeHolder' => __('admin.book.placeHolder.sku'), 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('category', __('admin.book.cate'), ['class' => 'col-2']) !!}
                                    <div class="col-9">
                                        <div class="row">
                                            @foreach ($categories as $cat)
                                                <div class="col-4 mb-3">
                                                    <div class="m-checkbox-list">
                                                        <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                                            <input type="checkbox" value="{{ $cat->id }}" name="category[]" {{ $loop->first ? 'checked' : '' }}>{{ $cat->name }}
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-10">
                                            {!! Form::submit(__('admin.submit'), ['class' => 'btn btn-success']) !!}
                                            {!! Form::reset(__('admin.reset'), ['class' => 'btn btn-secondary']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{ Html::script('admin_asset/assets/tinymce/js/tinymce/tinymce.min.js') }}
    <script>
        jQuery(document).ready(function() {
            tinymce.init({
                selector: 'textarea#mytextarea'
            });
        });
    </script>
@endsection
