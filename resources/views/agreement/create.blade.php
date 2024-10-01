@extends('layouts.master')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-6 text-center">Create Agreement</h1>

                    <form id="create-agreement-form" action="{{ route('agreement.store') }}" method="POST" class="space-y-6">
                        @csrf
                    
                        <div class="flex space-x-6">
                            <!-- customer deets -->
                            <div id="details" class="w-1/2 space-y-4">
                                <h2 class="text-xl font-semibold mb-4">Customer Details</h2>
                                <div>
                                    <label for="customer_forename" class="block text-sm font-medium text-gray-700">Customer Forename</label>
                                    <input type="text" name="customer_forename" id="customer_forename" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" required>
                                </div>
                    
                                <div>
                                    <label for="customer_surname" class="block text-sm font-medium text-gray-700">Customer Surname</label>
                                    <input type="text" name="customer_surname" id="customer_surname" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" required>
                                </div>
                    
                                <div>
                                    <label for="customer_date_of_birth" class="block text-sm font-medium text-gray-700">Customer Date of Birth</label>
                                    <input type="date" name="customer_date_of_birth" id="customer_date_of_birth" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" required>
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
                    
                        <div class="flex justify-end mt-6">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Create Agreement</button>
                        </div>
                    </form>

                    <div id="items-list" class="mt-6">
                        <h2 class="text-xl font-semibold mb-4">Items List</h2>
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
                                <!-- items appended here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/populate-agreement-items-list.js')
@endsection