<template>
    <header class="header">
        <div class="container">
            {{ cartItemCount }} items in cart (${{ cartTotal }})
        </div>
    </header>
</template>

<script>
    import { mapGetters } from 'vuex'
    export default {
        name: "TopBar",
        computed: {
            ...mapGetters({
                cartItemCount: 'cartItemCount',
                cartTotal: 'cartTotal'
            })
        }
    }
</script>

<style>
    .header {
        background-color: #222;
        color: #fff;
        padding: 20px;
        margin-bottom: 20px;
    }
</style>
