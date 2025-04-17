@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 sm:p-6">
                <h3 class="text-lg font-medium text-gray-900">Welcome to your dashboard!</h3>
                <p class="mt-1 text-sm text-gray-600">
                    You're logged in as {{ auth()->user()->name }}
                </p>
            </div>
        </div>

        <!-- Dashboard Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            <!-- Total Customers Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-2 sm:p-3">
                            <svg class="h-5 sm:h-6 w-5 sm:w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="ml-4 sm:ml-5">
                            <h3 class="text-base sm:text-lg font-medium text-gray-900">Total Customers</h3>
                            <p class="text-2xl sm:text-3xl font-semibold text-gray-900">{{ $totalCustomers }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Proposals Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-indigo-500 rounded-md p-2 sm:p-3">
                            <svg class="h-5 sm:h-6 w-5 sm:w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="ml-4 sm:ml-5">
                            <h3 class="text-base sm:text-lg font-medium text-gray-900">Total Proposals</h3>
                            <p class="text-2xl sm:text-3xl font-semibold text-gray-900">{{ $totalProposals }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Invoices Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-2 sm:p-3">
                            <svg class="h-5 sm:h-6 w-5 sm:w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="ml-4 sm:ml-5">
                            <h3 class="text-base sm:text-lg font-medium text-gray-900">Total Invoices</h3>
                            <p class="text-2xl sm:text-3xl font-semibold text-gray-900">{{ $totalInvoices }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
