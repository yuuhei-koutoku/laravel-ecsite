<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('user.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus autocomplete="username" placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            autocomplete="current-password"
                            placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-3">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('ログイン情報を保持する') }}</span>
            </label>
        </div>

        <div class="flex justify-center">
            <x-primary-button class="mt-3 w-48">
                {{ __('ログイン') }}
            </x-primary-button>
        </div>
    </form>

    <form method="POST" action="{{ route('user.guestLogin') }}" class="flex items-center justify-center">
        @csrf
        <x-primary-button class="bg-emerald-500 hover:bg-emerald-600 my-3 w-48">
            {{ __('ゲストログイン') }}
        </x-primary-button>
    </form>
    <a class="flex items-center justify-center underline text-sm text-gray-600 hover:text-gray-900 rounded-md" href="{{ route('user.register') }}">
        {{ __('アカウント登録はこちら') }}
    </a>
</x-guest-layout>
