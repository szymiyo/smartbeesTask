<template>
    <div>
        <div class="header">
            <v-icon>mdi-account mdi-light</v-icon>
            <h6>1. Twoje dane</h6>
        </div>
        <v-btn color='red' outlined dark @click='$checkout.dialog = true'>Logowanie</v-btn>
        <p class="acc-question">Masz już konto? Kliknij aby się zalogować.</p>
        <v-checkbox v-model="$checkout.new_account" :label="'Stwórz nowe konto'"></v-checkbox>
        <v-text-field dense label="Hasło" outlined v-model="$checkout.address.password" v-if="$checkout.new_account" type="password"></v-text-field>
        <v-text-field dense label="Powtórz hasło" outlined v-model="$checkout.address.repassword" v-if="$checkout.new_account" type="password"></v-text-field>
        <v-text-field dense label="e-mail" outlined v-model="$checkout.address.email"></v-text-field>
        <v-text-field dense label="Imię" outlined v-model="$checkout.address.name"></v-text-field>
        <v-text-field dense label="Nazwisko" outlined v-model="$checkout.address.surname"></v-text-field>
        <v-select dense label="Kraj" outlined v-model="$checkout.address.country" :items="['Polska', 'Niemcy', 'Ukraina']"></v-select>
        <v-text-field dense label="Adres" outlined v-model="$checkout.address.address"></v-text-field>
        <v-text-field dense label="Kod pocztowy" outlined v-model="$checkout.address.code"></v-text-field>
        <v-text-field dense label="Miasto" outlined v-model="$checkout.address.city"></v-text-field>
        <v-text-field dense label="Telefon" outlined v-model="$checkout.address.phone"></v-text-field>
        <v-checkbox class="shipping-address" v-model="$checkout.billing_address" :label="'Dostawa pod inny adres'"></v-checkbox>

        <v-dialog
        v-model="$checkout.dialog"
        width="500"
        >
        <v-card>
            <v-card-title class="text-h5 grey lighten-2">
            Zaloguj się
            </v-card-title>

            <v-card-text>
                    <v-text-field label="email" outlined>
                        
                    </v-text-field>
                    <v-text-field label="password" type="password" outlined>
                        
                    </v-text-field>

            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions>
           
            <v-btn
                color="primary"
                @click="$checkout.dialog = false"
                text
            >
                Zaloguj
            </v-btn>
             <v-btn
                color="red"
                @click="$checkout.dialog = false"
                text
            >
                Anuluj
            </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>

    </div>
</template> 

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
