@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header-search')


    <x-frontend.banner />

    <section class="section-t-space-3">
        <div class="custom-container">
            <x-frontend.content-title />
            {{-- <example-component></example-component> --}}
            <product-tab-vue></product-tab-vue>
            {{-- <x-frontend.product-tab /> --}}
        </div>
    </section>

    </div>
    <!-- Start Content End -->
    @include('frontend.layouts.footer-nav')
@endsection
