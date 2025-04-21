@extends('layouts.dashboard')

@section('content')
<div class="page-container">
    <h1 class="title">Add New Customer</h1>

    <div class="card">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf

            <div class="form-section">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input" required>
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-section">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input" required>
                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-section">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-input" required>
                @error('phone')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-section">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" id="address" rows="3" class="form-input">{{ old('address') }}</textarea>
                @error('address')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-section">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-input">
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="button-group">
                <a href="{{ route('customers.index') }}" class="button-secondary">Cancel</a>
                <button type="submit" class="button-primary">Create Customer</button>
            </div>
        </form>
    </div>
</div>
@endsection
