'use strict';
// Display Smart Payment Buttons
paypal.Buttons({
    createOrder: function (data, actions) {
        // Sets up the details of the transaction, including the amount and line item details.
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '0.01'
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        // Captures the funds from the transaction
        return actions.order.capture().then(function(details) {
            // Shows a transaction success message to buyer
            alert('Transaction completed by ' + details.payer.name.given_name);
        });
    },
    onCancel: function (data) {
        // Show a cancel page, or return to cart
    },
    onError: function (err) {
        // Show an error page or message
    }
}).render('#paypal-button-container');

