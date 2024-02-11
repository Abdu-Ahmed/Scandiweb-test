function actionOnSubmit() {
// dynamically changing the form action attr to the selected product type class/file using the data-controller attribute
    var selectElement = document.getElementById('productType');


    var formAction = selectElement.options[selectElement.selectedIndex].getAttribute('data-controller');


    document.form1.action = formAction;
    return true; 
}