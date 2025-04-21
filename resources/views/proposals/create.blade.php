@extends('layouts.dashboard')

@section('title', 'Create Proposal')

@section('content')
<div class="container">
    <div class="header">
        <h1>Create New Proposal</h1>
        <a href="{{ route('proposals.index') }}" class="btn btn-secondary">
            Back to List
        </a>
    </div>

    <div class="form-container">
        <form method="POST" action="{{ route('proposals.store') }}">
            @csrf

            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select id="customer_id" name="customer_id" class="form-input" required>
                    <option value="">Select a customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-input" required>
                @error('title')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" class="form-input" required>{{ old('description') }}</textarea>
                @error('description')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount') }}" class="form-input" required>
                @error('amount')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-input" required>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="sent" {{ old('status') == 'sent' ? 'selected' : '' }}>Sent</option>
                    <option value="accepted" {{ old('status') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                @error('status')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label for="valid_until">Valid Until</label>
                <input type="date" name="valid_until" id="valid_until" value="{{ old('valid_until') }}" class="form-input" required>
                @error('valid_until')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea name="notes" id="notes" rows="3" class="form-input">{{ old('notes') }}</textarea>
                @error('notes')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('proposals.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Proposal</button>
            </div>
        </form>
    </div>
</div>
@endsection
