@extends('frontend.layouts.master')
@section('content')
    {{-- <!-- Product Image Section Start -->
    <section>
        <div class="custom-container">
            <div class="swiper main-slider product-image-slider">
                <div id="gallery" class="swiper-wrapper">
                    <div class="swiper-slide shadow-sm border">
                        <div class="hes-gallery" data-pswp-width="1669" data-pswp-height="2500">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/1.jpg') }}"
                                 class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide shadow-sm border">
                        <div class="hes-gallery">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/2.jpg') }}"
                                 class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide shadow-sm border">
                        <div class="hes-gallery">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/3.jpg') }}"
                                 class="img-fluid w-100" alt="">
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- Product Image Section End -->

    <!-- Product Details Section Start -->
    <section class="section-t-space-3 product-detail-section">
        <div class="custom-container">
            <div class="product-name-box">
                <div class="product-name">
                    <h4>floral print skirt with white top</h4>
                    <div class="rating-box">
                        <ul class="rating">
                            <li>
                                <i class="ri-star-fill fill-color"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill-color"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill-color"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill-color"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill "></i>
                            </li>
                        </ul>
                        <span>(20 ratings)</span>
                    </div>
                </div>
                <div class="product-price">
                    <h3>$25.00</h3>
                    <h6>$28.00</h6>
                </div>
            </div>
            <div class="product-color">
                <h4>Color:</h4>
                <div class="swiper thumbs-image">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide shadow-sm border">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/1.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide shadow-sm border">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/2.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide shadow-sm border">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/3.jpg') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-size">
                <h4>Size:</h4>
                <ul class="size-list">
                    <li class="active border rounded">
                        <a href="javascript:void(0)">S</a>
                    </li>
                    <li class="border rounded">
                        <a href="javascript:void(0)">M</a>
                    </li>
                    <li class="border rounded">
                        <a href="javascript:void(0)">L</a>
                    </li>
                    <li class="border rounded">
                        <a href="javascript:void(0)">XL</a>
                    </li>
                    <li class="border rounded">
                        <a href="javascript:void(0)">2XL</a>
                    </li>
                </ul>
            </div>
            <a href="shop-grid.html" class="product-banner section-t-space-3 d-block">
                <img src="{{ asset('assets/asset_frontend/images/ecommerce/banner/1.jpg') }}" class="img-fluid border rounded-3" alt="">
            </a>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Product Description Section Start -->
    <section class="section-t-space-3 section-b-space-3">
        <div class="custom-container">
            <div class="accordion accordion-style" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="description1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#description">Description
                        </button>
                    </h2>
                    <div id="description" class="accordion-collapse collapse show">
                        <div class="accordion-body product-body border">
                            <p class="text-black">We include thousands of the most recent product lines, giving our discriminating
                                customers the widest possible selection and ease. We concentrate on the very latest in
                                cheap fashion designs, including exquisite accessories as well as fashionable clothing.
                                We also want to provide our esteemed clients from all around the world a wide selection
                                of fashionable apparel that is of the highest calibre and is in style.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="specifications1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#specifications">Specifications
                        </button>
                    </h2>
                    <div id="specifications" class="accordion-collapse collapse">
                        <div class="table-responsive">
                            <table class="table table-part">
                                <tr>
                                    <th>Item dimensions</th>
                                    <td>15 x 15 x 3 cm; 250 Grams</td>
                                </tr>
                                <tr>
                                    <th>First Available Date</th>
                                    <td>5 April 2022</td>
                                </tr>
                                <tr>
                                    <th>Manufacturer‏</th>
                                    <td>Aditya Birla Fashion and Retail Limited</td>
                                </tr>
                                <tr>
                                    <th>ASIN</th>
                                    <td>B06Y28LCDN</td>
                                </tr>
                                <tr>
                                    <th>Product model number</th>
                                    <td>AMKP317G04244</td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>Men</td>
                                </tr>
                                <tr>
                                    <th>Item Weight</th>
                                    <td>250 G</td>
                                </tr>
                                <tr>
                                    <th>Product Size (LxWxH)</th>
                                    <td>15 x 15 x 3 Centimeters</td>
                                </tr>
                                <tr>
                                    <th>Net Quantity</th>
                                    <td>1 U</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="return1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#return">Return & Exchange
                        </button>
                    </h2>
                    <div id="return" class="accordion-collapse collapse">
                        <div class="accordion-body product-body">
                            <div class="title mb-2">
                                <h4>Exchanges and returns are simple within 7 days.</h4>
                            </div>
                            <p class="h6 mb-0">Within 30 days, you have the option to exchange or return for a
                                different size (if available).</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="reviews1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#reviews">Reviews
                        </button>
                    </h2>
                    <div id="reviews" class="accordion-collapse collapse">
                        <div class="accordion-body product-review">
                            <div class="rating-box">
                                <div class="total-rating">
                                    <div class="rating-number">
                                        <h4>4.5</h4>
                                    </div>
                                    <h5>Based on 510 Ratings</h5>
                                </div>

                                <ul class="category-rating">
                                    <li>
                                        <div class="rating-progress">
                                            <h5>5</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-progress">
                                            <h5>4</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-progress">
                                            <h5>3</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-progress">
                                            <h5>2</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rating-progress">
                                            <h5>1</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <ul class="product-comment">
                                <li>
                                    <div class="product-review">
                                        <div class="top-review">
                                            <div class="review-content">
                                                <h5>Very Good Stay</h5>
                                                <h6 class="h5">Alex jecno, 22 june 2022</h6>
                                            </div>
                                            <div class="review-rate">
                                                <h6>4.5</h6>
                                            </div>
                                        </div>
                                        <div class="review-comment">
                                            <p>“It's a really cute skirt! I didn't expect to feel so good in a polyester
                                                material. The print is slightly less bright.”</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-review">
                                        <div class="top-review">
                                            <div class="review-content">
                                                <h5>Very Good Stay</h5>
                                                <h6 class="h5">Alex jecno, 22 june 2022</h6>
                                            </div>
                                            <div class="review-rate">
                                                <h6>4.7</h6>
                                            </div>
                                        </div>
                                        <div class="review-comment">
                                            <p>“Wow.. but it should have more flairs. mind-blowing purchase..🤗”</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <h5 class="all-comment">
                                        <a href="javascript:void(0)">See all reviews(15)</a>
                                    </h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Description Section End --> --}}

    <product-detail-vue></product-detail-vue>

    {{-- @include('frontend.layouts.footer-product-nav') --}}
    <footer-product-nav-vue></footer-product-nav-vue>
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/asset_frontend/css/hes-gallery.css') }}">
@endpush
@push('js')
    <script src="{{ asset('assets/asset_frontend/js/active-class.js') }}"></script>
@endpush
