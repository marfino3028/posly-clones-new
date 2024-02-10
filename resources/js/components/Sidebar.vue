<template>
    <!-- SideBar Menu Offcanvas Start -->
    <div class="offcanvas offcanvas-start ecommerce-sidebar" tabindex="-1" id="sidebarMenu">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas">
                <i class="ri-close-line"></i>
            </button>

            <div class="sidebar-profile">
                <div class="profile-image border shadow-sm">
                    <img src="{{ asset('assets/asset_frontend/images/ecommerce/dp.jpg') }}" class="img-fluid" alt="">
                </div>

                <a href="profile.html" class="profile-name">
                    <h4>Paige Turner test</h4>
                    <h5>paigeturner@gmail.com</h5>
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <!-- <ul class="sidebar-list">
                <li>
                    <a href="order-details.html">
                        <i class="ri-file-list-2-line"></i>
                        <h5>Orders</h5>
                    </a>
                </li>

                <li>
                    <a href="wishlist.html">
                        <i class="ri-heart-line"></i>
                        <h5>Your Wishlist</h5>
                    </a>
                </li>

                <li>
                    <a href="payment.html">
                        <i class="ri-bank-card-line"></i>
                        <h5>Payment</h5>
                    </a>
                </li>

                <li>
                    <a href="#!.html">
                        <i class="ri-map-pin-5-line"></i>
                        <h5>Saved Address</h5>
                    </a>
                </li>

                <li>
                    <a href="language.html">
                        <i class="ri-earth-line"></i>
                        <h5>Language</h5>
                    </a>
                </li>

                <li>
                    <a href="notification.html">
                        <i class="ri-notification-line"></i>
                        <h5>Notification</h5>
                    </a>
                </li>

                <li>
                    <a href="account.html">
                        <i class="ri-settings-3-line"></i>
                        <h5>Settings</h5>
                    </a>
                </li>
            </ul> -->

            <a href="sign-in.html" class="btn ecommerce-btn theme-border mt-4">Logout</a>
        </div>
    </div>
    <!-- SideBar Menu Offcanvas End -->
</template>