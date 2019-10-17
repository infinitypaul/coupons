<template>
    <figure class="figure">
        <img :src="product.image" :alt="product.title" class="figure-img img-fluid rounded" >
        <figcaption class="figure-caption ">
            <a href="#">{{ product.title }}</a> ${{ product.price }}
            <p>{{ product.description }}</p>
            <button class="btn btn-primary" role="button" @click.prevent="addToCart">Add to cart</button>
        </figcaption>
    </figure>

</template>

<script>
    import { mapActions } from 'vuex';

    export default {
        name: "Product",
        props: ['product'],
        methods:{
            ...mapActions({
                addProductToCart: 'addProductToCart'
            }),
            addToCart () {
                this.addProductToCart({
                    product: this.product,
                    quantity: 1
                })
            }
        }
    }
</script>

<style scoped>
    .figure-img {
        width: 100%;
    }
</style>
