<template>
    <div class="next-step">
        <div class="left-box">
            <h4>$26.00</h4>
            <h6>
                <a href="#!">View Details</a>
            </h6>
        </div>
        <div class="right-box">
            <a href="#" @click="onClickPayment" class="btn white-button">Proceed to payment</a>
        </div>
    </div>
</template>
<script setup>
const onClickPayment = () => {
    window.location.href = "/payment"
}
</script>