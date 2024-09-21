<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            アカウント削除
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('アカウントを削除すると、関連するデータは完全に消去され、復元できません。') }}
        </p>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('また、削除操作は取り消すことができません。') }}
        </p>
    </header>

    <div class="flex items-center space-x-4">
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            :user="$user"
        >{{ __('アカウントを削除') }}</x-danger-button>
        @if ($user->id == 1)
            <p class="text-sm text-gray-500">ゲストユーザーはアカウントを削除できません。</p>
        @endif
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('user.profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('本当にアカウントを削除してもよろしいですか？') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('アカウントを削除すると、関連するデータは完全に消去され、復元できません。') }}
            </p>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('また、削除操作は取り消すことができません。') }}
            </p>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('アカウントを削除するには、パスワードをテキスト入力欄に入力してください。') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('••••••••') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('キャンセル') }}
                </x-secondary-button>

                <x-danger-button :user="$user" class="ml-3">
                    {{ __('アカウントを削除') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
