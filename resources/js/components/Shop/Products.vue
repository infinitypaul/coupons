<template>
    <div class="row">
        <div class="col-sm-4" v-for="product in products">
            <product :product="product"></product>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'
    import Product from "./Product";
    export default {
        name: "Products",
        computed:{
            ...mapGetters({
                products: 'allProducts'
            }),
        },
        components: {
            Product
        },
        methods: {
            ...mapActions({
                getAllProducts: 'getAllProducts'
            })
        },
        mounted () {
            this.getAllProducts()
        }

    }
</script>

<style>

</style>
