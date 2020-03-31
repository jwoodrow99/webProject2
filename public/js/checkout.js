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

const payInStore = document.querySelector('#payInStore');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function postPaymentId(paymentId) {
    $.ajax({
        method: "POST",
        url: "/order",
        data: {
            'name': cardHolderName.value,
            'phone': cardHolderPhone.value,
            'address': cardHolderAddress.value,
            'city': cardHolderCity.value,
            'postal': cardHolderPostal.value,
            'province': cardHolderProvince.value,
            'pickupDate': cardHolderPickupDate.value,
            'paymentId': paymentId,
        }
    })
    .done(function (data, response) {
        console.log(paymentId);
        console.log(data);
        console.log(response.order);
        window.location.replace(`confirmed/${data.order.id}`);
    })
    .fail(function (response, jqXHR, textStatus, errorThrown) {
        alert('Error ' + response.message + ' ' + jqXHR + ' ' + errorThrown + ' ' + textStatus);
        console.log('Error '+ response.message + ' ' + jqXHR + ' ' + errorThrown + ' ' + textStatus);
    });
}

cardButton.addEventListener('click', async (e) => {
    e.preventDefault();
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
    ).then((result) => {
        console.log(result);
        const paymentId = result.paymentMethod.id;
        postPaymentId(paymentId)
    }, (reason) => {
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
});

payInStore.addEventListener('click', async (e) => {
    e.preventDefault();

    $.ajax({
        method: "POST",
        url: "/order",
        data: {
            'name': cardHolderName.value,
            'pickupDate': cardHolderPickupDate.value,
        }
    })
    .done(function (data, response) {
        console.log(data);
        console.log(response.order);
        window.location.replace(`confirmed/${data.order.id}`);
    })
    .fail(function (response, jqXHR, textStatus, errorThrown) {
        alert('Error ' + response.message + ' ' + jqXHR + ' ' + errorThrown + ' ' + textStatus);
        console.log('Error ' + response.message + ' ' + jqXHR + ' ' + errorThrown + ' ' + textStatus);
    });
});
