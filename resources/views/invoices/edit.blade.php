@extends('layouts.dashboard')

@section('title', 'Edit Invoice')

@section('content')
<div class="container">
    <div class="header">
        <h1>Edit Invoice</h1>
        <a href="{{ route('invoices.index') }}" class="btn-secondary">
            Back to List
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('invoices.update', $invoice) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select id="customer_id" name="customer_id" class="input-field" required>
                        <option value="">Select a customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id', $invoice->customer_id) == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $invoice->title) }}" class="input-field" required>
                    @error('title')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="3" class="input-field" required>{{ old('description', $invoice->description) }}</textarea>
                    @error('description')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="amount">Amount (LKR)</label>
                    <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount', $invoice->amount) }}" class="input-field" required>
                    @error('amount')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="input-field" required>
                        <option value="draft" {{ old('status', $invoice->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="sent" {{ old('status', $invoice->status) == 'sent' ? 'selected' : '' }}>Sent</option>
                        <option value="paid" {{ old('status', $invoice->status) == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="overdue" {{ old('status', $invoice->status) == 'overdue' ? 'selected' : '' }}>Overdue</option>
                        <option value="cancelled" {{ old('status', $invoice->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    @error('status')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $invoice->due_date->format('Y-m-d')) }}" class="input-field" required>
                    @error('due_date')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea name="notes" id="notes" rows="3" class="input-field">{{ old('notes', $invoice->notes) }}</textarea>
                    @error('notes')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Update Invoice</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
