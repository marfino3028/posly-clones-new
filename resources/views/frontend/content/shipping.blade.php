@extends('frontend.layouts.master')
@section('content')
    <section class="ecommerce-address-section pb-3">
        <div class="custom-container">
            <ul class="address-list selectionUI">
                <li class="active">
                    <div class="address-box">
                        <div class="address-name">
                            <div class="address-icon">
                                <i class="ri-home-3-line"></i>
                            </div>
                            <h5>Home</h5>
                            <div class="dropdown edit-option">
                                <button class="btn dropdown-button" type="button" data-bs-toggle="dropdown">
                                    <i class="ri-more-2-line"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#editModal" data-bs-toggle="offcanvas">
                                            <i class="ri-edit-box-line"></i>
                                            <span>Edit</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#deleteModal" data-bs-toggle="modal">
                                            <i class="ri-delete-bin-line"></i>
                                            <span>Delete</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="address-detail">
                            <h5>Carolina S Seo</h5>
                            <p class="h5">3501 Malory Court, East Elmhurst, New York City, NY 11369</p>
                            <h6 class="h5">Phone No: 903-239-1284</h6>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="address-box">
                        <div class="address-name">
                            <div class="address-icon">
                                <i class="ri-building-line"></i>
                            </div>
                            <h5>Office</h5>
                            <div class="dropdown edit-option">
                                <button class="btn dropdown-button" type="button" data-bs-toggle="dropdown">
                                    <i class="ri-more-2-line"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#editModal" data-bs-toggle="offcanvas">
                                            <i class="ri-edit-box-line"></i>
                                            <span>Edit</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#deleteModal" data-bs-toggle="modal">
                                            <i class="ri-delete-bin-line"></i>
                                            <span>Delete</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="address-detail">
                            <h5>Arthur M Willingham</h5>
                            <p class="h5">3059 Elk City Road, Indianapolis, Indiana, IN 46229</p>
                            <h6 class="h5">Phone No: 317-898-0622</h6>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="address-box">
                        <div class="address-name">
                            <div class="address-icon">
                                <i class="ri-building-line"></i>
                            </div>
                            <h5>Other</h5>
                            <div class="dropdown edit-option">
                                <button class="btn dropdown-button" type="button" data-bs-toggle="dropdown">
                                    <i class="ri-more-2-line"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#editModal" data-bs-toggle="offcanvas">
                                            <i class="ri-edit-box-line"></i>
                                            <span>Edit</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#deleteModal" data-bs-toggle="modal">
                                            <i class="ri-delete-bin-line"></i>
                                            <span>Delete</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="address-detail">
                            <h5>Arthur M Willingham</h5>
                            <p class="h5">3059 Elk City Road, Indianapolis, Indiana, IN 46229</p>
                            <h6 class="h5">Phone No: 317-898-0622</h6>
                        </div>
                    </div>
                </li>

                <li>
                    <a href="#newAddress" data-bs-toggle="offcanvas" class="btn theme-bg-color mt-3 text-light">+ Add
                        new Address</a>
                </li>
            </ul>
        </div>
    </section>
    @include('frontend.layouts.footer-checkout-nav')
@endsection
