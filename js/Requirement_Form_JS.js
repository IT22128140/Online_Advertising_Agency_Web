// JavaScript code for form submission
document.addEventListener("DOMContentLoaded", function() {
    // Get the form element
    var form = document.querySelector("form");

    // Add event listener for form submission
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Perform client-side validation
        if (validateForm()) {
            // If the form is valid, submit the form
            form.submit();
        }
    });

    // Function to validate the form
    function validateForm() {
        // Get the form fields
        var companyName = document.querySelector("input[name='cname']");
        var budget = document.querySelector("input[name='budget']");
        var currency = document.querySelector("input[name='currency']");
        var audience = document.querySelector("input[name='audience']");
        var requirement = document.querySelector("textarea[name='requirement']");
        var advertisementOption = document.querySelector("input[name='askforadesignedadd']:checked");

        // Perform validation for each field
        if (companyName.value === "") {
            alert("Please enter your company name.");
            companyName.focus();
            return false;
        }

        if (budget.value === "") {
            alert("Please enter your projected monthly budget.");
            budget.focus();
            return false;
        }

        if (currency.value === "") {
            alert("Please enter your currency name.");
            currency.focus();
            return false;
        }

        if (audience.value === "") {
            alert("Please enter your main target audience.");
            audience.focus();
            return false;
        }

        if (requirement.value === "") {
            alert("Please enter your requirements.");
            requirement.focus();
            return false;
        }

        if (!advertisementOption) {
            alert("Please select whether you wish to design an advertisement or not.");
            return false;
        }

        // If all validations pass, return true
        return true;
    }

});
