<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            パスワード更新
        </h2>
    </header>

    <form method="post" action="{{ route('user.password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('現在のパスワード')" />
            <x-text-input id="current_password" name="current_password" type="password" placeholder="••••••••" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('新しいパスワード')" />
            <x-text-input id="password" name="password" type="password" placeholder="••••••••" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('新しいパスワード(確認用)')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button :user="$user">{{ __('更新') }}</x-primary-button>
            @if ($user->id == 1)
                <p class="text-sm text-gray-500">ゲストユーザーはパスワードを更新できません。</p>
            @endif

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('パスワードを更新しました。') }}</p>
            @endif
        </div>
    </form>
</section>
