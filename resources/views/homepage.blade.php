@extends('layouts.index')

@if (! Auth::check())
@section('title')
    AndeTracker
@stop
@section('content')
    <div class="home text-center">
        <h2>Welcome to AndeTracker</h2>
        <p><em>Make your requests here to help Ops better serve you</em></p>
    </div>
    <div class="auth text-center">
        <a href="{{ route('login') }}" class="btn-lg btn-primary reg" role="button">SIGN IN</a>
        <a href="{{ route('signup') }}" class="btn-lg btn-primary reg signup" role="button">SIGN UP</a>
    </div>
@stop

@section('footer')
    <footer class="footer text-center">
        <div class="container footer-top">
            <p class="text-muted">&copy; {{ $year }} Andela #TIA.</p>
        </div>
    </footer>
@stop
@endif
