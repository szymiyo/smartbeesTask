<template>
    <div>
        <div class="header">
            <h6>2. Metoda dostawy </h6>
        </div>
        <v-radio-group v-model="$checkout.delivery_method" v-if='$checkout && $checkout.deliveryMethods'>
            <v-radio
                v-for='deliver in $checkout.deliveryMethods'
                :key="deliver.name"
                :value="deliver"
            >
            <template slot="label">
                <img v-bind:src="`${deliver.photo}`" class="deliveryimage">
                <p class="deliver-name">{{deliver.name}}</p>
                <v-spacer></v-spacer>
                <p class="deliver-value">{{deliver.value.toFixed(2)}} zł</p> 
            </template>
            </v-radio>
        </v-radio-group>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
