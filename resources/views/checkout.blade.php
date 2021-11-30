@extends('app')
@section('content')

<div class="row" v-if="$checkout && $checkout.step == 1">
    <div class="col-md-4">
        <address-component></address-component>
    </div>
    <div class="col-md-4">
        <delivery-methods-component></delivery-methods-component>
        <payment-methods-component></payment-methods-component>
    </div>
    <div class="col-md-4">
        <summary-component></summary-component>
    </div>
</div>

<div class="order-message" v-else-if="$checkout && $checkout.step == 2">
    <show-order-component></show-order-component>
</div>

<div v-else></div>

@endsection

@section('js')
<script>
    Vue.prototype.$checkout.setDeliveryMethods({!! json_encode($deliveryMethods) !!});
    Vue.prototype.$checkout.setPaymentMethods({!! json_encode($paymentMethods) !!});
    Vue.prototype.$checkout.setProduct({!! json_encode($product) !!})
</script>
@endsection
