@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">
        
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Welcome to your dashboard!</h3>
                <p class="card-text">
                    You're logged in as {{ auth()->user()->name }}
                </p>
            </div>
        </div>

        
        <div class="dashboard-grid">
            <!-- Customers -->
            <div class="card">
                <div class="card-body">
                    <div class="card-flex">
                        <div class="icon-box bg-blue-500">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857
                                    M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857
                                    m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6
                                    3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="card-info">
                            <h3 class="card-subtitle">Total Customers</h3>
                            <p class="card-number">{{ $totalCustomers }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proposals -->
            <div class="card">
                <div class="card-body">
                    <div class="card-flex">
                        <div class="icon-box bg-indigo-500">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 
                                    01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="card-info">
                            <h3 class="card-subtitle">Total Proposals</h3>
                            <p class="card-number">{{ $totalProposals }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoices -->
            <div class="card">
                <div class="card-body">
                    <div class="card-flex">
                        <div class="icon-box bg-green-500">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 
                                    012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 
                                    0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="card-info">
                            <h3 class="card-subtitle">Total Invoices</h3>
                            <p class="card-number">{{ $totalInvoices }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection