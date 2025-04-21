@extends('layouts.app')

@section('content')
<div class="container">
    <div class="centered-box">
        <div class="card">
            <h1 class="heading">Make Payment</h1>
            
            <div class="section">
                <h2 class="subheading">Invoice Details</h2>
                <div class="grid-2">
                    <div>
                        <p class="label">Invoice Number:</p>
                        <p class="value">{{ $invoice->invoice_number }}</p>
                    </div>
                    <div>
                        <p class="label">Title:</p>
                        <p class="value">{{ $invoice->title }}</p>
                    </div>
                    <div>
                        <p class="label">Amount:</p>
                        <p class="value">LKR {{ number_format($invoice->amount, 2) }}</p>
                    </div>
                    <div>
                        <p class="label">Due Date:</p>
                        <p class="value">{{ $invoice->due_date->format('Y-m-d') }}</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2 class="subheading">Description</h2>
                <p class="text">{{ $invoice->description }}</p>
            </div>

            <div class="button-container">
                <button type="button" class="btn-primary">
                    Proceed to Payment
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
