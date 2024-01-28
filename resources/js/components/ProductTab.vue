<template>
    <ul class="nav nav-pills tab-style-4" id="pills-tab" role="tablist">
        <li v-for="item in categories" :key="item.id" class="nav-item" role="presentation">
            <button class="nav-link border" :id="item.name" :data-bs-toggle="item.name" :data-bs-target="`#${item.name}`"
                type="button" role="tab">{{ item.name }}</button>
        </li>
        <!-- <li class="nav-item" role="presentation">
            <button class="nav-link border" id="pills-apparel-tab" data-bs-toggle="pill" data-bs-target="#pills-apparel"
                type="button" role="tab">Apparel</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link border" id="pills-dress-tab" data-bs-toggle="pill" data-bs-target="#pills-dress"
                type="button" role="tab">Dress</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link border" id="pills-tshirt-tab" data-bs-toggle="pill" data-bs-target="#pills-tshirt"
                type="button" role="tab">T-shirt</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link border border-" id="pills-bag-tab" data-bs-toggle="pill" data-bs-target="#pills-bag"
                type="button" role="tab">Bag</button>
        </li> -->
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel">
            <div class="product-wrapper">
                <div v-for="item in products" :key="item.id" class="product-box">
                    <div class="product-image shadow-sm border">
                        <a :href="`/product?id=${item.id}`">
                            <img style="width:600px"
                                src="https://images.tokopedia.net/img/cache/250-square/VqbcmM/2021/12/28/0a6d2e1a-4877-4c23-9264-2089595983a0.jpg"
                                class="img-fluid" alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a :href="`/product?id=${item.id}`">
                            <h5>{{ item.name }}</h5>
                        </a>
                        <!-- <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul> -->
                        <h6>Rp {{ convertToThousands(item.price) }}</h6>
                    </div>
                </div>


            </div>
        </div>

        <!-- <div class="tab-pane fade" id="pills-apparel" role="tabpanel">
            <div class="product-wrapper">
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-dress" role="tabpanel">
            <div class="product-wrapper">
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-tshirt" role="tabpanel">
            <div class="product-wrapper">
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-bag" role="tabpanel">
            <div class="product-wrapper">
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product-image shadow-sm border">
                        <a href="{{ url('/product') }}">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/8.jpg') }}" class="img-fluid"
                                alt="">
                        </a>
                        <div class="add-icon">
                            <input class="form-check-input wishlist-button" type="checkbox">
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ url('/product') }}">
                            <h5>Blue Denim Jacket</h5>
                        </a>
                        <ul class="product-rating">
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill"></i>
                            </li>
                        </ul>
                        <h6>$32.00 <span>$35.00</span></h6>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>
<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'
import { convertToThousands } from "../helper"
import { baseUrl } from "../app.js"

const products = ref([
    // {
    //     'id': 1,
    //     'name': 'T-Shirt 1',
    //     'price': 100000,
    //     'image': 'https://via.placeholder.com/150',
    // },
    // {
    //     'id': 2,
    //     'name': 'T-Shirt 2',
    //     'price': 100000,
    //     'image': 'https://via.placeholder.com/150',
    // },
    // {
    //     'id': 3,
    //     'name': 'T-Shirt 3',
    //     'price': 100000,
    //     'image': 'https://via.placeholder.com/150',
    // },
    // {
    //     'id': 4,
    //     'name': 'T-Shirt 4',
    //     'price': 100000,
    //     'image': 'https://via.placeholder.com/150',
    // },

])

const categories = ref([

])

onMounted(() => {
    console.log('Component is mounted!')

    getProducts()
})

const getProducts = () => {
    axios.get(`/api/products`)
        .then(response => {
            console.log(response.data)

            const data = response.data

            products.value = data.products
            categories.value = data.categoryProducts
        })
        .catch(error => {
            console.log(error)
        })
}

</script>