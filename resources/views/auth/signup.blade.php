@extends('layouts.index')

@if (! Auth::check())
@section('title')
    AndeTracker | Sign Up
@stop
@section('content')
    <div class="row">
        <div class="col-lg-6  col-lg-offset-3">
            <div class="white register">
                <h5 class="text-center">Need an account? Register</h5>
                <form class="form-vertical" role="form" method="post" action="{{ route('signup') }}">
                    <div class="form-group has-feedback">
                        <label for="first_name" class="control-label">First Name</label>
                        <input type="text" name="first_name" class="form-control input-sm" id="first_name" value="{{ Request::old('first_name') ? : '' }}">
                        <span class="fa fa-user-plus form-control-feedback"></span>
                        @if ( $errors->has('first_name') )
                            <span class="help-block">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <label for="last_name" class="control-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control input-sm" id="last_name" value="{{ Request::old('last_name') ? : '' }}">
                        <span class="fa fa-user-plus form-control-feedback"></span>
                        @if ( $errors->has('last_name') )
                            <span class="help-block">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <label for="email" class="control-label">Email Address</label>
                        <input type="text" name="email" class="form-control input-sm" id="email" value="{{ Request::old('email') ? : '' }}">
                        <span class="fa fa-envelope form-control-feedback"></span>
                        @if ( $errors->has('email') )
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" name="password" class="form-control input-sm" id="password">
                        <span class="fa fa-unlock-alt form-control-feedback"></span>
                        @if ( $errors->has('password') )
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password" class="control-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control input-sm" id="password">
                        <span class="fa fa-unlock-alt form-control-feedback"></span>
                        @if ( $errors->has('password') )
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <button type="submit" class="btn btn-default">Sign up</button>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                <a href="{{ route('login') }}" class="text-center">
                    Already registered ?
                </a>
            </div>
        </div>
    </div>
@stop
@endif