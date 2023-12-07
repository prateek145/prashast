
<script>
    var txn_token = "{{$txn_token}}";
    var order_id = "{{$order_id}}";
    var amount = "{{$amount}}";

    console.log(txn_token);
    function onScriptLoad(){
        console.log('prateek');
        var config = {
         "root": "",
         "flow": "DEFAULT",
         "data": {
          "orderId": order_id /* update order id */,
          "token": txn_token /* update token value */,
          "tokenType": "TXN_TOKEN",
          "amount": amount /* update amount */
        },
        "handler": {
            "notifyMerchant": function(eventName,data){
                console.log("notifyMerchant handler function called");
                console.log("eventName => ",eventName);
              console.log("data => ",data);
            } 
          }
        };
        
        if(window.Paytm && window.Paytm.CheckoutJS){
            window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() {
                // initialze configuration using init method 
                window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
                    // after successfully update configuration invoke checkoutjs
                    window.Paytm.CheckoutJS.invoke();
                }).catch(function onError(error){
                    console.log("error => ",error);
                });
            });
        } 
    }
</script>
 <script type="application/javascript" crossorigin="anonymous" src="https://securegw.paytm.in/merchantpgpui/checkoutjs/merchants/BZktXB05180965204710.js" onload="onScriptLoad();"></script>


