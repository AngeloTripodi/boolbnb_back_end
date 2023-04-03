// var button = document.querySelector('#submit-button');

// braintree.dropin.create({
//   // Insert your tokenization key here
//   authorization: 'sandbox_bnyxh658_zv6jrsmf8yf2rhrc',
//   container: '#dropin-container'
// }, function (createErr, instance) {
//   button.addEventListener('click', function () {
//     instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
//       // When the user clicks on the 'Submit payment' button this code will send the
//       // encrypted payment information in a variable called a payment method nonce
//       $.ajax({
//         type: 'POST',
//         url: '/checkout',
//         data: {'paymentMethodNonce': payload.nonce}
//       }).done(function(result) {
//         // Tear down the Drop-in UI
//         instance.teardown(function (teardownErr) {
//           if (teardownErr) {
//             console.error('Could not tear down Drop-in UI!');
//           } else {
//             console.info('Drop-in UI has been torn down!');
//             // Remove the 'Submit payment' button
//             $('#submit-button').remove();
//           }
//         });

//         if (result.success) {
//           $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
//         } else {
//           console.log(result);
//           $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
//         }
//       });
//     });
//   });
// });

const form = document.getElementById('payment-form');

braintree.dropin.create({
  authorization: 'sandbox_bnyxh658_zv6jrsmf8yf2rhrc',
  container: '#dropin-container'
}, (error, dropinInstance) => {
  if (error) console.error(error);

  form.addEventListener('submit', event => {
    event.preventDefault();

    dropinInstance.requestPaymentMethod((error, payload) => {
      if (error) console.error(error);

      // Step four: when the user is ready to complete their
      //   transaction, use the dropinInstance to get a payment
      //   method nonce for the user's selected payment method, then add
      //   it a the hidden field before submitting the complete form to
      //   a server-side integration
      document.getElementById('nonce').value = payload.nonce;
      form.submit();
    });
  });
});