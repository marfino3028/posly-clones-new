@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header-search')
    <section class="section-b-space-3">
        <div class="custom-container">
            <div class="product-title">
                <h5>45 Products Found</h5>
                <a href="{{ url('/grid') }}">
                    <i class="ri-layout-grid-line"></i>
                </a>
            </div>

            <ul class="shop-list-list-2">
                @for($i=0; $i <= 8; $i++)
                <li>
                    <div class="summary-product">
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
                                <h5 class="name">Pink Hoodie t-shirt full </h5>
                            </a>
                            <h6 class="content">Recycle Boucle Knit Cardigan Pink</h6>
                            <h4>$25.00</h4>
                            <h6 class="product-rating">
                                <i class="ri-star-fill"></i>
                                <span>4.8 Ratings</span>
                            </h6>
                            <div class="size">
                                <h6>Size :</h6>
                                <ul class="size-list">
                                    <li>
                                        <a href="product.html">S</a>
                                    </li>
                                    <li>
                                        <a href="product.html">M</a>
                                    </li>
                                    <li>
                                        <a href="product.html">L</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                @endfor
            </ul>
        </div>
    </section>
    @include('frontend.layouts.footer-nav')
@endsection
