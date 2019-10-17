import api from '../api/all'
import coupon from './Coupon'
import flash from './FlashMessage';

const state = {
    cart: []
};

const getters = {
    allCart : state => {
        return state.cart;
    },
    cartItemCount : state => {
        return state.cart.length
    },
    cartTotal: state => {
        return (state.cart.reduce((a, b) => {
            return a + b.product.price * b.quantity
        }, 0) - coupon.state.coupon.value).toFixed(2)
    }
};

const actions = {
    getAllCarts({commit}) {
        api.getAllCart().then((response)=>{
            commit('setCarts', response.data)
        })
    },
    addProductToCart({commit, dispatch}, { product, quantity }){
        api.addProductToCart({product, quantity}).then(()=>{
            commit('clearCoupon');
            commit('appendToCart', { product, quantity });
            dispatch('flashMessage', 'Item added to cart')
        }).catch(()=>{
            dispatch('flashMessage', 'Error, Item Not Added To Cart')
        });

    },
    removeProductFromCart({ commit }, productId) {
        commit('clearCoupon');
        commit('removeFromCart', productId);
        api.removeProductFromCart(productId)
    },
    removeAllProductsFromCart({commit, dispatch}){
        commit('clearCart');
        commit('clearCoupon');
        api.removeAllProductsFromCart();
        dispatch('flashMessage', 'All items removed')
    }
};

const mutations = {
    setCarts(state, cart){
        state.cart = cart
    },
    appendToCart(state, {product, quantity}){
        const existing = state.cart.find((item) => {
            return item.product.id === product.id
        });
        if (existing) {
            existing.quantity++
        } else {
            state.cart.push({
                product,
                quantity: quantity
            })
        }
    },

    removeFromCart(state, productId){
        const existing = state.cart.find((item) => {
            return item.product.id === productId
        });
        if (existing.quantity > 1) {
            existing.quantity--
        } else {
            state.cart = state.cart.filter((item) => {
                return item.product.id !== productId
            })
        }
    },

    clearCart(state){
        state.cart = []
    }
};

const modules ={
    coupon:coupon,
    flash: flash
};

export default {
    state,
    getters,
    mutations,
    actions,
    modules
}
