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
            newsletter: false,
            comment: '',
            step: 1,
            discount: 0,
            order_id: 0,
            code: null,
            code_error: null,
            used_code: null,
            dialog: false
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
            console.log(this.new_account);
            if(this.new_account == true){
                if(!this.address.password || this.address.password.length <8){
                    alert('Hasło musi zawierać minimum 8 znaków.')
                    return false;
                }
                if(!this.address.repassword || this.address.repassword != this.address.password){
                    alert('Hasło różni się od poprzedniego.')
                    return false;
                }
            }
            if(!this.address.email || this.address.email.length==0 || !this.address.email.match(/^\S+@\S+\.\S+$/)){
                alert('Niepoprawny e-mail.')
                return false;
            }
            if(!this.address.name || !this.address.name.match(/^[A-Za-z]+$/)){
                alert('Imię nie może być puste.')
                return false;
            }
            if(!this.address.surname || this.address.surname.length <3 || !this.address.surname.match(/^[A-Za-z]+$/)){
                alert('Zły format nazwiska.')
                return false;
            }
            if(!this.address.country){
                alert('Należy wybrać kraj.')
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
            let data = {
                address: this.address,
                payment_method: this.payment_method,
                delivery_method: this.delivery_method,
                billing_address: this.billing_address,
                newsletter: this.newsletter,
                item: this.product,
                comment: this.comment,
                create_account: this.new_account,
                final_price: this.finalPrice
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: 'http://127.0.0.1:8000/create/order',
                data: data
            }).then(res=>{
                this.step=2;
                this.order_id=res;
            })
        },
        checkCode(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                url: 'http://127.0.0.1:8000/coupon/active/' + this.code,
            }).then(res=>{
                if(res.isValid){
                    this.used_code = this.code;
                    this.discount = res.amount;
                    this.code_error = null;
                }else{
                    this.used_code = null;
                    this.discount = 0;
                    this.code_error = res.error;
                }
                console.log(res);
            })
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
        },
        finalPrice(){
            let price = 0;
            price += this.product.amount;
            if(this.delivery_method) price += this.delivery_method.value;
            if(this.discount > 0 && this.code) price -= this.discount;
            if(price < 0){
                return 0;
            }
            return price.toFixed(2);
        }
    }

}