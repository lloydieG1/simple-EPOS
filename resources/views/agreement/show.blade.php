@extends('layouts.master')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Agreement Details</h2>
                    
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold">Customer Information</h3>
                        <p><strong>Forename:</strong> {{ $agreement->customer_forename }}</p>
                        <p><strong>Surname:</strong> {{ $agreement->customer_surname }}</p>
                        <p><strong>Date of Birth:</strong> {{ $agreement->customer_date_of_birth }}</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold">Agreement Information</h3>
                        <p><strong>Created By:</strong> {{ $agreement->user->name }}</p>
                        <p><strong>Created At:</strong> {{ $agreement->created_at }}</p>
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