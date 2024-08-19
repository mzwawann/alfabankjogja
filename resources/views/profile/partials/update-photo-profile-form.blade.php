<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Photo profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your photo profile.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
    </form>
</section>