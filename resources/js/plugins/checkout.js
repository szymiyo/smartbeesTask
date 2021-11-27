export default {
    data:()=>{
        return {
            test:'szymek3',
            deliveryMethods:null,
            address:{},
            delivery_method:null,
            paymentMethods:null,
            payment_method:null,
            product:null,
            new_account: false,
            billing_address: false,
            statute: false,
            newsletter: false
        }
    },
    methods:{
        setDeliveryMethods(methods){
            this.deliveryMethods=methods;
            console.log(methods);
        },
        setPaymentMethods(methods){
            this.paymentMethods=methods;
        },
        setProduct(product){
            this.product=product;
        },
        createOrder(){
            if(this.new_account == true){
                if(!this.address.email || this.address.email.length==0 || !this.address.email.match(/^\S+@\S+\.\S+$/)){
                    alert('Niepoprawny e-mail.')
                    return false;
                }
                if(!this.address.password || this.address.password.length <8){
                    alert('Hasło musi zawierać minimum 8 znaków.')
                    return false;
                }
                if(!this.address.repassword || this.address.repassword != this.address.password){
                    alert('Hasło różni się od poprzedniego.')
                    return false;
                }
            }
            if(!this.address.name || this.address.name.length < 3 || !this.address.name.match(/^[A-Za-z]+$/)){
                alert('Zły format imienia.')
                return false;
            }
            if(!this.address.surname || this.address.surname.length <3 || !this.address.surname.match(/^[A-Za-z]+$/)){
                alert('Zły format nazwiska.')
                return false;
            }
            if(!this.address.address || this.address.address.length <5){
                alert('Niepoprawny adres.')
                return false;
            }
            if(!this.address.code || !this.address.code.match(/\d{2}-\d{3}/) ){
                alert('Niepoprawny kod.')
                return false;
            }
            if(!this.address.city || this.address.city.length <3){
                alert('Brak podanego miasta.')
                return false;
            }
            if(!this.address.phone || this.address.phone.length <9  || !this.address.phone.match(/^[0-9]*$/)){
                alert('Zły format numeru telefonu.')
                return false;
            }
        }
    },
    computed:{
        isCashOnDelivery(){
            console.log(this.delivery_method)
            if(this.delivery_method){
                if(this.delivery_method.cash_on_delivery == 1){
                    if(this.payment_method && this.payment_method.cash_on_delivery != 1){
                        this.payment_method = null;
                    }
                    return true;
                }
            }
            return false;
        }
    }

}