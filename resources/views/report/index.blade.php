@extends('layouts.master')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-6 text-center">Staff Performance Report</h1>
                    
                    <form method="GET" action="{{ route('report.index') }}" class="mb-6">
                        <div class="flex flex-row space-x-4">
                            <div class="">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="date" id="start_date" name="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div class="">
                                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                                <input type="date" id="end_date" name="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div class="">
                                <label for="order_by" class="block text-sm font-medium text-gray-700">Order By</label>
                                <select id="order_by" name="order_by" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="agreements_count" {{ request('order_by') == 'agreements_count' ? 'selected' : '' }}>Total Agreements</option>
                                    <option value="items_purchased_count" {{ request('order_by') == 'items_purchased_count' ? 'selected' : '' }}>Total Items Purchased</option>
                                    <option value="total_cost_price" {{ request('order_by') == 'total_cost_price' ? 'selected' : '' }}>Total Value</option>
                                    <option value="average_cost_price" {{ request('order_by') == 'average_cost_price' ? 'selected' : '' }}>Average Value</option>
                                    <option value="max_cost_price" {{ request('order_by') == 'max_cost_price' ? 'selected' : '' }}>Maximum Value</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="mt-6 px-4 py-2 bg-blue-500 text-white rounded-md">Filter</button>
                            </div>
                        </div>
                    </form>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Staff Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Agreements</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Items Purchased</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Value</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Average Value</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Maximum Value</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($staffs as $staff)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $staff->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $staff->agreements_count }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $staff->items_purchased_count }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $staff->total_cost_price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $staff->average_cost_price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $staff->max_cost_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection