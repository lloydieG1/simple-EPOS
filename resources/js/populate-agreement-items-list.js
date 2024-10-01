document.getElementById('add-item').addEventListener('click', function() {
    const itemName = document.getElementById('item_name').value;
    const itemDescription = document.getElementById('item_description').value;
    const itemQuantity = document.getElementById('item_quantity').value;
    const itemCostPrice = document.getElementById('item_cost_price').value;
    const itemRetailPrice = document.getElementById('item_retail_price').value;

    const itemsListBody = document.getElementById('items-list-body');
    const newRow = document.createElement('tr');

    // create the new row
    newRow.innerHTML = `
        <td class="px-6 py-4 whitespace-nowrap">${itemName}</td>
        <td class="px-6 py-4 whitespace-nowrap">${itemDescription}</td>
        <td class="px-6 py-4 whitespace-nowrap">${itemQuantity}</td>
        <td class="px-6 py-4 whitespace-nowrap">${itemCostPrice}</td>
        <td class="px-6 py-4 whitespace-nowrap">${itemRetailPrice}</td>
    `;

    itemsListBody.appendChild(newRow);

    // append hidden input fields to the form
    const form = document.getElementById('create-agreement-form');

    const hiddenItemName = document.createElement('input');
    hiddenItemName.type = 'hidden';
    hiddenItemName.name = 'item_name[]';
    hiddenItemName.value = itemName;
    form.appendChild(hiddenItemName);

    const hiddenItemDescription = document.createElement('input');
    hiddenItemDescription.type = 'hidden';
    hiddenItemDescription.name = 'item_description[]';
    hiddenItemDescription.value = itemDescription;
    form.appendChild(hiddenItemDescription);

    const hiddenItemQuantity = document.createElement('input');
    hiddenItemQuantity.type = 'hidden';
    hiddenItemQuantity.name = 'item_quantity[]';
    hiddenItemQuantity.value = itemQuantity;
    form.appendChild(hiddenItemQuantity);

    const hiddenItemCostPrice = document.createElement('input');
    hiddenItemCostPrice.type = 'hidden';
    hiddenItemCostPrice.name = 'item_cost_price[]';
    hiddenItemCostPrice.value = itemCostPrice;
    form.appendChild(hiddenItemCostPrice);

    const hiddenItemRetailPrice = document.createElement('input');
    hiddenItemRetailPrice.type = 'hidden';
    hiddenItemRetailPrice.name = 'item_retail_price[]';
    hiddenItemRetailPrice.value = itemRetailPrice;
    form.appendChild(hiddenItemRetailPrice);

    //clear the input fields
    document.getElementById('item_name').value = '';
    document.getElementById('item_description').value = '';
    document.getElementById('item_quantity').value = '';
    document.getElementById('item_cost_price').value = '';
    document.getElementById('item_retail_price').value = '';

});