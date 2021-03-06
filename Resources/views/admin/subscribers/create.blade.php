<script src='https://www.google.com/recaptcha/api.js'></script>
@extends('layouts.master')
@section('content-header')
    <h1>
        {{ trans('inewsletter::subscribers.title.create subscribers') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.inewsletter.subscribers.index') }}">{{ trans('inewsletter::subscribers.title.subscribers') }}</a></li>
        <li class="active">{{ trans('inewsletter::subscribers.title.create subscribers') }}</li>
    </ol>
@stop

@section('content')

    {!! Form::open(['route' => ['admin.inewsletter.subscribers.store'],'id'=>'i-recaptcha', 'method' => 'post']) !!}

    @if ($errors->has('g-recaptcha-response'))
        <span class="help-block">
            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
        </span>
    @endif

    {{csrf_field()}}
    <div class="row">
        <div class="col-md-12">
                @include('inewsletter::admin.subscribers.partials.create-fields')
                    <div class="box-footer">
                        @captcha
                        <button
                                class="btn btn-primary btn-flat g-recaptcha"
                                data-callback="submit">
                            {{trans('core::core.button.create')}}
                        </button>

                        <a class="btn btn-danger pull-right btn-flat"
                           href="{{ route('admin.inewsletter.subscribers.index')}}">
                            <i class="fa fa-times"></i>
                            {{ trans('core::core.button.cancel') }}
                        </a>
                    </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.inewsletter.subscribers.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
