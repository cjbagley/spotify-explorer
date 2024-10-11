<x-app-layout>
    <x-slot name="header">{{ __('app.spotify_auth_required.heading') }}</x-slot>

    <x-card>
        <form action="{{ route('auth-required-continue') }}" method="post" class="flex flex-col gap-6">
            @csrf
            <p>{{ __('app.spotify_auth_required.text') }}</p>
            <x-primary-button class="btn-block">{{ __('app.spotify_auth_required.button') }}</x-primary-button>
        </form>
    </x-card>
</x-app-layout>
