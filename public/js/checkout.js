const stripe = Stripe('pk_test_V9nW4E2CaQuSm5SAzU2lgMD7009LQTGCnM');

const elements = stripe.elements();
const cardElement = elements.create('card');

cardElement.mount('#card-element');

const cardHolderName = document.getElementById('name');
const cardButton = document.getElementById('card-button');
const form = document.querySelector('#payment-form');

cardButton.addEventListener('click', async (e) => {
    const { paymentMethod, error } = stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: cardHolderName.value }
        }
    );

    console.log(error);
    console.log(paymentMethod);

    if (error) {

        console.log(error);
        console.log(paymentMethod);
        document.querySelector('#card-errors').textContent = error.message;
    } else {

        console.log(error);
        console.log(paymentMethod);
        document.querySelector('#card-errors').textContent = '';

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $.ajax({
            type: "POST",
            url: '/order',
            data: { id: paymentMethod },
            success: function (response) {
                console.log(response)
            },
            error: function (response) {
                alert('Error' + response);
            }
        });

    }
});
