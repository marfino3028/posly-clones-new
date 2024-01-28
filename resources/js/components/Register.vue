<template>
    <!-- Form Login Boostrap -->
    <div class="container">
        <section class="login">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Konfirmasi Password</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">No Handphone</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Kode Pos</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Villages</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">District</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">City</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Province</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Country</label>
                    <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                </div>
                <button type="button" class="btn btn-primary mt-5" @click.prevent="login">Register</button>
                <!-- Register -->
                <div class="text-center mt-2">
                    <a href="/eccomerce/login" class="text-center mt-10">Login</a>
                </div>

            </form>
        </section>
    </div>
</template>
<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { baseUrl } from "../app.js";

const email = ref('')
const password = ref('')

const errors = ref([])
const login = () => {
    axios.post(`${baseUrl}/login`, {
        email: email.value,
        password: password.value
    }).then(response => {
        console.log(response.data)
        localStorage.setItem('token', response.data.token)
        window.location.href = '/'
    }).catch(error => {
        errors.value = error.response.data.errors
    })

    // window.location.href = '/?test=1'
}

</script>
<style scoped>
.login {
    margin: 100px;
}
</style>
