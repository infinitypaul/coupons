export default {
    getAllProducts(){
        return new Promise((resolve, reject) => {
            axios.get('/product')
                .then((response) => {
                    resolve(response)
                })
                .catch((response) => {
                    reject(response)
                })
        })
    },

    getAllCart(){
        return new Promise((resolve, reject) => {
            axios.get('/cart')
                .then((response) => {
                    resolve(response)
                })
                .catch((response) => {
                    reject(response)
                })
        })
    },

    addProductToCart({product, quantity}) {
        return new Promise((resolve, reject) => {
            axios.post('cart', {
                product_id: product.id,
                quantity
            })
                .then((response) => {
                    resolve(response)
                })
                .catch((response) => {
                    reject(response)
                })
        })
    },

    removeProductFromCart(productId){
        return new Promise((resolve, reject) => {
            axios.delete(`/cart/${productId}`)
                .then((response) => {
                    resolve(response)
                })
                .catch((response) => {
                    reject(response)
                })
        })
    },

    removeAllProductsFromCart(){
        return new Promise((resolve, reject) => {
            axios.delete(`/cart`)
                .then((response) => {
                    resolve(response)
                })
                .catch((response) => {
                    reject(response)
                })
        })
    },

    applyCoupon(couponCode){
        return new Promise((resolve, reject) => {
            axios.post('/coupon', {couponCode})
                .then((response) => {
                    resolve(response)
                })
                .catch((response) => {
                    reject(response)
                })
        })
    }
}
