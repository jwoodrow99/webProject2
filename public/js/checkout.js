paypal.Buttons({
    // enableStandardCardFields: true,
    createOrder: function () {
        return fetch('/order/checkout', {
            method: 'post',
            credentials: "same-origin",
            headers: {
                'content-type': 'application/json',
                'accept': 'application/json',
                'x-requested-with': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        }).then(function(res) {
            console.log(document.head.querySelector('meta[name="csrf-token"]').content);
            console.log(res);
            return res.json();
        }).then(function(data) {
            console.log(data);
            return data.orderID;
        });
    }
}).render('#paypal-button-container');

