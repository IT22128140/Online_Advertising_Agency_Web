function submitForm() {
    // Count the number of checked checkboxes
    var checkedBoxes = document.querySelectorAll('input[name="checked_list[]"]:checked');
    var numCheckedBoxes = checkedBoxes.length;
  
    // Check if the number of checked checkboxes is less than 3
    if (numCheckedBoxes < 3) {
      alert("Please select at least 3 places to publish your advertisement.");
      return false; // Prevent form submission
    }
  
    // Display a success message
    alert("Form submitted successfully!");
    return true; // Submit the form
  }
  