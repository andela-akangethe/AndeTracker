@extends('layouts.index')

@if (! Auth::check())
@section('title')
    AndeTracker | Login
@stop
@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="white register">
                <h5 class="text-center">Log in</h5>
                <form class="form-vertical" role="form" method="post" action="{{ route('login') }}">
                    <div class="form-group has-feedback">
                        <label for="email" class="control-label">Email</label>
                        <input type="text" name="email" class="form-control input-sm" id="email">
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
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                <a href="{{ route('signup') }}" class="text-center">
                    Register ?
                </a>
            </div>
        </div>
    </div>
@stop
@endif