<template>
    <div class="bottom-panel-box">
        <!-- <div class="left-panel">
            <a href="#">
                <i class="ri-heart-line"></i>
                <span>Add to Wishlist</span>
            </a>
        </div> -->

        <div class="right-panel">
            <a href="#" @click.prevent="addToCart">
                <i class="ri-shopping-cart-line"></i>
                <span>Add to Cart</span>
            </a>
        </div>
    </div>
</template>
<script setup>
import axios from 'axios'
import { showSuccess } from "../helper"

// Check Login
const checkLogin = () => {
    const token = localStorage.getItem('token-ecommerce')
    if (!token) {
        window.location.href = "/ecommerce/login"
    }
}

const addToCart = () => {

    checkLogin()

    const cartStorage = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []

    console.log("cartStorage", cartStorage)

    // with bearer token
    axios.post('/api/sales', {
        product_variant_id: [cartStorage.size, cartStorage.color, cartStorage.variant],
        product_id: cartStorage.productId,
        qty: 1
    }, {
        headers: {
            Authorization: `Bearer ${localStorage.getItem('token-ecommerce')}`
        }
    }).then(response => {

        showSuccess('Product added to cart')

        localStorage.removeItem('cart')
        window.location.href = "/cart"
    }).catch(error => {
        console.log(error)
    })

    // window.location.href = "/cart"
}

</script>