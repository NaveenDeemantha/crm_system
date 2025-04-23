@extends('layouts.dashboard')

@section('title', 'Invoices')

@section('content')
<div class="invoice-container">
    <div class="invoice-header">
        <h1 class="invoice-title">Invoices</h1>
        <a href="{{ route('invoices.create') }}" class="btn-create">
            <svg xmlns="http://www.w3.org/2000/svg" class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create Invoice
        </a>
    </div>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    
    <div class="mobile-cards">
        @foreach ($invoices as $invoice)
            <div class="invoice-card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">{{ $invoice->title }}</h2>
                        <p class="card-sub">{{ $invoice->customer->name }}</p>
                        <p class="card-sub">Invoice #{{ $invoice->invoice_number }}</p>
                        <p class="card-sub">LKR {{ number_format($invoice->amount, 2) }}</p>
                        <p class="card-sub">Due: {{ $invoice->due_date->format('Y-m-d') }}</p>
                    </div>
                    <span class="badge {{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span>
                </div>
                <div class="card-actions">
                    <a href="{{ route('invoices.show', $invoice) }}" class="icon-btn view-icon" title="View">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z"/>
                        </svg>
                    </a>
                    <a href="{{ route('invoices.edit', $invoice) }}" class="icon-btn edit-icon" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                    </a>
                    <form action="{{ route('invoices.destroy', $invoice) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="icon-btn delete-icon" onclick="return confirm('Are you sure?')" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4h6v3m4 0H5"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    
    <div class="desktop-table">
        <table>
            <thead>
                <tr>
                    <th>Invoice #</th>
                    <th>Title</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ $invoice->title }}</td>
                        <td>{{ $invoice->customer->name }}</td>
                        <td>LKR {{ number_format($invoice->amount, 2) }}</td>
                        <td><span class="badge {{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span></td>
                        <td>{{ $invoice->due_date->format('Y-m-d') }}</td>
                        <td class="table-actions">
                            <a href="{{ route('invoices.show', $invoice) }}" class="icon-btn view-icon" title="View">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z"/>
                                </svg>
                            </a>
                            <a href="{{ route('invoices.edit', $invoice) }}" class="icon-btn edit-icon" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                            </a>
                            <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="icon-btn delete-icon" onclick="return confirm('Are you sure?')" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4h6v3m4 0H5"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
