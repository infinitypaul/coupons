import Vue from 'vue'
import Vuex from 'vuex'
import carts from "./modules/Cart";
import products from "./modules/Products";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        products,
        carts
    }
})
