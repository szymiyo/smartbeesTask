<template>
    <div>
        <div class="order">
            <img class="image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Eo_circle_green_white_checkmark.svg/2048px-Eo_circle_green_white_checkmark.svg.png">
            <h1>Zamówienie #{{$checkout.order_id}} zostało złożone, dziękujemy!</h1>  
            <div class="details">
                <div class="client-names">
                    <h3>Dane klienta</h3>
                    <p class="pad">{{$checkout.address.name + ' ' + $checkout.address.surname}}</p>
                    <p class="pad">{{$checkout.address.email}}</p>
                </div>
                <div class="client-address">
                    <h3>Adres dostawy</h3>
                    <p class="pad">{{$checkout.address.address}}</p>
                    <p class="pad">{{$checkout.address.code + ' ' + $checkout.address.city}}</p>
                    <p class="pad">{{$checkout.address.country}}</p>
                </div> 
            </div>
            <div class="prices">
                <h3>Podsumowanie</h3>
                <p class="pad">Cena: {{$checkout.product.amount}}</p>
                <p class="pad">Dostawa: {{$checkout.delivery_method.value}}</p>
                <p class="pad">Rabat: {{$checkout.product.amount + $checkout.delivery_method.value - $checkout.finalPrice}}</p>
                <div class="all">
                    <h4>{{$checkout.finalPrice}} ZŁ</h4>
                </div>
            </div>
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
