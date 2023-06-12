<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お問い合わせ管理
        </h2>
    </x-slot>

    <div class="py-11">
        @foreach ($inquiries as $inquiry)
            <div class="py-1">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="md:p-6 text-gray-900">
                            <section class="text-gray-600 body-font">
                                <div class="container md:px-5 mx-auto">
                                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                        <div class="flex-grow">
                                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">ユーザーID：{{ $inquiry->user_id }}</h2>
                                            <p class="leading-relaxed text-base">
                                                @if ($inquiry->deleted_at === null)
                                                    {{ Str::limit($inquiry->message, 90) }}
                                                @else
                                                    @if ($inquiry->admin === 0)
                                                        メッセージの送信が取り消しされました
                                                    @else
                                                    メッセージの送信を取り消しました
                                                    @endif
                                                @endif
                                            </p>
                                            <a class="mt-3 text-blue-500 inline-flex items-center" href="{{ route('admin.inquiries.show', ['user_id' => $inquiry->user_id]) }}">
                                                詳細
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
