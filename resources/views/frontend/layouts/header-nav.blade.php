<!-- header Section Start -->
<header-nav-vue></header-nav-vue>
<header class="header-style-5">
    <div class="header-left">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
            <i class="ri-bar-chart-horizontal-line"></i>
        </button>
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/asset_frontend/images/logo/5.svg') }}" class="img-fluid" alt="">
        </a>
    </div>
    <div class="header-right">
        <a href="{{ url('/') }}" class="notification">
            <i class="ri-notification-2-line"></i>
        </a>
        <a href="{{ url('/') }}">
            <i class="ri-heart-3-line"></i>
        </a>
        <a href="{{ url('/cart') }}">
            <i class="ri-shopping-cart-line"></i>
        </a>
    </div>
</header>
<!-- header Section End -->
