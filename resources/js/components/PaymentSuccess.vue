<template>
    <section class="ecommerce-order-success-section form-style-1">
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
                    <h4>Your order # is: {{ data?.Ref || "-" }}</h4>
                    <p class="h5">An email receipt including the details about your order has been sent to your email
                        ID.</p>
                </li>

                <li>
                    <h4>This order will be shipped to:</h4>
                    {{ data?.alamat?.alamat || "-" }}
                </li>

                <li>
                    <h4>Payment Method</h4>
                    <p class="h5">{{ payment_method?.title || "-" }}</p>
                </li>
            </ul>

            <div class="order-summary-box section-b-space-3">
                <div class="title">
                    <h4>Order Summary</h4>
                </div>
                <ul class="order-summary-list">
                    <li v-for="product in data?.details" :key="product.id">
                        <a href="product.html" class="summary-product">
                            <div class="product-image">
                                <img :src="product.product.image" class="img-fluid" alt="">
                            </div>
                            <div class="product-content">
                                <h5 class="name">{{
                                    product.product.name }}</h5>
                                <h5 class="qty">Size: S, Quantity: {{ product.quantity }}</h5>
                                <h4>{{ `Rp ` + convertToThousands(product.price) }}</h4>
                            </div>
                        </a>
                    </li>


                </ul>
            </div>

            <order-detail-vue></order-detail-vue>

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
                                    <input @change="onUploadBukti" type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                                        class="form-control">
                                </h4>
                            </div>
                        </li>
                    </ul>
                    <button @click="postUploadBukti" class="btn btn-primary mt-3" style="float: right;">Upload</button>
                </div>

            </div>
        </div>
    </section>
</template>
<script setup>

import { reactive, ref, onMounted } from 'vue'
import axios from 'axios'
import { showSuccess, convertToThousands } from '../helper'

const data = ref(null)

const fetchData = async () => {
    const res = await axios.get('/api/order-summary',
        {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token-ecommerce')}`
            }
        }
    ).then(response => {
        console.log(response)

        data.value = response.data.data[0]

        console.log(data.value)
    }).catch(error => {
        console.log(error)
    })
}


onMounted(async () => {
    await fetchData()
})


const uploadBukti = ref(null);
const onUploadBukti = (e) => {
    uploadBukti.value = e.target.files[0];
    console.log(uploadBukti.value)
}

const postUploadBukti = async () => {


    const formData = new FormData();
    formData.append('sale_id', JSON.parse(localStorage.getItem('cart'))?.[0]?.id);
    formData.append('photo', uploadBukti.value);

    const res = await axios.post('/api/payment-upload', formData,
        {
            headers: {
                'Content-Type': 'multipart/form-data',
                Authorization: `Bearer ${localStorage.getItem('token-ecommerce')}`
            }
        }
    ).then(response => {
        console.log(response)

        showSuccess("Upload Bukti Pembayaran Berhasil")
    }).catch(error => {
        console.log(error)
    })
}

</script>