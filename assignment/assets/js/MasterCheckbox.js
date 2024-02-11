document.addEventListener("DOMContentLoaded", function () {
    const deleteCheckbox = document.getElementById("deleteCheckbox");
    const checkboxItems = document.querySelectorAll(".delete-checkbox");

    // logic for when the select all checkbox is pressed all checkboxes get pressed as well
    deleteCheckbox.addEventListener("click", function () {
        checkboxItems.forEach(function (checkbox) {
            checkbox.checked = deleteCheckbox.checked;
        });
    });

    checkboxItems.forEach(function (checkbox) {
        checkbox.addEventListener("click", function () {
            deleteCheckbox.checked = [...checkboxItems].every(item => item.checked);
        });
    });
});