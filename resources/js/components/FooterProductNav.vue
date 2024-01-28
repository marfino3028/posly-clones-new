<template>
    <div class="bottom-panel-box">
        <div class="left-panel">
            <a href="#">
                <i class="ri-heart-line"></i>
                <span>Add to Wishlist</span>
            </a>
        </div>

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

const addToCart = () => {

    const cartStorage = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []

    console.log(cartStorage)

    

    window.location.href = "/cart"
}

</script>