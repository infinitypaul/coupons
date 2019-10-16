import coupon from "./Coupon";

const state = {
    message: null
};


const actions = {
    flashMessage({commit}, message){
        commit('setMessage', message);

        setTimeout(() => {
            commit('clearMessage')
        }, 3000)
    }
};

const getters = {
    message : state => {
        return state.message;
    }
};

const mutations = {
    setMessage(state, message){
        state.message = message
    },
    clearMessage(state, message){
        state.message = null
    }
};

export default {
    state,
    getters,
    mutations,
    actions
}
