@extends('layouts.dashboard')

@section('title', 'Proposals')

@section('content')
<div class="container">
    <div class="header">
        <h1 class="title">Proposals</h1>
        <a href="{{ route('proposals.create') }}" class="btn-create">
            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Create Proposal
        </a>
    </div>

    @if (session('success'))
        <div class="alert success">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    
    <div class="mobile-view">
        @foreach ($proposals as $proposal)
            <div class="proposal-card">
                <div class="proposal-header">
                    <div>
                        <h3 class="proposal-title">{{ $proposal->title }}</h3>
                        <p class="proposal-customer">{{ $proposal->customer->name }}</p>
                        <p class="proposal-amount">LKR {{ number_format($proposal->amount, 2) }}</p>
                        <p class="proposal-validity">Valid until: {{ $proposal->valid_until->format('Y-m-d') }}</p>
                    </div>
                    <span class="status {{ $proposal->status }}">
                        {{ ucfirst($proposal->status) }}
                    </span>
                </div>
                <div class="proposal-actions">
                    <a href="{{ route('proposals.show', $proposal) }}" class="action-link view">
                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </a>
                    <a href="{{ route('proposals.edit', $proposal) }}" class="action-link edit">
                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </a>
                    <form action="{{ route('proposals.destroy', $proposal) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-link delete" onclick="return confirm('Are you sure you want to delete this proposal?')">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    
    <div class="desktop-view">
        <div class="table-container">
            <table class="proposal-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Valid Until</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proposals as $proposal)
                        <tr>
                            <td>{{ $proposal->title }}</td>
                            <td>{{ $proposal->customer->name }}</td>
                            <td>LKR {{ number_format($proposal->amount, 2) }}</td>
                            <td>
                                <span class="status {{ $proposal->status }}">
                                    {{ ucfirst($proposal->status) }}
                                </span>
                            </td>
                            <td>{{ $proposal->valid_until->format('Y-m-d') }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('proposals.show', $proposal) }}" class="action-link view">
                                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('proposals.edit', $proposal) }}" class="action-link edit">
                                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('proposals.destroy', $proposal) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-link delete" onclick="return confirm('Are you sure you want to delete this proposal?')">
                                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
