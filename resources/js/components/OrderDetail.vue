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
                            <h4 class="price">Rp {{ convertToThousands(products?.[0]?.total_price_items || 0) }}</h4>
                        </div>
                    </li>

                    <li>
                        <div class="order-price-box">
                            <h4 class="name">Potongan Discount</h4>
                            <h4 class="price success">Rp. {{ convertToThousands(products?.[0]?.total_price_items || 0) }}
                            </h4>
                        </div>
                    </li>

                    <li class="total-price">
                        <div class="order-price-box">
                            <h4 class="name">Total Harga</h4>
                            <h4 class="price">Rp {{ convertToThousands(products?.[0]?.GrandTotal || 0) }}</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>
<script setup>
import { onMounted, reactive, ref, watch } from 'vue'
import { convertToThousands } from "../helper"
import axios from 'axios'

const props = defineProps({
    data: {
        type: Array,
        default: []
    }
})

const orderDetails = reactive({
    total: 10000,
    discount: 10,
    totalPayment: 1000000,
})

const products = ref([])
const fetchCart = async () => {
    const res = await axios.get('/api/sales-detail',
        {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token-ecommerce')}`
            }
        }
    )
    products.value = res.data

    localStorage.setItem('cart', JSON.stringify(products.value))

    console.log(products.value)
}

onMounted(async () => {
    await fetchCart()
})

</script>