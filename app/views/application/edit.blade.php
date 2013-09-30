@extends('layouts.master')

@section('content')
<div class="container">
    <div class="page-header"><h1>Create an application</h1></div>
    <div class="row">
        <div class="col-lg-6">
            {{ Form::model($application, array('method' => 'put', 'route' => array('application.update', $application->id))) }}
                <div class="form-group @if($errors->has('title')) has-error @endif">
                    {{ Form::label('title', 'Title', array('class' => 'control-label')) }}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                    {{ Form::text('title', Form::getValueAttribute('title'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Description', array('class' => 'control-label')) }}
                    {{ Form::textarea('description', Form::getValueAttribute('description'), array('class' => 'form-control')) }}
                </div>

                <?php
                    // Available endpoints
                    $endpoints = $application->endpoints();

                    // Current application endpoints
                    $application->endpoints = json_decode($application->endpoints);
                ?>
                <div class="form-group @if($errors->has('endpoints')) has-error @endif">
                    <label class="control-label">Endpoints</label>
                    <small class="text-danger">{{ $errors->first('endpoints') }}</small>
                    @foreach ($endpoints as $endpoint)
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('endpoints[]', $endpoint['slug']) }}
                            {{ $endpoint['name'] }} &mdash;<small>{{ $endpoint['desc'] }}</small>
                        </label>
                    </div>
                    @endforeach
                </div>
                {{ Form::button('Update', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
