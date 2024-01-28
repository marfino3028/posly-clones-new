<template>
    <div class="next-step">
        <div class="left-box">
            <h4>$26.00</h4>
            <h6>
                <a href="#!">View Details</a>
            </h6>
        </div>
        <div class="right-box">
            <a href="#" @click.prevent="onClickPayNow" class="btn white-button">Pay Now</a>
        </div>
    </div>
</template>
<script setup>

const onClickPayNow = () => {
    window.location.href = "/success"
}

</script>