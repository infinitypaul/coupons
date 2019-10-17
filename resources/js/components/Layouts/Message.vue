<template>
    <div class="message" v-if="message">
        {{ message }}
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    export default {
        name: "Message",
        computed: {
            ...mapGetters({
                message: 'message'
            })
        }
    }
</script>

<style>
    .message {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2em;
        position: fixed;
        top: 0; right: 0;
        background-color: tomato;
        color: #fff;
        height: 60px;
        width: 25%;
    }
</style>
