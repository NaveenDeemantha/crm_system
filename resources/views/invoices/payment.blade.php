@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6">Make Payment</h1>
            
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Invoice Details</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600">Invoice Number:</p>
                        <p class="font-medium">{{ $invoice->invoice_number }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Title:</p>
                        <p class="font-medium">{{ $invoice->title }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Amount:</p>
                        <p class="font-medium">LKR {{ number_format($invoice->amount, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Due Date:</p>
                        <p class="font-medium">{{ $invoice->due_date->format('Y-m-d') }}</p>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Description</h2>
                <p class="text-gray-700">{{ $invoice->description }}</p>
            </div>

            <div class="mt-8">
                <button type="button" class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Proceed to Payment
                </button>
            </div>
        </div>
    </div>
</div>
@endsection 