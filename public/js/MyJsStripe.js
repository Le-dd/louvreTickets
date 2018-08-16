// Create a Stripe client.
var stripe = Stripe('pk_test_yIPUyjFH83amYU9zj43S2oma');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#f7f7f7',
    fontSmoothing: 'antialiased',
    iconColor: '#f7f7f7',
    fontWeight: 200,
    fontFamily: "Montserrat, sans-serif",
    fontSize: "14px",
    '::placeholder': {
      color: '#f7f7f7'
    }
  },
  invalid: {
    color: '#fd6b35',
    iconColor: '#fd6b35'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {iconStyle: "solid",'style' : style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {

  var form = document.getElementById('payment-form');
  var hiddenInput = document.querySelector( ".my-token-stripe" );
  hiddenInput.setAttribute('value', token.id);

  form.submit();
}
