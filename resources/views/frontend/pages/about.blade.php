@extends('frontend.layouts.app')

@section('title', 'About Us')

@section('content')
    @include('frontend.components.about.aboutHelp')
    
    <div class="cursor">
        <div class="cursor__inner"></div>
    </div>
@endsection
