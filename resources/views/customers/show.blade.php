@extends('layouts.dashboard')

@section('content')
<div class="customer-container">
    <div class="customer-wrapper">
        <div class="customer-header">
            <h1>Customer Details</h1>
            <div class="button-group">
                <a href="{{ route('customers.edit', $customer->id) }}" class="btn-edit">
                    <svg class="icon-edit" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('customers.index') }}" class="btn-back">Back to List</a>
            </div>
        </div>

        <div class="customer-card">
            <div class="customer-grid">
                <div class="customer-field">
                    <h3>Name</h3>
                    <p>{{ $customer->name }}</p>
                </div>
                <div class="customer-field">
                    <h3>Email</h3>
                    <p>{{ $customer->email }}</p>
                </div>
                <div class="customer-field">
                    <h3>Phone</h3>
                    <p>{{ $customer->phone }}</p>
                </div>
                <div class="customer-field">
                    <h3>Address</h3>
                    <p>{{ $customer->address }}</p>
                </div>
                <div class="customer-field">
                    <h3>Status</h3>
                    <p>
                        <span class="customer-status {{ $customer->status == 'active' ? 'active' : 'inactive' }}">
                            {{ ucfirst($customer->status) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
