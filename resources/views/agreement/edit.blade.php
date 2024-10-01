@extends('layouts.master')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-6 text-center">Edit Agreement</h1>

                    <form id="edit-agreement-form" action="{{ route('agreement.update', $agreement->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                    
                        <div class="flex space-x-6">
                            <!-- customer deets -->
                            <div id="details" class="w-1/2 space-y-4">
                                <h2 class="text-xl font-semibold mb-4">Customer Details</h2>
                                <div>
                                    <label for="customer_forename" class="block text-sm font-medium text-gray-700">Customer Forename</label>
                                    <input type="text" name="customer_forename" id="customer_forename" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" value="{{ $agreement->customer_forename }}" required>
                                </div>
                    
                                <div>
                                    <label for="customer_surname" class="block text-sm font-medium text-gray-700">Customer Surname</label>
                                    <input type="text" name="customer_surname" id="customer_surname" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" value="{{ $agreement->customer_surname }}" required>
                                </div>
                    
                                <div>
                                    <label for="customer_date_of_birth" class="block text-sm font-medium text-gray-700">Customer Date of Birth</label>
                                    <input type="date" name="customer_date_of_birth" id="customer_date_of_birth" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" value="{{ $agreement->customer_date_of_birth }}" required>
                                </div>
                            </div>
                    
                            <!-- agreement items inputs -->
                            <div id="agreement-items" class="w-1/2">
                                <h2 class="text-xl font-semibold mb-4">Agreement Items</h2>
                                <div class="space-y-4">
                                    <div>
                                        <label for="item_name" class="block text-sm font-medium text-gray-700">Item Name</label>
                                        <input type="text" id="item_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                                    </div>
                                    <div>
                                        <label for="item_description" class="block text-sm font-medium text-gray-700">Item Description</label>
                                        <input type="text" id="item_description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                                    </div>
                                    <div>
                                        <label for="item_quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                        <input type="number" id="item_quantity" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                                    </div>
                                    <div>
                                        <label for="item_cost_price" class="block text-sm font-medium text-gray-700">Cost Price</label>
                                        <input type="number" id="item_cost_price" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                                    </div>
                                    <div>
                                        <label for="item_retail_price" class="block text-sm font-medium text-gray-700">Retail Price</label>
                                        <input type="number" id="item_retail_price" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                                    </div>
                                </div>
                                <button type="button" id="add-item" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring focus:border-green-300">Add Item</button>
                            </div>
                        </div>
                    
                        <div class="flex justify-end">
                            <button type="submit" class="mt-6 px-4 py-2 bg-green-500 text-white rounded-md">Update Agreement</button>
                        </div>
                    </form>

                    <div id="items-list">
                        <h3 class="text-xl font-semibold">Items Included</h3>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cost Price</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Retail Price</th>
                                </tr>
                            </thead>
                            <tbody id="items-list-body" class="bg-white divide-y divide-gray-200">
                                @foreach ($agreement->AgreementItems as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->cost_price }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->retail_price }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button type="button" class="text-red-600 hover:text-red-900" onclick="removeItem(this, {{ $item->id }})">Remove</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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
    </script>
@endsection