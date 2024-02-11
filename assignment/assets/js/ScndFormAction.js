// similar logic for form action as the first one this one however for the form action for the delete for of each product
 function setFormActionForDeleteForm() {
    var deleteForm = document.forms['form2'];
    var selectedCheckboxes = document.querySelectorAll('.check-delete:checked');
    
    if (selectedCheckboxes.length > 0) {
        
        var dataController = selectedCheckboxes[0].closest('.product-type').getAttribute('data-controller');

        deleteForm.action = dataController;
    }
    
    return true; 
};