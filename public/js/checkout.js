paypal.Buttons({
    // enableStandardCardFields: true,
    createOrder: function () {
        return fetch('/order/checkout', {
            method: 'post',
            headers: {
                'x-csrf-token': document.head.querySelector('meta[name="csrf-token"]'),
                'content-type': 'application/json'
            }
        }).then(function(res) {
            return res.json();
        }).then(function(data) {
            return data.orderID;
        });
    }
}).render('#paypal-button-container');

