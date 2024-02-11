document.addEventListener('DOMContentLoaded', function() {
  // getting the select element from its id and label elements 
    var selectElement = document.getElementById('productType');
    var labels = document.querySelectorAll('label');
  // adding event listener to select element 'change' as in selection options and using their data-fields attr
    selectElement.addEventListener('change', function() {
      var selectedFields = this.options[this.selectedIndex].getAttribute('data-fields');
  // creating array map from label elements to dynamically change input fields without using if-else or any other conditional statement
      Array.from(labels).map(function(label) {
        label.style.display = 'none';
      });
  
      var associatedLabel = document.getElementById(selectedFields);
      if (associatedLabel) {
        associatedLabel.style.display = 'inline-block';
      }
    });
  });