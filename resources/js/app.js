import { createApp } from "vue";
import ExampleComponent from "./components/ExampleComponent.vue";
import ProductTabVue from "./components/ProductTab.vue";
import ProductDetailVue from "./components/ProductDetail.vue";
import FooterProductNavVue from "./components/FooterProductNav.vue";
import LoginVue from "./components/Login.vue";
import RegisterVue from "./components/Register.vue";
import HeaderNavVue from "./components/HeaderNav.vue";
import FooterCheckoutNavVue from "./components/FooterCheckoutNav.vue";
import CartVue from "./components/Cart.vue";
import PaymentVue from "./components/Payment.vue";
import FooterPaymentNavVue from "./components/FooterPaymentNav.vue";
import OrderDetailVue from "./components/OrderDetail.vue";
import PaymentSuccessVue from "./components/PaymentSuccess.vue";
import SidebarVue from "./components/Sidebar.vue";

console.log("test");

import { createRouter, createWebHistory } from "vue-router";

const routes = [{ path: "/foo", component: ExampleComponent }];

const app = createApp();

const router = createRouter({
  history: createWebHistory(),
  routes,
});

app.component("example-component", ExampleComponent);
app.component("product-tab-vue", ProductTabVue);
app.component("product-detail-vue", ProductDetailVue);
app.component("footer-product-nav-vue", FooterProductNavVue);
app.component("login-vue", LoginVue);
app.component("register-vue", RegisterVue);
app.component("header-nav-vue", HeaderNavVue);
app.component("footer-checkout-nav-vue", FooterCheckoutNavVue);
app.component("cart-vue", CartVue);
app.component("payment-vue", PaymentVue);
app.component("footer-payment-nav-vue", FooterPaymentNavVue);
app.component("order-detail-vue", OrderDetailVue);
app.component("payment-success-vue", PaymentSuccessVue);
app.component("sidebar-vue", SidebarVue);

app.use(router).mount("#app");

export const baseUrl = "http://localhost:8000/api";
