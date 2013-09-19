@extends('layouts.master')

@section('content')
<div class="container">
    <div class="page-header"><h1>Create an application</h1></div>
    <div class="row">
        <div class="col-lg-6">
            {{ Form::model($application, array('route' => array('application.store'))) }}
                <div class="form-group @if($errors->has('title')) has-error @endif">
                    {{ Form::label('title', 'Title', array('class' => 'control-label')) }}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                    {{ Form::text('title', Form::getValueAttribute('title'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Description', array('class' => 'control-label')) }}
                    {{ Form::textarea('description', Form::getValueAttribute('description'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group @if($errors->has('endpoints')) has-error @endif">
                    <label class="control-label">Endpoints</label>
                    <small class="text-danger">{{ $errors->first('endpoints') }}</small>
                    <div class="checkbox">
                        <label>
                            <?php $checked = is_null(Input::old('endpoints')) ? false : in_array('event', Input::old('endpoints')); ?>
                            {{ Form::checkbox('endpoints[]', 'event', $checked) }}
                            Events &mdash;<small>Lacinia bibendum nulla sed consectetur.</small>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <?php $checked = is_null(Input::old('endpoints')) ? false : in_array('event', Input::old('endpoints')); ?>
                            {{ Form::checkbox('endpoints[]', 'candidate', $checked) }}
                            Candidates &mdash;<small>Curabitur blandit tempus porttitor</small>
                        </label>
                    </div>
                </div>
                <p>
                    By creating an application, you agree to PemiluAPI's Terms & Conditions.
                </p>
                {{ Form::button('Submit', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop