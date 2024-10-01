@extends('layouts.master')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold mb-6 text-center">Agreement Details</h2>
                    <div class="flex flex-row space-x-16 leading-relaxed">
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold">Customer Information</h3>
                            <p>Forename: <a class="font-semibold text-blue-700">{{ $agreement->customer_forename }}</a></p>
                            <p>Surname: <a class="font-semibold text-blue-700">{{ $agreement->customer_surname }}</a></p>
                            <p>Date of Birth: <a class="font-semibold text-blue-700">{{ $agreement->customer_date_of_birth }}</a></p>
                        </div>
                        
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold">Agreement Information</h3>
                            <p>Created By: <a class="font-semibold text-blue-700">{{ $agreement->user->name }}</a></p>
                            <p>Created At: <a class="font-semibold text-blue-700">{{ $agreement->created_at }}</a></p>
                        </div>
                    </div>
                    <div>
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
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($agreement->AgreementItems as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->cost_price }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->retail_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection