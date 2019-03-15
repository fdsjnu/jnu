@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
         
            <div class="table-responsive">
                           <div class="panel panel-warning">
                                    <div class="panel-heading" align="center">
                                       Instructions for registration
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-12"> 
                                            <ol>
                                                <li>Fill out the New Account form with your details. </li>
                                                <li>Click on the register button to register.</li>
                                                <li>After successful registration you will be able to login to system . </li>
                                                <li>After Login click on Apply now button to see all the available job openings.</li>
                                                <li>First select the post </li>
                                                <li>Then select the department in which you want to apply </li>
                                                <li>Then select the Advertisement No. of the job you are applying form. </li>
                                                <li>Click on Apply button to start filling form.  </li>
                                            </ol>
                                        </div>
                                    </div>
                         </div>
                         <div class="panel panel-success">
                <div class="panel-heading" style="font-weight:bold" align="center">
                    New Account
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                         {!! Form::model($user, [
                                  'method' => 'POST',
                                  'route'  => 'side.signup.store',
                                  'files'  => TRUE,
                                  'id'     => 'user-form'
                        ]) !!}

<!-- 
                            <input type="hidden" name="role"value="4"/> -->
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                {!! Form::label('email') !!}
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}

                                @if($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                                <div class="form-group {{ $errors->has('email_confirmation') ? 'has-error' : '' }}">
                                {!! Form::label('email_confirmation') !!}
                                {!! Form::text('email_confirmation', null, ['class' => 'form-control']) !!}

                                @if($errors->has('email_confirmation'))
                                    <span class="help-block">{{ $errors->first('email_confirmation') }}</span>
                                @endif
                            </div>                            
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                {!! Form::label('password') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}

                                @if($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                {!! Form::label('password_confirmation') !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                                @if($errors->has('password_confirmation'))
                                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                              <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                {!! Form::label('mobile') !!}
                                {!! Form::text('mobile', null, ['class' => 'form-control']) !!}

                                @if($errors->has('mobile'))
                                    <span class="help-block">{{ $errors->first('mobile') }}</span>
                                @endif
                            </div>
                             <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                                {!! Form::label('role') !!}
                                <select class="form-control" id="role" name="role">
                                <option value="4">user</option>
                                </select>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

                  </div>
            </div>

            @include('layouts.sidebar')
        </div>
    </div>

@endsection
