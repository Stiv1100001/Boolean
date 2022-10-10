<template>
<v-braintree
    :authorization="token"
    @success="onSuccess"
    @error="onError"
    locale="it_IT">
    <template v-slot:button="slotProps">
    <button class="btn btn-danger" @click="slotProps.submit" color="success">
        Aggiungi carta
    </button>
    </template></v-braintree
>
</template>

<script>
export default {
props: {
    token: {
    type: String,
    required: true,
    },
},
methods: {
    onSuccess(payload) {
    let nonce = payload.nonce;
    this.$emit("nonce", nonce);
    },
    onError(error) {
    let message = error.message;
    console.error(message);
    },
},
};
</script>

<style></style>
