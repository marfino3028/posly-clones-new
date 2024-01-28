<template>
    <section class="ecommerce-order-success-section">
        <div class="custom-container">
            <div class="order-success-image">
                <img src="/assets/asset_frontend/images/ecommerce/tick.gif" class="img-fluid" alt="">
            </div>
            <div class="success-content">
                <h2>Order successfully!</h2>
                <p>Payment is successfully processed and your Order is on the way.</p>
            </div>
        </div>
    </section>
    <section class="section-t-space-3 section-b-space-3">
        <div class="custom-container">
            <ul class="order-detail-list">
                <li>
                    <h4>Your order # is: 64484032</h4>
                    <p class="h5">An email receipt including the details about your order has been sent to your email
                        ID.</p>
                </li>

                <li>
                    <h4>This order will be shipped to:</h4>
                    <p class="h5">3501 Malay Court,</p>
                    <p class="h5">East Lemurs, New York City</p>
                    <p class="h5">NY 11369</p>
                </li>

                <li>
                    <h4>Payment Method</h4>
                    <p class="h5">Google UPI</p>
                </li>
            </ul>

            <div class="order-summary-box section-b-space-3">
                <div class="title">
                    <h4>Order Summary</h4>
                </div>
                <ul class="order-summary-list">
                    <li>
                        <a href="product.html" class="summary-product">
                            <div class="product-image">
                                <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/6.jpg') }}"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="product-content">
                                <h5 class="name">Pink Hoodie t-shirt full </h5>
                                <h5 class="qty">Size: S, Quantity: 1</h5>
                                <h4>$25.00</h4>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="product.html" class="summary-product">
                            <div class="product-image">
                                <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/7.jpg') }}"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="product-content">
                                <h5 class="name">Pink Hoodie t-shirt full </h5>
                                <h5 class="qty">Size: S, Quantity: 1</h5>
                                <h4>$25.00</h4>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <section class="section-t-space-3">
                <div class="custom-container">
                    <div class="order-detail-box order-detail-box-2">
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
                                    <h4 class="name">Total Harga</h4>
                                    <h4 class="price">$23.00</h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <hr>

            <!-- bukti Bayar Upload File -->
            <div class="order-detail-box order-detail-box-2">
                <div class="product-title">
                    <h4>Upload Bukti Pembayaran:</h4>
                </div>
                <div>
                    <ul class="order-price-list">
                        <li>
                            <div class="order-price-box">
                                <h4 class="price" style="width: 100%;">
                                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
                                </h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>

import { reactive, ref } from 'vue'

const data = reactive({
    noInvoice: '64484032',
    shippedTo: '3501 Malay Court, East Lemurs, New York City, NY 11369',
    paymentMethod: 'Google UPI',
    orderSummary: [
        {
            image: '/assets/asset_frontend/images/ecommerce/product/6.jpg',
            name: 'Pink Hoodie t-shirt full',
            size: 'S',
            qty: 1,
            price: 25
        },
        {
            image: '/assets/asset_frontend/images/ecommerce/product/7.jpg',
            name: 'Pink Hoodie t-shirt full',
            size: 'S',
            qty: 1,
            price: 25
        }
    ],
    orderDetails: [
        {
            name: 'Base Price',
            price: 25
        },
        {
            name: 'Total Discount',
            price: -5
        },
        {
            name: 'Taxes & Service Fees',
            price: 3
        },
        {
            name: 'Total Amount to be paid',
            price: 23
        }
    ]

})

</script>