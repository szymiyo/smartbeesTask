<template>
    <div>
       <div v-if="$checkout">
        <div class="header">
            <v-icon>mdi-credit-card mdi-light</v-icon>
            <h6>3. Metoda płatności</h6>
        </div>
        <v-radio-group v-model="$checkout.payment_method" v-if='$checkout && $checkout.paymentMethods'>
            <v-radio
                v-for='payment in $checkout.paymentMethods'
                v-if='!$checkout.isCashOnDelivery || (payment.cash_on_delivery == 1)'
                :key="payment.name"
                :value="payment"
            >
            <template slot="label">
                <img v-bind:src="`${payment.photo}`" class="deliveryimage">
                <p class="payment-name">{{payment.name}}</p> 
            </template>
            </v-radio>
        </v-radio-group>
        <v-text-field class="no--validation" dense label="Kod rabatowy" outlined v-model="$checkout.code"></v-text-field>
        <p class="acc-question" v-if='$checkout.code_error' style="color: red;">{{$checkout.code_error}}</p>
        <v-btn color='red' outlined dark @click='$checkout.checkCode'>{{$checkout.code && $checkout.discount > 0 ? 'Zmień kod rabatowy' : 'Dodaj kod rabatowy'}}</v-btn>
       </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
