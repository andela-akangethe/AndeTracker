@extends('layouts.index')

@section('title')
    AndeTracker | Dashboard
@stop
@section('admin-panel')
    @if (Auth::user()->access_level === 1)
        <div id="sidebar-wrapper">
          <ul id="sidebar-menu" class="sidebar-nav">
             <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu</a></li>
          </ul>
          <ul class="sidebar-nav" id="sidebar">     
              <li><a>Booked Items</a></li>
              <li><a>Registered Users</a></li>
          </ul>
        </div>
    @endif
@stop
@if (! Auth::check())
@endif