@extends('app')
@section('content')

<div class="row">
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

@endsection

@section('js')
<script>
    Vue.prototype.$checkout.setDeliveryMethods({!! json_encode($deliveryMethods) !!});
    Vue.prototype.$checkout.setPaymentMethods({!! json_encode($paymentMethods) !!});
    Vue.prototype.$checkout.setProduct({!! json_encode($product) !!})
</script>
@endsection
