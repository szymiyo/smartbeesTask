<template>
    <div>
        <div class="header">
            <h6>1. Twoje dane</h6>
        </div>
        <v-btn color='red' outlined dark>Logowanie</v-btn>
        <p>Masz już konto? Kliknij aby się zalogować.</p>
        <v-checkbox v-model="$checkout.new_account" :label="'Stwórz nowe konto'"></v-checkbox>
        <v-text-field dense label="e-mail" outlined v-model="$checkout.address.email" v-if="$checkout.new_account"></v-text-field>
        <v-text-field dense label="Hasło" outlined v-model="$checkout.address.password" v-if="$checkout.new_account"></v-text-field>
        <v-text-field dense label="Powtórz hasło" outlined v-model="$checkout.address.repassword" v-if="$checkout.new_account"></v-text-field>
        <v-text-field dense label="Imię" outlined v-model="$checkout.address.name" :rules="(!!v || v==0) || ' '"></v-text-field>
        <v-text-field dense label="Nazwisko" outlined v-model="$checkout.address.surname" :rules="(!!v || v==0) || ' '"></v-text-field>
        <v-select dense label="Kraj" outlined v-model="$checkout.address.country" :items="['Polska', 'Ukraina']" :rules="(!!v || v==0) || ' '"></v-select>
        <v-text-field dense label="Adres" outlined v-model="$checkout.address.address" :rules="(!!v || v==0) || ' '"></v-text-field>
        <v-text-field dense label="Kod pocztowy" outlined v-model="$checkout.address.code" :rules="(!!v || v==0) || ' '"></v-text-field>
        <v-text-field dense label="Miasto" outlined v-model="$checkout.address.city" :rules="(!!v || v==0) || ' '"></v-text-field>
        <v-text-field dense label="Telefon" outlined v-model="$checkout.address.phone" :rules="(!!v || v==0) || ' '"></v-text-field>
        <v-checkbox v-model="$checkout.billing_address" :label="'Dostawa pod inny adres'"></v-checkbox>
    </div>
</template> 

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
