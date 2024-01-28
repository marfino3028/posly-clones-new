<template>
    <div class="alert" v-text="message"></div>
</template>

<script>
export default {
    data() {
        return {
            message: 'I am an alert.'
        };
    },
    mounted() {
        console.log("halo")
    }
};
</script>

<style>
.alert {
    background: red;
}
</style>