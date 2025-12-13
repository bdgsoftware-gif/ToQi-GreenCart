@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    @include('frontend.sections.hero')

    <!-- Categories Section -->
    @include('frontend.sections.categories')

    <!-- Products Section -->
    @include('frontend.sections.products')

    <!-- Ads Section -->
    @include('frontend.sections.ads')
@endsection
