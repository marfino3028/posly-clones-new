<template>
    <section>
        <div class="custom-container">
            <div class="accordion accordion-style" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="card1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#card">Select
                            Card</button>
                    </h2>
                    <div id="card" class="accordion-collapse collapse show">
                        <div class="accordion-body p-0">
                            <ul class="payment-list">
                                <li>
                                    <input value="1" type="radio" name="1" class="form-check-input" id="01">
                                    <label class="minha-table" for="01">
                                        <img src="{{ asset('assets/asset_frontend/images/pay/m-card.png') }}" alt="">
                                        <span>9800 XXXX XXXX 0545</span>
                                    </label>
                                </li>

                                <li>
                                    <input value="1" type="radio" name="1" class="form-check-input" id="02">
                                    <label class="minha-table" for="02">
                                        <img src="{{ asset('assets/asset_frontend/images/pay/visa.png') }}" alt="">
                                        <span>6580 XXXX XXXX 2562</span>
                                    </label>
                                </li>

                                <li>
                                    <input value="3" type="radio" name="1" class="form-check-input" id="03" checked="">
                                    <label class="minha-table" for="03">
                                        <img src="{{ asset('assets/asset_frontend/images/pay/discover.png') }}" alt="">
                                        <span>5125 XXXX XXXX 6262</span>
                                    </label>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section-t-space-3">
        <div class="custom-container">
            <div class="order-detail-box order-detail-box-2">
                <div class="product-title">
                    <h4>Order Details:</h4>
                </div>
                <ul class="order-price-list">
                    <li>
                        <div class="order-price-box">
                            <h4 class="name">Total Harga</h4>
                            <h4 class="price">$25.00</h4>
                        </div>
                    </li>

                    <li>
                        <div class="order-price-box">
                            <h4 class="name">Potongan Discount</h4>
                            <h4 class="price success">-$5.00</h4>
                        </div>
                    </li>



                    <li class="total-price">
                        <div class="order-price-box">
                            <h4 class="name">Total Harga</h4>
                            <h4 class="price">$23.00</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>