<script src="https://js.stripe.com/v3/"></script>
<script src="{{asset('js/payment.js')}}"></script>
<script>
  var stripe_public_key = "{{config('payment.stripe_secret_key')}}";
</script>