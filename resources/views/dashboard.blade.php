@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900">Welcome to your dashboard!</h3>
                <p class="mt-1 text-sm text-gray-600">
                    You're logged in as {{ auth()->user()->name }}
                </p>
            </div>
        </div>

        <!-- Add your dashboard content here -->
    </div>
@endsection
