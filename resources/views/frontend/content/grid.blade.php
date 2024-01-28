@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header-search')
    <section class="section-b-space-3">
        <div class="custom-container">
            <div class="product-title">
                <h5>45 Products Found</h5>
                <a href="{{ url('/list') }}">
                    <i class="ri-list-check-2"></i>
                </a>
            </div>
            <div class="product-wrapper">
                @for($i=1;$i<=8;$i++)
                <div class="product-box">
                    <div class="product-image border shadow-sm">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/1.jpg') }}" class="img-fluid" alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>
    @include('frontend.layouts.footer-nav')
@endsection
