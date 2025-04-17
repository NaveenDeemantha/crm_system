@extends('layouts.dashboard')

@section('title', 'Proposal Details')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Proposal Details</h1>
        <div class="flex space-x-3">
            <a href="{{ route('proposals.edit', $proposal) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Edit
            </a>
            <form action="{{ route('proposals.destroy', $proposal) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="return confirm('Are you sure you want to delete this proposal?')">
                    Delete
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">Basic Information</h3>
                    <dl class="mt-4 grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Title</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $proposal->title }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Customer</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $proposal->customer->name }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Amount</dt>
                            <dd class="mt-1 text-sm text-gray-900">LKR {{ number_format($proposal->amount, 2) }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $proposal->status === 'accepted' ? 'bg-green-100 text-green-800' : 
                                       ($proposal->status === 'rejected' ? 'bg-red-100 text-red-800' : 
                                       ($proposal->status === 'sent' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800')) }}">
                                    {{ ucfirst($proposal->status) }}
                                </span>
                            </dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Valid Until</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $proposal->valid_until->format('Y-m-d') }}</dd>
                        </div>
                    </dl>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900">Description</h3>
                    <div class="mt-4 text-sm text-gray-900">
                        {{ $proposal->description }}
                    </div>
                </div>

                @if($proposal->notes)
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Notes</h3>
                        <div class="mt-4 text-sm text-gray-900">
                            {{ $proposal->notes }}
                        </div>
                    </div>
                @endif

                <div>
                    <h3 class="text-lg font-medium text-gray-900">Timestamps</h3>
                    <dl class="mt-4 grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Created At</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $proposal->created_at->format('Y-m-d H:i:s') }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $proposal->updated_at->format('Y-m-d H:i:s') }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('proposals.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Back to List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 