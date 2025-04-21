@extends('layouts.dashboard')

@section('title', 'Create Invoice')

@section('content')
<div class="container">
    <div class="header">
        <h1>Create New Invoice</h1>
        <a href="{{ route('invoices.index') }}" class="btn-back">Back to List</a>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('invoices.store') }}">
            @csrf

            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select id="customer_id" name="customer_id" class="@error('customer_id') error @enderror" required>
                    <option value="">Select a customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
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
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="@error('title') error @enderror" required>
                @error('title')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="3" class="@error('description') error @enderror" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="amount">Amount (LKR)</label>
                <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount') }}" class="@error('amount') error @enderror" required>
                @error('amount')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="@error('status') error @enderror" required>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="sent" {{ old('status') == 'sent' ? 'selected' : '' }}>Sent</option>
                    <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="overdue" {{ old('status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('status')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" class="@error('due_date') error @enderror" required>
                @error('due_date')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea name="notes" id="notes" rows="3" class="@error('notes') error @enderror">{{ old('notes') }}</textarea>
                @error('notes')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Create Invoice</button>
            </div>
        </form>
    </div>
</div>
@endsection
