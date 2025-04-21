@extends('layouts.dashboard')

@section('title', 'Invoice Details')

@section('content')
<div class="invoice-container">

    @if (session('success'))
        <div class="msg success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="msg error">{{ session('error') }}</div>
    @endif

    <div class="header">
        <h2>Invoice Details</h2>
        <div class="actions">
            @if($invoice->status !== 'sent' && $invoice->status !== 'paid')
                <form action="{{ route('invoices.send', $invoice) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn send">Send</button>
                </form>
            @endif
            <a href="{{ route('invoices.edit', $invoice) }}" class="btn edit">Edit</a>
            <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn delete">Delete</button>
            </form>
        </div>
    </div>

    <div class="invoice-card">
        <div class="info-grid">
            <div class="info-item"><strong>Invoice No:</strong> {{ $invoice->invoice_number }}</div>
            <div class="info-item"><strong>Title:</strong> {{ $invoice->title }}</div>
            <div class="info-item"><strong>Customer:</strong> {{ $invoice->customer->name }}</div>
            <div class="info-item"><strong>Amount:</strong> LKR {{ number_format($invoice->amount, 2) }}</div>
            <div class="info-item"><strong>Status:</strong> <span class="status {{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span></div>
            <div class="info-item"><strong>Due Date:</strong> {{ $invoice->due_date->format('Y-m-d') }}</div>
            @if($invoice->sent_at)
                <div class="info-item"><strong>Sent At:</strong> {{ $invoice->sent_at->format('Y-m-d H:i:s') }}</div>
            @endif
        </div>

        <div class="section">
            <strong>Description:</strong>
            <p>{{ $invoice->description }}</p>
        </div>

        @if($invoice->notes)
            <div class="section">
                <strong>Notes:</strong>
                <p>{{ $invoice->notes }}</p>
            </div>
        @endif
    </div>

</div>
@endsection
