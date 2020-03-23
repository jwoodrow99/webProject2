const stripe = Stripe('pk_test_V9nW4E2CaQuSm5SAzU2lgMD7009LQTGCnM');

const elements = stripe.elements();
// const cardElement = elements.create('card');
const cardElement = elements.create('card', { hidePostalCode: true });

cardElement.mount('#card-element');

const cardHolderName = document.getElementById('name');
const cardButton = document.getElementById('card-button');
const form = document.querySelector('#payment-form');
const cardHolderAddress = document.querySelector('#address');
const cardHolderCity = document.querySelector('#city');
const cardHolderProvince= document.querySelector('#province');
const cardHolderPostal = document.querySelector('#postal');
const cardHolderPhone = document.querySelector('#phone');
const cardHolderPickupDate = document.querySelector('#pickupDate');

cardButton.addEventListener('click', async (e) => {
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: {
                name: cardHolderName.value,
                phone: cardHolderPhone.value,
                address: {
                    city: cardHolderCity.value,
                    line1: cardHolderAddress.value,
                    postal_code: cardHolderPostal.value,
                    state: cardHolderProvince.value
                }
            },
            metadata: {
                pickupDate: cardHolderPickupDate.value
            }
        }
    ).then(result => {
        const paymentId = result.paymentMethod.id;
        postPaymentId(paymentId)
    }, reason => {
        console.log(reason);
    });

    console.log(error);
    console.log(paymentMethod);

    if (error) {
        console.log(error);
        console.log(paymentMethod);
        document.querySelector('#card-errors').textContent = error.message;
    } else {
        console.log(paymentMethod);
        document.querySelector('#card-errors').textContent = '';
    }

    const postPaymentId = function(paymentId) {
        $.ajax({
            type: "POST",
            url: '/order',
            data: { id: paymentId },
            success: function (response) {
                console.log(response)
            },
            error: function (response) {
                alert('Error' + response);
            }
        });
    }
});
