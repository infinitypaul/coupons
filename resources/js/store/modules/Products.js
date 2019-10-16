import api from '../api/all'

const state = {
    products: []
};

const getters = {
    allProducts : state => {
        return state.products;
    }
};

const actions = {
    getAllProducts({commit}) {
        api.getAllProducts().then((response)=>{
            commit('setProducts', response.data.data)
        })
    }
};

const mutations = {
    setProducts(state, products){
        state.products = products
    },
};

export default {
    state,
    getters,
    mutations,
    actions
}
