<template>
    <div>
        <message></message>
        <top-bar></top-bar>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <mini-cart></mini-cart>
                </div>

                <div class="col-sm-9">
                    <products></products>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import TopBar from "./Layouts/TopBar";
    import MiniCart from "./Shop/MiniCart";
    import Products from "./Shop/Products";
    import Message from "./Layouts/Message";
    export default {
        name: "ShopComponent",
        components:{
            Message,
            Products,
            MiniCart,
            TopBar
        }
    }
</script>

<style scoped>

</style>
