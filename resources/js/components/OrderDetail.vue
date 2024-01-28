<template>
    <section class="section-t-space-3 pb-3">
        <div class="custom-container">
            <a href="{{ url('/grid') }}" class="product-banner d-block">
                <img src="{{ asset('assets/asset_frontend/images/ecommerce/banner/1.jpg') }}" class="img-fluid rounded-3"
                    alt="">
            </a>

            <div class="order-detail-box">
                <div class="product-title">
                    <h4>Order Details:</h4>
                </div>
                <ul class="order-price-list">
                    <li>
                        <div class="order-price-box">
                            <h4 class="name">Total Harga</h4>
                            <h4 class="price">$25.00</h4>
                        </div>
                    </li>

                    <li>
                        <div class="order-price-box">
                            <h4 class="name">Potongan Discount</h4>
                            <h4 class="price success">-$5.00</h4>
                        </div>
                    </li>


                    <li class="total-price">
                        <div class="order-price-box">
                            <h4 class="name">Total Pembayaran</h4>
                            <h4 class="price">$23.00</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div>

    </div>
</template>