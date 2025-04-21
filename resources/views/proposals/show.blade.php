@extends('layouts.dashboard')

@section('title', 'Proposal Details')

@section('content')
<div class="container">
    <div class="header">
        <h1 class="title">Proposal Details</h1>
        <div class="actions">
            <a href="{{ route('proposals.edit', $proposal) }}" class="btn btn-primary">
                Edit
            </a>
            <form action="{{ route('proposals.destroy', $proposal) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this proposal?')">
                    Delete
                </button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="section">
                <h3 class="section-title">Basic Information</h3>
                <dl class="info-list">
                    <div class="info-item">
                        <dt>Title</dt>
                        <dd>{{ $proposal->title }}</dd>
                    </div>
                    <div class="info-item">
                        <dt>Customer</dt>
                        <dd>{{ $proposal->customer->name }}</dd>
                    </div>
                    <div class="info-item">
                        <dt>Amount</dt>
                        <dd>LKR {{ number_format($proposal->amount, 2) }}</dd>
                    </div>
                    <div class="info-item">
                        <dt>Status</dt>
                        <dd>
                            <span class="status-badge {{ $proposal->status_class }}">
                                {{ ucfirst($proposal->status) }}
                            </span>
                        </dd>
                    </div>
                    <div class="info-item">
                        <dt>Valid Until</dt>
                        <dd>{{ $proposal->valid_until->format('Y-m-d') }}</dd>
                    </div>
                </dl>
            </div>

            <div class="section">
                <h3 class="section-title">Description</h3>
                <p>{{ $proposal->description }}</p>
            </div>

            @if($proposal->notes)
            <div class="section">
                <h3 class="section-title">Notes</h3>
                <p>{{ $proposal->notes }}</p>
            </div>
            @endif

            <div class="section">
                <h3 class="section-title">Timestamps</h3>
                <dl class="info-list">
                    <div class="info-item">
                        <dt>Created At</dt>
                        <dd>{{ $proposal->created_at->format('Y-m-d H:i:s') }}</dd>
                    </div>
                    <div class="info-item">
                        <dt>Last Updated</dt>
                        <dd>{{ $proposal->updated_at->format('Y-m-d H:i:s') }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <div class="back-link">
        <a href="{{ route('proposals.index') }}" class="btn btn-secondary">
            Back to List
        </a>
    </div>
</div>
@endsection
