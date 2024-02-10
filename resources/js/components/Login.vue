<template>
    <!-- Form Login Boostrap -->
    <!-- <div class="container">
        <section class="login">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-4">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" v-model="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password">
                    <span class="text-danger" v-if="errors.password" v-text="errors.password[0]"></span>
                </div>
                <button type="button" class="btn btn-primary mt-5" @click.prevent="login">Submit</button>

                <div class="text-center mt-2">
                    <a href="/eccomerce/register" class="text-center mt-10">Register</a>
                </div>
            </form>
        </section>
    </div> -->
    <div class="ecommerce-auth d-block">
        <div class="custom-container w-100">
            <h1 class="top-title">Welcome</h1>
            <h2 style="color: black;">Login to Posly</h2>
            <form class="form-style-1" @submit.prevent="submit">
                <div>
                    <label for="mail" class="form-label">Email address</label>
                    <input v-model="email" type="email" class="form-control" id="mail" placeholder="Enter your email here">
                </div>
                <div class="mt-3">
                    <label for="pass" class="form-label">Password</label>
                    <input v-model="password" type="password" class="form-control" placeholder="Enter your password"
                        id="pass">
                </div>
                <!-- <a href="forgot.html" class="theme-color text-end d-block mt-1">Forgot password?</a> -->
                <button type="submit" class="btn btn-secondary mt-3">Login</button>

            </form>

        </div>
    </div>
</template>
<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { baseUrl } from "../app.js";

const email = ref('marfinohamzah455@gmail.com')
const password = ref('hamzah3028')

const errors = ref([])
const submit = () => {
    axios.post(`${baseUrl}/login`, {
        email: email.value,
        password: password.value,
    }).then(response => {
        console.log(response.data)
        localStorage.setItem('token', response.data.token)
        window.location.href = '/'
    }).catch(error => {
        errors.value = error.response.data.errors
    })
}


</script>
<style scoped>
.login {
    margin: 100px;
}
</style>
