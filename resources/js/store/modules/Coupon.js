import api from '../api/all'

const state = {
    coupon: {
        value: 0
    }
};

const getters = {
    getCoupon : state => {
        return state.coupon;
    },
};

const actions = {
    applyCoupon({commit, dispatch}, couponCode) {
        api.applyCoupon(couponCode).then((response)=>{
            if(response.data.value){
                commit('clearCoupon');
                commit('setCoupon', response.data);
                dispatch('flashMessage', 'Coupon Applied Successfully');
            } else{
                dispatch('flashMessage', 'Error Adding Coupon, ');
            }
        }).catch(()=>{
            dispatch('flashMessage', 'Error Adding Coupon');
        })
    },
    removeCoupon({commit, dispatch}){
        commit('clearCoupon');
        dispatch('flashMessage', 'Coupon Removed Successfully');
    }
};

const mutations = {
    setCoupon(state, coupon){
        state.coupon = coupon
    },
    clearCoupon(state){
        state.coupon = {
            value : 0
        }

    }
};

export default {
    state,
    actions,
    mutations,
    getters
}
