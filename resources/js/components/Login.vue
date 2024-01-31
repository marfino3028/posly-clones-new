<template>
    <!-- Form Login Boostrap -->
    <div class="container">
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
                <!-- Register -->
                <div class="text-center mt-2">
                    <a href="/eccomerce/register" class="text-center mt-10">Register</a>
                </div>
            </form>
        </section>
    </div>
</template>
<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { baseUrl } from "../app.js";

const email = ref('marfinohamzah455@gmail.com')
const password = ref('hamzah3028')

const errors = ref([])
const login = () => {
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
