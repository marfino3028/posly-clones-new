<template>
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
                            <h4 class="price">Rp {{ convertToThousands(orderDetails?.total || 0) }}</h4>
                        </div>
                    </li>

                    <li>
                        <div class="order-price-box">
                            <h4 class="name">Potongan Discount</h4>
                            <h4 class="price success">{{ orderDetails?.discount }} %</h4>
                        </div>
                    </li>



                    <li class="total-price">
                        <div class="order-price-box">
                            <h4 class="name">Total Harga</h4>
                            <h4 class="price">Rp {{ convertToThousands(orderDetails?.totalPayment || 0) }}</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>
<script setup>
import { reactive, ref, watch } from 'vue'
import { convertToThousands } from "../helper"

const orderDetails = reactive({
    total: 10000,
    discount: 10,
    totalPayment: 1000000,
})

</script>