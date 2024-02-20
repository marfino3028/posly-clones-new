<template>
    <div v-if="productDetail" class="form-style-1">
        <!-- Product Image Section Start -->
        <section>
            <div class="custom-container">
                <div class="swiper main-slider product-image-slider">
                    <div id="gallery" class="swiper-wrapper">
                        <div class="swiper-slide shadow-sm border">
                            <div class="hes-gallery" data-pswp-width="1669" data-pswp-height="2500">
                                <img :src="productDetail?.product_details?.image" class="img-fluid w-100" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide shadow-sm border">
                            <div class="hes-gallery">
                                <!-- <img :src="productDetail.image" class="img-fluid w-100" alt="" /> -->
                            </div>
                        </div>
                        <div class="swiper-slide shadow-sm border">
                            <div class="hes-gallery">
                                <!-- <img :src="productDetail.image" class="img-fluid w-100" alt="" /> -->
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- Product Image Section End -->

        <!-- Product Details Section Start -->
        <section class="section-t-space-3 product-detail-section">
            <div class="custom-container">
                <div class="product-name-box">
                    <div class="product-name">
                        <h4>{{ productDetail?.product_details?.name || "-" }}</h4>
                        <!-- <div class="rating-box">
                        <ul class="rating">
                            <li>
                                <i class="ri-star-fill fill-color"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill-color"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill-color"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill fill-color"></i>
                            </li>
                            <li>
                                <i class="ri-star-fill "></i>
                            </li>
                        </ul>
                        <span>(20 ratings)</span>
                    </div> -->
                    </div>
                    <div class="product-price">
                        <h3>Rp {{ convertToThousands(parseInt(productDetail?.product_details?.price) + parseInt(colorCost) +
                            parseInt(sizeCost) + parseInt(variantCost) || 0) }}</h3>
                        <!-- <h6>$28.00</h6> -->
                    </div>
                </div>
                <div class="product-size">
                    <h4>Warna:</h4>
                    <select v-model="form.color" class="form-select" aria-label="Default select example">
                        <option value="">Pilih Warna</option>
                        <option v-for="item in colorOpt" :key="item.id" :value="item.id">{{
                            item.variant_attribute_value_name }}
                        </option>
                    </select>
                </div>
                <div class="product-size">
                    <h4>Ukuran:</h4>
                    <select v-model="form.size" class="form-select" aria-label="Default select example">
                        <option value="">Pilih Ukuran</option>
                        <option v-for="item in sizeOpt" :key="item.id" :value="item.id">{{ item.variant_attribute_value_name
                        }}
                        </option>
                    </select>
                </div>
                <div class="product-size">
                    <h4>Variasi:</h4>
                    <select v-model="form.variant" class="form-select" aria-label="Default select example">
                        <option value="">Pilih Variasi</option>
                        <option v-for="item in variantOpt" :key="item.id" :value="item.id">{{
                            item.variant_attribute_value_name }}
                        </option>
                    </select>
                </div>

            </div>
        </section>
        <!-- Product Details Section End -->

        <!-- Product Description Section Start -->
        <section class="section-t-space-3 section-b-space-3">
            <div class="custom-container">
                <div class="accordion accordion-style" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="description1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#description">Description
                            </button>
                        </h2>
                        <div id="description" class="accordion-collapse collapse show">
                            <div class="accordion-body product-body border">
                                <p class="text-black">{{ productDetail.product_details?.note || "-" }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="accordion-item">
                        <h2 class="accordion-header" id="specifications1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#specifications">Specifications
                            </button>
                        </h2>
                        <div id="specifications" class="accordion-collapse collapse">
                            <div class="table-responsive">
                                <table class="table table-part">
                                    <tr>
                                        <th>Item dimensions</th>
                                        <td>15 x 15 x 3 cm; 250 Grams</td>
                                    </tr>
                                    <tr>
                                        <th>First Available Date</th>
                                        <td>5 April 2022</td>
                                    </tr>
                                    <tr>
                                        <th>Manufacturer‏</th>
                                        <td>Aditya Birla Fashion and Retail Limited</td>
                                    </tr>
                                    <tr>
                                        <th>ASIN</th>
                                        <td>B06Y28LCDN</td>
                                    </tr>
                                    <tr>
                                        <th>Product model number</th>
                                        <td>AMKP317G04244</td>
                                    </tr>
                                    <tr>
                                        <th>Department</th>
                                        <td>Men</td>
                                    </tr>
                                    <tr>
                                        <th>Item Weight</th>
                                        <td>250 G</td>
                                    </tr>
                                    <tr>
                                        <th>Product Size (LxWxH)</th>
                                        <td>15 x 15 x 3 Centimeters</td>
                                    </tr>
                                    <tr>
                                        <th>Net Quantity</th>
                                        <td>1 U</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="return1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#return">Return & Exchange
                            </button>
                        </h2>
                        <div id="return" class="accordion-collapse collapse">
                            <div class="accordion-body product-body">
                                <div class="title mb-2">
                                    <h4>Exchanges and returns are simple within 7 days.</h4>
                                </div>
                                <p class="h6 mb-0">Within 30 days, you have the option to exchange or return for a
                                    different size (if available).</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="reviews1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#reviews">Reviews
                            </button>
                        </h2>
                        <div id="reviews" class="accordion-collapse collapse">
                            <div class="accordion-body product-review">
                                <div class="rating-box">
                                    <div class="total-rating">
                                        <div class="rating-number">
                                            <h4>4.5</h4>
                                        </div>
                                        <h5>Based on 510 Ratings</h5>
                                    </div>

                                    <ul class="category-rating">
                                        <li>
                                            <div class="rating-progress">
                                                <h5>5</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-progress">
                                                <h5>4</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-progress">
                                                <h5>3</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-progress">
                                                <h5>2</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-progress">
                                                <h5>1</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="product-comment">
                                    <li>
                                        <div class="product-review">
                                            <div class="top-review">
                                                <div class="review-content">
                                                    <h5>Very Good Stay</h5>
                                                    <h6 class="h5">Alex jecno, 22 june 2022</h6>
                                                </div>
                                                <div class="review-rate">
                                                    <h6>4.5</h6>
                                                </div>
                                            </div>
                                            <div class="review-comment">
                                                <p>“It's a really cute skirt! I didn't expect to feel so good in a polyester
                                                    material. The print is slightly less bright.”</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-review">
                                            <div class="top-review">
                                                <div class="review-content">
                                                    <h5>Very Good Stay</h5>
                                                    <h6 class="h5">Alex jecno, 22 june 2022</h6>
                                                </div>
                                                <div class="review-rate">
                                                    <h6>4.7</h6>
                                                </div>
                                            </div>
                                            <div class="review-comment">
                                                <p>“Wow.. but it should have more flairs. mind-blowing purchase..🤗”</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <h5 class="all-comment">
                                            <a href="javascript:void(0)">See all reviews(15)</a>
                                        </h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import axios from "axios";

//      'id' => 1,
//     'name' => 'T-Shirt 1',
//         'price' => 100000,
//             'image' => 'https://via.placeholder.com/150',
//                 'description' => 'Lorem ipsum dolor sit amet c
//             onsectetur adipisicing elit.Quos blanditiis tenetur
//             unde suscipit, quam beatae rerum inventore consectetur,
//     neque doloribus, cupiditate numquam dignissimos laborum
//             fugiat deleniti ? Eum quasi quidem quibusdam.',
// 'variant' => [
//     [
//         'id' => 1,
//         'name' => 'S',
//     ],
//     [
//         'id' => 2,
//         'name' => 'M',
//     ],
//     [
//         'id' => 3,
//         'name' => 'L',
//     ],
//     [
//         'id' => 4,
//         'name' => 'XL',
//     ],
//     [
//         'id' => 5,
//         'name' => 'XXL',
//     ]
// ],
//     'color' => [
//         [
//             'id' => 1,
//             'name' => 'Red',
//             'code' => '#ff0000',
//         ],
//         [
//             'id' => 2,
//             'name' => 'Green',
//             'code' => '#00ff00',
//         ],
//         [
//             'id' => 3,
//             'name' => 'Blue',
//             'code' => '#0000ff',
//         ],
//         [
//             'id' => 4,
//             'name' => 'Yellow',
//             'code' => '#ffff00',
//         ],
//         [
//             'id' => 5,
//             'name' => 'Black',
//             'code' => '#000000',
//         ],
//         [
//             'id' => 6,
//             'name' => 'White',
//             'code' => '#ffffff',
//         ],
//     ],

import { reactive, ref, watchEffect, onMounted, computed, watch } from "vue";
import { convertToThousands } from "../helper"


const productDetail = ref({
    // id: 1,
    // name: "T-Shirt 1",
    // price: 100000,
    // image: "https://via.placeholder.com/150",
    // description:
    //     "Lorem ipsum dolor sit amet c onsectetur adipisicing elit.Quos blanditiis tenetur unde suscipit, quam beatae rerum inventore consectetur, neque doloribus, cupiditate numquam dignissimos laborum fugiat deleniti ? Eum quasi quidem quibusdam.",
    // variant: [
    //     {
    //         id: 1,
    //         name: "S",
    //     },
    //     {
    //         id: 2,
    //         name: "M",
    //     },
    //     {
    //         id: 3,
    //         name: "L",
    //     },
    //     {
    //         id: 4,
    //         name: "XL",
    //     },
    //     {
    //         id: 5,
    //         name: "XXL",
    //     },
    // ],
    // color: [
    //     {
    //         id: 1,
    //         name: "Red",
    //         code: "#ff0000",
    //     },
    //     {
    //         id: 2,
    //         name: "Green",
    //         code: "#00ff00",
    //     },
    //     {
    //         id: 3,
    //         name: "Blue",
    //         code: "#0000ff",
    //     },
    //     {
    //         id: 4,
    //         name: "Yellow",
    //         code: "#ffff00",
    //     },
    //     {
    //         id: 5,
    //         name: "Black",
    //         code: "#000000",
    //     },
    //     {
    //         id: 6,
    //         name: "White",
    //         code: "#ffffff",
    //     },
    // ],
});

const form = reactive({
    color: "",
    size: "",
    variant: "",
    productId: productDetail?.value?.product_details?.id,
});

// const colorList = ref([]);
// const sizeList = ref([]);

onMounted(async () => {
    // get query params in url
    const urlParams = new URLSearchParams(window.location.search);

    console.log(urlParams.get("id"));

    const id = urlParams.get("id");

    await getProductDetail(id);
});

const getProductDetail = async (id) => {
    try {
        const response = await axios.get(`/api/product/${id}`);
        console.log(response.data);

        productDetail.value = response.data;
        console.log('data', productDetail.value);
    } catch (error) {
        console.log(error);
    }
};

const colorOpt = computed(() => {
    return productDetail?.value?.variants?.filter((item) => item.variant_attribute_id === 2)
});

const sizeOpt = computed(() => {
    return productDetail?.value?.variants?.filter((item) => item.variant_attribute_id === 1)
});

const variantOpt = computed(() => {
    return productDetail?.value?.variants?.filter((item) => item.variant_attribute_id === 3)
});

const colorCost = ref(0)
const sizeCost = ref(0)
const variantCost = ref(0)
watch(form, (value) => {
    console.log(value);

    if (value.color) {
        const color = colorOpt.value.find((item) => item.id === value.color);
        colorCost.value = color?.additional_price || 0;
        console.log('color', color);
    }

    if (value.size) {
        const size = sizeOpt.value.find((item) => item.id === value.size);
        sizeCost.value = size?.additional_price || 0;
        console.log('size', size);
    }

    if (value.variant) {
        const variant = variantOpt.value.find((item) => item.id === value.variant);
        variantCost.value = variant?.additional_price || 0;
        console.log('variant', variant);
    }

    // color cost 
}, { deep: true });


watchEffect(() => {
    form.productId = productDetail?.value?.product_details?.id;
    localStorage.setItem("cart", JSON.stringify(form));
});

</script>