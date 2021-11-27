<template>
    <div>
        <div class="header">
            <h6>4. Podsumowanie</h6>
        </div>
        <img v-bind:src="$checkout.product.photo" class="deliveryimage">
        <p>{{$checkout.product.name}}</p>
        <p>Ilosc stala 1 </p>
        <p>{{$checkout.product.amount}}</p>
        <p>Suma częściowa</p>
        <v-textarea
          solo
          name="input-7-4"
          label="Komentarz"
        ></v-textarea>
        <v-checkbox v-model="$checkout.newsletter" :label="'Zapisz się, aby otrzymywać newsletter'"></v-checkbox>
        <v-checkbox v-model="$checkout.statute" :label="'Zapoznałam/em się z Regulaminem zakupów'"></v-checkbox>
        <v-btn color='red' @click='$checkout.createOrder' dark>Potwierdź zakup</v-btn>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
