<template>
    <div>
        <div class="header">
            <h6>4. Podsumowanie</h6>
        </div>
        <div class="product">
            <img v-bind:src="$checkout.product.photo" class="product-image">
            <div class="product-about">
                <p class="product-name">{{$checkout.product.name}}</p>
                <p>Ilość: 1</p>
            </div>
            <p class="price">{{$checkout.product.amount}} zł</p>
        </div>
        <div class="amounts">
            <div class="sum-partial">
                <p>Suma częściowa</p>
                <p class="amount">{{$checkout.product.amount}} zł</p>
            </div>
            <div class="sum-partial" v-if="$checkout.delivery_method">
                <p>Dostawa</p>
                <p class="amount">{{$checkout.delivery_method.value}} zł</p>
            </div>
            <div class="sum-partial" v-if="$checkout.code && $checkout.discount > 0">
                <p>Kod rabatowy: {{$checkout.used_code}}</p>
                <p class="amount">{{$checkout.discount}} zł</p>
            </div>
            <div class="sum">
                <p>Łącznie</p>
                <p class="amount">{{$checkout.finalPrice}} zł</p>
            </div>
        </div> 
        <v-textarea
          solo
          name="input-7-4"
          label="Komentarz"
          v-model="$checkout.comment"
        ></v-textarea>
        <v-checkbox class="checkbox-summary" v-model="$checkout.newsletter" :label="'Zapisz się, aby otrzymywać newsletter'"></v-checkbox>
        <v-checkbox class="checkbox-summary" v-model="$checkout.statute" :label="'Zapoznałam/em się z Regulaminem zakupów'"></v-checkbox>
        <v-btn class="confirmation-btn" color='red' @click='$checkout.createOrder' v-if="$checkout" :disabled="!$checkout.statute && $checkout.delivery_method && $checkout.payment_method">Potwierdź zakup</v-btn>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
