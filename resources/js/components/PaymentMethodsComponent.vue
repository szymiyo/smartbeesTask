<template>
    <div>
       <div v-if="$checkout">
        <div class="header">
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
                <p>{{payment.name}}</p> 
            </template>
            </v-radio>
        </v-radio-group>
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
