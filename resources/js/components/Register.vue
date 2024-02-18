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
            <h2 style="color: black;">Register to Posly</h2>
            <form class="form-style-1" @submit.prevent="submit">
                <div>
                    <label for="mail" class="form-label">Username</label>
                    <input v-model="form.username" type="text" class="form-control" id="mail">
                </div>
                <div class="mt-3">
                    <label for="pass" class="form-label">Name</label>
                    <input v-model="form.name" type="text" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="pass" class="form-label">Email</label>
                    <input v-model="form.email" type="email" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="pass" class="form-label">Password</label>
                    <input v-model="form.password" type="password" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="pass" class="form-label">Konfirm Password</label>
                    <input v-model="form.confirmPassword" type="password" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="pass" class="form-label">No Hp</label>
                    <input v-model="form.noHp" type="text" class="form-control">
                </div>

                <div class="mt-3">
                    <label for="pass" class="form-label">Provinsi</label>
                    <!-- <input v-model="form.province" type="text" class="form-control">
                     -->

                    <select v-model="form.province" @change="getCity(form.province)" class="form-select"
                        aria-label="Default select example">
                        <option selected>Pilih Provinsi</option>
                        <option v-for="province in provinceOpt" :key="province.id" :value="province.id">
                            {{ province.name }}
                        </option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="pass" class="form-label">City</label>
                    <!-- <input v-model="form.city" type="text" class="form-control"> -->

                    <select v-model="form.city" @change="getDistrict(form.city)" class="form-select"
                        aria-label="Default select example">
                        <option selected>Pilih Kota</option>
                        <option v-for="city in cityOpt" :key="city.id" :value="city.id">
                            {{ city.name }}
                        </option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="pass" class="form-label">Kecamatan</label>
                    <!-- <input v-model="form.district" type="text" class="form-control"> -->

                    <select v-model="form.district" @change="getSubDistrict(form.district)" class="form-select"
                        aria-label="Default select example">
                        <option selected>Pilih Kecamatan</option>
                        <option v-for="district in districtOpt" :key="district.id" :value="district.id">
                            {{ district.name }}
                        </option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="pass" class="form-label">Kelurahan</label>
                    <!-- <input v-model="form.villages" type="text" class="form-control"> -->

                    <select v-model="form.villages" class="form-select" aria-label="Default select example">
                        <option selected>Pilih Kelurahan</option>
                        <option v-for="subDistrict in subDistrictOpt" :key="subDistrict.id" :value="subDistrict.id">
                            {{ subDistrict.name }}
                        </option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="pass" class="form-label">Kode Pos</label>
                    <input v-model="form.kodepos" type="text" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="pass" class="form-label">Alamat</label>
                    <input v-model="form.alamat" type="text" class="form-control">
                </div>

                <!-- <a href="forgot.html" class="theme-color text-end d-block mt-1">Forgot password?</a> -->
                <button type="submit" class="btn btn-secondary mt-3">Register</button>

            </form>

        </div>
    </div>
</template>
<script setup>
import { onMounted, reactive, ref } from 'vue'
import { showError } from '../helper';
import axios from 'axios'
import { baseUrl } from "../app.js";

const form = reactive({
    username: '',
    name: '',
    email: '',
    password: '',
    confirmPassword: '',
    noHp: '',
    alamat: '',
    kodepos: '',
    villages: '',
    district: '',
    city: '',
    province: '',
    country: '',
})

const submit = () => {

    const formData = new FormData()
    formData.append('username', form.username)
    formData.append('nama', form.name)
    formData.append('email', form.email)
    formData.append('password', form
        .password)
    formData.append('password_confirmation', form.confirmPassword)
    formData.append('no_hp', form.noHp)
    formData.append('alamat', form.alamat)
    formData.append('kodepos', form.kodepos)
    formData.append('villages', form.villages)
    formData.append('district', form.district)
    formData.append('country', "indonesia")
    formData.append('city', form.city)
    formData.append('province', form.province)
    formData.append('country', form.country)


    axios.post(`/api/register`, formData).then(response => {
        window.location.href = '/eccomerce/login'
    }).catch(error => {
        console.log(error.response.data.error)
        // looping message error
        for (const key in error.response.data.error) {
            showError(error.response.data.error[key][0])
        }
    })
}

const provinceOpt = ref([])
const getProvince = () => {
    axios.get(`/api/province`).then(response => {
        provinceOpt.value = response.data
    }).catch(error => {
        console.log(error)
    })
}

const cityOpt = ref([])
const getCity = (id) => {
    axios.get(`/api/cities/${id}`).then(response => {
        cityOpt.value = response.data.cities
    }).catch(error => {
        console.log(error)
    })
}

const districtOpt = ref([])
const getDistrict = (id) => {
    axios.get(`/api/districts/${id}`).then(response => {
        districtOpt.value = response.data.districts
    }).catch(error => {
        console.log(error)
    })
}

const subDistrictOpt = ref([])
const getSubDistrict = (id) => {
    axios.get(`/api/subdistricts/${id}`).then(response => {
        subDistrictOpt.value = response.data.villages
    }).catch(error => {
        console.log(error)
    })
}

onMounted(async () => {
    await getProvince()
})


</script>
<style scoped>
.login {
    margin: 100px;
}
</style>
