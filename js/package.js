// Display current date
function displayCurrentDate() {
    var currentDateElement = document.getElementById('currentDate');
    
    var currentDate = new Date();
    
    var date = currentDate.getDate();
    var month = currentDate.getMonth() + 1; // Months are zero-based
    var year = currentDate.getFullYear();
    
    var currentDateLine = date + "/" + month + "/" + year;
    
    currentDateElement.textContent = currentDateLine;
}

window.onload = displayCurrentDate;


function displayPackageAmount() {
    var outputElement = document.getElementById('total');
    var selectedOption = document.querySelector('input[id="package"]:checked').value;
    
    if (selectedOption === 'Starter') {
        outputElement.textContent = '$50';
    } else if (selectedOption === 'Bronze') {
        outputElement.textContent = '$100';
    } else if (selectedOption === 'Silver') {
        outputElement.textContent = '$250';
    }else if (selectedOption === 'Gold') {
        outputElement.textContent = '$350';
    }else if (selectedOption === 'Exclusive') {
        outputElement.textContent = '$500';
    }

}

window.onload = displayPackageAmount;

