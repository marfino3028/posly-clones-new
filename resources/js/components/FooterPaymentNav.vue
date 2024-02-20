<template>
    <div class="next-step">
        <div class="left-box">
            <!-- <h4>$26.00</h4> -->
            <h6>
                <!-- <a href="#!">View Details</a> -->
            </h6>
        </div>
        <div class="right-box">
            <a href="#" @click.prevent="onClickPayNow" class="btn white-button">Pay Now</a>
        </div>
    </div>
</template>
<script setup>
import axios from 'axios'

const onClickPayNow = async () => {

    const saleId = JSON.parse(localStorage.getItem('cart'))?.[0]?.id
    const alamatId = JSON.parse(localStorage.getItem('form')).address
    const paymentMethodId = JSON.parse(localStorage.getItem('form')).paymentMethod

    const res = await axios.post('/api/payment-now', {
        sale_id: saleId,
        alamat_id: alamatId,
        payment_method_id: paymentMethodId
    }, {
        headers: {
            Authorization: `Bearer ${localStorage.getItem('token-ecommerce')}`
        }
    }).then(response => {
        console.log(response)

        window.location.href = "/success"
    }).catch(error => {
        console.log(error)
    })





}

</script>