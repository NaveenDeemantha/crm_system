@extends('layouts.app')

@section('content')
<div class="profile-wrapper">
    <div class="profile-container">
        
        <div class="profile-card">
            <div class="profile-content">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-content">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-content">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</div>
@endsection
