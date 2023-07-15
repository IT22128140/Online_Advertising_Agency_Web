/*Dewpura D.A.M.M.*/
//To change the payment method picture
var radioButtons = document.querySelectorAll('input[name="method"]');
var image = document.getElementById('paymeth');
        
radioButtons.forEach(function(radioButton) {
    radioButton.addEventListener('change', function() {

    if (this.checked) {
        image.src = this.value;
                }
        });
});
//To show the current date
  var currentDate = new Date();

  var day = currentDate.getDate();
  var month = currentDate.getMonth() + 1;
  var year = currentDate.getFullYear();


  var formattedDate = (month < 10 ? '0' + month : month) + '/' + (day < 10 ? '0' + day : day) + '/' + year;

  document.getElementById('paymentDate').textContent = formattedDate;

    // Get the seasonal offer and membership offer select elements
var seasonalOfferSelect = document.getElementById('soffer');
var membershipOfferSelect = document.getElementById('moffer');

// Add event listeners to the select elements
seasonalOfferSelect.addEventListener('change', handleOfferSelection);
membershipOfferSelect.addEventListener('change', handleOfferSelection);

// Function to handle offer selection
function handleOfferSelection() {
    // Check if both select elements have a value selected
    var isSeasonalOfferSelected = seasonalOfferSelect.value !== '0';
    var isMembershipOfferSelected = membershipOfferSelect.value !== '0';

    // If both offers are selected, deselect one of them
    if (isSeasonalOfferSelected && isMembershipOfferSelected) {
        if (this === seasonalOfferSelect) {
            membershipOfferSelect.value = '0';
        } else {
            seasonalOfferSelect.value = '0';
        }
    }
}

// Get the seasonal offer and membership offer select elements
var seasonalOfferSelect = document.getElementById('soffer');
var membershipOfferSelect = document.getElementById('moffer');

// Add event listeners to the select elements
seasonalOfferSelect.addEventListener('change', updateTotalAmount);
membershipOfferSelect.addEventListener('change', updateTotalAmount);

// Function to update the total amount
function updateTotalAmount() {
    var amountElement = document.getElementById('amount');
    var seasonalOfferElement = document.getElementById('soffer');
    var membershipOfferElement = document.getElementById('moffer');
    var totalAmountElement = document.getElementById('totalAmount');

    var baseAmount = parseFloat(amountElement.textContent.replace('$', ''));
    var seasonalOffer = parseFloat(seasonalOfferElement.value);
    var membershipOffer = parseFloat(membershipOfferElement.value);

    if (seasonalOffer === 0 && membershipOffer === 0) {
        totalAmountElement.textContent = baseAmount.toFixed(2) + '$';
    } else {
        var discountAmount = baseAmount * (seasonalOffer / 100 + membershipOffer / 100);
        var totalAmount = baseAmount - discountAmount;
        totalAmountElement.textContent = totalAmount.toFixed(2) + '$';
    }
}
