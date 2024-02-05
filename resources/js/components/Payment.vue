<template>
    <section>
        <div class="custom-container">
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
                                    <input value="1" type="radio" name="1" class="form-check-input" id="01">
                                    <label class="minha-table" for="01">
                                        <!-- <img src="{{ asset('assets/asset_frontend/images/pay/m-card.png') }}" alt=""> -->
<<<<<<< HEAD
<<<<<<< HEAD
                                        <span>{{ payment.title }}</span>
=======
                                        <span>{{ payment.number }}</span>
>>>>>>> 99b7dbf (up to date)
=======
                                        <span>{{ payment.title }}</span>
>>>>>>> e4e5cab (up to date)
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
                        <div style="display: flex; justify-content: end;">
                            <a href="#" style="width: 20%">Tambah Alamat</a>
                        </div>
                        <select class="form-select mt-2" aria-label="Default select example">
                            <option selected>Pilih alamat</option>
                            <option v-for="address in addressLists" :key="address.id" value="1">{{ address.address }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <order-detail-vue></order-detail-vue>
</template>
<script setup>
<<<<<<< HEAD
<<<<<<< HEAD
import { onMounted, reactive, ref, watch } from 'vue'
import { convertToThousands } from "../helper"
import axios from 'axios'

onMounted(() => {
    getPaymentMethod()
})
=======
import { reactive, ref, watch } from 'vue'
import { convertToThousands } from "../helper"
>>>>>>> 99b7dbf (up to date)
=======
import { onMounted, reactive, ref, watch } from 'vue'
import { convertToThousands } from "../helper"
import axios from 'axios'

onMounted(() => {
    getPaymentMethod()
})
>>>>>>> e4e5cab (up to date)

const paymentMethodLists = ref([
    {
        id: 1,
        name: 'BCA',
        number: 'BCA A/n 123123',
        image: 'https://via.placeholder.com/150'
    },
    {
        id: 2,
        name: 'BCA',
        number: 'BCA A/n 123123',
        image: 'https://via.placeholder.com/150'
    },

])

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> e4e5cab (up to date)
const getPaymentMethod = async () => {
    const res = await axios.get('/api/payment-method')
    paymentMethodLists.value = res.data
}

const getAlamat = async () => {
    const res = await axios.get('/api/alamat-all')
    addressLists.value = res.data
}

<<<<<<< HEAD
=======
>>>>>>> 99b7dbf (up to date)
=======
>>>>>>> e4e5cab (up to date)

const addressLists = ref([
    {
        id: 1,
        address: 'Jl. Raya Bogor KM 30',
    },
    {
        id: 2,
        address: 'Jl. Raya Bogor KM 30',
    },
])

const orderDetails = reactive({
    total: 10000,
    discount: 10,
    totalPayment: 1000000,
})
</script>