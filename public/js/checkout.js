const stripe = Stripe('stripe-public-key');

const elements = stripe.elements();
const cardElement = elements.create('card');

cardElement.mount('#card-element');

const cardHolderName = document.getElementById('name');
const cardButton = document.getElementById('card-button');
const form = document.querySelector('#payment-form');

cardButton.addEventListener('click', async (e) => {
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: cardHolderName.value }
        }
    );

    if (error) {
        document.querySelector('#card-errors').textContent = error.message;
    } else {
        document.querySelector('#card-errors').textContent = '';

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $.ajax({
            type: "POST",
            url: '/order',
            data: { paymentMethod },
            success: function (response) {
                console.log(response)
            }
        });
    }
});
