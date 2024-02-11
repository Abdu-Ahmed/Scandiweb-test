document.addEventListener('DOMContentLoaded', () => {
    // validating each individual input field to make sure the correct data type gets inserted
    const submitButton = document.querySelector('#submit');
    submitButton.disabled = true;

    const form = document.querySelector('#product_form');


    const inputFields = form.querySelectorAll('input');
    inputFields.forEach(input => input.addEventListener('input', enableSubmitButton));

    const productTypeInput = document.querySelector('#productType');

    const productTypeInputs = {
        'dvd': 'size',
        'book': 'weight',
        'furniture': ['height', 'width', 'length']
    };

    function enableSubmitButton() {
        const isNumeric = (input) => !isNaN(parseFloat(input)) && isFinite(input);

        const skuValue = document.querySelector('#sku').value.trim();
        const nameValue = document.querySelector('#name').value.trim();
        const priceValue = document.querySelector('#price').value.trim();
        const productTypeValue = productTypeInput.value;
        const relevantInputIds = productTypeInputs[productTypeValue] || [];
        const isProductTypeSelected = productTypeValue !== 'Please Select Product.';

        const isInputFilled = skuValue && nameValue && isNumeric(priceValue) &&
            (Array.isArray(relevantInputIds)
                ? relevantInputIds.every(id => {
                    const input = document.querySelector(`#${id}`);
                    return input && isNumeric(input.value.trim());
                })
                : isNumeric(document.querySelector(`#${relevantInputIds}`).value.trim()));

        submitButton.disabled = !(isInputFilled && isProductTypeSelected);
    }
});