<template>
    <section>
        <div class="custom-container">
            <ul class="cart-list">
                <!-- {{ products }} -->
                <li v-for="product in products?.[0]?.details" :key="product.id">
                    <div class="cart-box">
                        <a href="{{ url('/product') }}" class="product-image shadow-sm border">
                            <img :src="product.product.image" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="{{ url('/product') }}">
                                    <h5 class="name">{{ product.product.name }}</h5>
                                </a>
                                <!-- <h5 class="size">Size: S</h5> -->
                                <h5 class="qty">Quantity: {{ product.quantity }}</h5>
                            </div>
                            <div>
                                <ul class="option">
                                    <li>
                                        <a href="#!">
                                            <!-- <i class="ri-pencil-line"></i> -->
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!" @click.prevent="removeProduct(product.id)">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </li>
                                </ul>
                                <h4>{{ `Rp ` + convertToThousands(product.price) }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <order-detail-vue :data="products"></order-detail-vue>
</template>
<script setup>
import { onMounted, ref, watch } from 'vue'
import axios from 'axios'
import { convertToThousands } from "../helper"

const products = ref([
    // {
    //     id: 1,
    //     name: 'Pink Hoodie t-shirt full',
    //     size: 'S',
    //     qty: 1,
    //     price: 25,
    //     image: 'https://via.placeholder.com/150'
    // },
    // {
    //     id: 2,
    //     name: 'Pink Hoodie t-shirt full',
    //     size: 'S',
    //     qty: 1,
    //     price: 25,
    //     image: 'https://via.placeholder.com/150'
    // },
    // {
    //     id: 3,
    //     name: 'Pink Hoodie t-shirt full',
    //     size: 'S',
    //     qty: 1,
    //     price: 25,
    //     image: 'https://via.placeholder.com/150'
    // },
    // {
    //     id: 4,
    //     name: 'Pink Hoodie t-shirt full',
    //     size: 'S',
    //     qty: 1,
    //     price: 25,
    //     image: 'https://via.placeholder.com/150'
    // }
])

const removeProduct = (id) => {
    products.value = products.value.filter(product => product.id !== id)
}

const fetchCart = async () => {
    const res = await axios.get('/api/sales-detail',
        {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token-ecommerce')}`
            }
        }
    )
    products.value = res.data

    console.log(products.value)
}

onMounted(async () => {
    await fetchCart()
})

watch(() => products.value, (products) => {
    console.log(products)

    if (products.length === 0) {
        alert('Keranjang belanja anda kosong')
    } else {
        localStorage.setItem('proceed-to-payment', JSON.stringify(products))
    }
})

</script>