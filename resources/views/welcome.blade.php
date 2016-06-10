@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-hero">
    <div class="container">
        <h1>Hello World</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sign up for future updates</div>

                <div class="panel-body">
                    {!! Form::open(['url' => '/signup', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        <!-- Full Name Form Field -->
                        <fieldset class="form-group">
                            {!! Form::label('name', 'Full Name', ['class' => 'control-label col-md-4']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </fieldset>

                        <!-- E-mail Address Form Field -->
                        <fieldset class="form-group">
                            {!! Form::label('email', 'E-mail Address', ['class' => 'control-label col-md-4']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Sign Up', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
