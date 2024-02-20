<template>
    <section>
        <div class="custom-container form-style-1">
            <div class="accordion accordion-style" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="metodePembayaran1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#metodePembayaran">Metode Pembayaran</button>
                    </h2>
                    <div id="metodePembayaran" class="accordion-collapse collapse show">
                        <div class="accordion-body p-0">
                            <ul class="payment-list">
                                <li v-for="payment in paymentMethodLists" :key="payment.id">
                                    <input :value="payment.id" type="radio" :name="payment.id" v-model="form.paymentMethod"
                                        class="form-check-input" :id="payment.id">
                                    <label class="minha-table" :for="payment.id">
                                        <!-- <img src="{{ asset('assets/asset_frontend/images/pay/m-card.png') }}" alt=""> -->
                                        <span>{{ payment.title || "-" }}</span>
                                        <span>{{ payment.nama_pemilik || "-" }}</span>
                                        <span>{{ payment.no_rekening || "-" }}</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion accordion-style mt-3" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="alamat1">

                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#alamat">Alamat
                        </button>

                    </h2>
                    <div id="alamat" class="accordion-collapse collapse show">
                        <select class="form-select mt-2" aria-label="Default select example" v-model="form.address">
                            <option selected>Pilih alamat</option>
                            <option v-for="address in addressLists" :key="address.id" :value="address.id">{{ address.alamat
                            }}
                            </option>
                        </select>
                        <div style="display: flex; justify-content: end;margin-top: 10px;">
                            <a @click="toggleTambahAlamat" href="#" style="width: 20%">Tambah Alamat</a>
                        </div>

                        <!-- Form Alamat -->
                        <div v-if="isTambahAlamat">
                            <form class="form-style-1" @submit.prevent="submitAlamat">
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

                                    <select v-model="form.district" @change="getSubDistrict(form.district)"
                                        class="form-select" aria-label="Default select example">
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
                                        <option v-for="subDistrict in subDistrictOpt" :key="subDistrict.id"
                                            :value="subDistrict.id">
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
                                <button type="submit" class="btn btn-secondary mt-3">Tambah Alamat</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <order-detail-vue></order-detail-vue>
</template>
<script setup>

import { onMounted, reactive, ref, watch } from 'vue'
import { convertToThousands } from "../helper"
import axios from 'axios'

onMounted(async () => {
    await getPaymentMethod()
    await getAlamat()
    await getProvince()
})


const paymentMethodLists = ref([
    // {
    //     id: 1,
    //     name: 'BCA',
    //     number: 'BCA A/n 123123',
    //     image: 'https://via.placeholder.com/150'
    // },
    // {
    //     id: 2,
    //     name: 'BCA',
    //     number: 'BCA A/n 123123',
    //     image: 'https://via.placeholder.com/150'
    // },

])


const getPaymentMethod = async () => {
    const res = await axios.get('/api/payment-method')
    paymentMethodLists.value = res.data
}

const getAlamat = async () => {
    const res = await axios.post('/api/alamat-all', {
        users_id: localStorage.getItem('user-id')
    })
    addressLists.value = res.data
}


const addressLists = ref([
    // {
    //     id: 1,
    //     address: 'Jl. Raya Bogor KM 30',
    // },
    // {
    //     id: 2,
    //     address: 'Jl. Raya Bogor KM 30',
    // },
])


const orderDetails = reactive({
    total: 10000,
    discount: 10,
    totalPayment: 1000000,
})

const form = reactive({
    paymentMethod: null,
    address: null
})

watch(form, (form) => {
    localStorage.setItem('form', JSON.stringify(form))

    console.log(form)
}, { deep: true }
)

const isTambahAlamat = ref(false)

const toggleTambahAlamat = () => {
    isTambahAlamat.value = !isTambahAlamat.value
}

const submitAlamat = async () => {
    const res = await axios.post('/api/alamat-all', {
        users_id: localStorage.getItem('user-id'),
        villages: formAlamat.villages,
        district: formAlamat.district,
        city: formAlamat.city,
        province: formAlamat.province,
        country: "indonesia",
        alamat: formAlamat.alamat,
        kode_pos: formAlamat.kodepos,
    })
    addressLists.value = res.data

    isTambahAlamat.value = false
}

const formAlamat = reactive({
    username: null,
    name: null,
    email: null,
    password: null,
    confirmPassword: null,
    noHp: null,
    province: null,
    city: null,
    district: null,
    villages: null,
    kodepos: null,
    alamat: null,
})

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

watch
</script>