@extends('layouts.dashboard')

@section('title', 'Create Proposal')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Create New Proposal</h1>
        <a href="{{ route('proposals.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Back to List
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <form method="POST" action="{{ route('proposals.store') }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
                        <select id="customer_id" name="customer_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('customer_id') border-red-500 @enderror" required>
                            <option value="">Select a customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('title') border-red-500 @enderror" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">LKR</span>
                            </div>
                            <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount') }}" class="block w-full pl-7 pr-12 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('amount') border-red-500 @enderror" required>
                        </div>
                        @error('amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('status') border-red-500 @enderror" required>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="sent" {{ old('status') == 'sent' ? 'selected' : '' }}>Sent</option>
                            <option value="accepted" {{ old('status') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                            <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="valid_until" class="block text-sm font-medium text-gray-700">Valid Until</label>
                        <input type="date" name="valid_until" id="valid_until" value="{{ old('valid_until') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('valid_until') border-red-500 @enderror" required>
                        @error('valid_until')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                        <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('notes') border-red-500 @enderror">{{ old('notes') }}</textarea>
                        @error('notes')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('proposals.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Create Proposal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 