<template>
    <div>
        <div class="mini-cart">
            <ul class="list-group" v-if="cart.length">
                <li class="list-group-item" v-for="item in cart">
                    <a href="#" class="badge" @click.prevent="removeProductFromCart(item.product.id)">Remove</a>
                    {{ item.quantity }} x {{ item.product.title }} @ ${{ item.product.price }}
                </li>

                <li class="list-group-item" v-if="getCoupon.value">
                    <a href="#" class="badge" @click.prevent="removeCoupon">X</a>
                    <a href="#" >Discount ({{ getCoupon.code }}) : - {{ getCoupon.value.toFixed(2) }} </a>
                </li>
                <li class="list-group-item">
                    <a href="#" @click.prevent="removeAllProductsFromCart">Clear cart</a>
                </li>


            </ul>
            <p v-else>No items in cart</p>
        </div>
        <div class="py-4" v-if="cart.length && !getCoupon.value">
            <label for="coupon">Sample Coupon On Github</label>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon4" v-model="coupon" id="coupon">
                <div class="input-group-append" id="button-addon4">
                    <button class="btn btn-primary" @click.prevent="checkCoupon" type="button">Apply</button>
                </div>
            </div>
        </div>

    </div>



</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    export default {
        name: "MiniCart",
        data(){
            return{
               coupon: ''
            }
        },
        computed: {
            ...mapGetters({
                cart: 'allCart',
                getCoupon:'getCoupon'
            })
        },
        methods:{
            ...mapActions({
                getAllCarts:'getAllCarts',
                removeProductFromCart: 'removeProductFromCart',
                removeAllProductsFromCart: 'removeAllProductsFromCart',
                applyCoupon: 'applyCoupon',
                removeCoupon: 'removeCoupon'
            }),
            checkCoupon(){
                this.applyCoupon(this.coupon).then(()=>{
                    this.coupon = '';
                })
            }
        },
        mounted() {
            this.getAllCarts();
        }
    }
</script>

<style scoped>

</style>
