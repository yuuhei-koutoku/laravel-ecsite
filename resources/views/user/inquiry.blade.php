<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お問い合わせ
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="-m-2">
                        <x-flash-message status="session('status')" />
                        <div class="p-2 w-3/4 mx-auto">
                            @if ($inquiries->isEmpty())
                                <div class="text-center mb-4">
                                    運営へ問い合わせをすることができます。<br>
                                    下記の入力フォームからメッセージを送信してください。
                                </div>
                            @else
                                @foreach($inquiries as $inquiry)
                                    @if ($inquiry->admin === 0)
                                        @if ($inquiry->deleted_at === null)
                                            <div class="text-white bg-indigo-500 rounded-lg text-sm break-words px-2 py-1 mb-1 ml-5 sm:ml-20 lg:ml-40 whitespace-pre-line">{{ $inquiry->message }}</div>
                                            <div class="flex flex-col items-end sm:flex-row justify-end mb-4">
                                                <form method="post" action="{{ route('user.inquiry.softDestroy', ['id' => $inquiry->id]) }}" id="delete_{{ $inquiry->id }}">
                                                    @csrf
                                                    @method('POST')
                                                    <a href="#" data-id="{{ $inquiry->id }}" onclick="deletePost(this)" class="text-white bg-pink-500 text-xs rounded-lg px-2 py-1 hover:bg-pink-600">送信取消</a>
                                                </form>
                                                <p class="text-gray-700 text-xs px-2 py-1">送信日時：{{ \Carbon\Carbon::parse($inquiry->created_at)->format('Y年n月j日 G時i分') }}</p>
                                            </div>
                                        @else
                                            <div class="bg-gray-100 rounded-lg break-words px-2 py-1 mb-4 text-xs text-center ml-5 sm:ml-20 lg:ml-40">
                                                メッセージの送信を取り消しました
                                            </div>
                                        @endif
                                    @else
                                        @if ($inquiry->deleted_at === null)
                                            <div class="bg-gray-100 rounded-lg text-sm break-words px-2 py-1 mb-1 mr-5 sm:mr-20 lg:mr-40 whitespace-pre-line">{{ $inquiry->message }}</div>
                                            <div class="flex flex-row-reverse">
                                                <p class="text-gray-700 text-xs px-2 py-1 mr-5 sm:mr-20 lg:mr-40 mb-4">送信日時：{{ \Carbon\Carbon::parse($inquiry->created_at)->format('Y年n月j日 G時i分') }}</p>
                                            </div>
                                        @else
                                            <div class="bg-gray-100 rounded-lg break-words px-2 py-1 mb-4 text-xs text-center mr-5 sm:mr-20 lg:mr-40">
                                                メッセージの送信が取り消しされました
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <form method="post" action="{{ route('user.inquiry.store') }}">
                        @csrf
                        <div class="-m-2">
                            <div class="p-2 w-3/4 mx-auto">
                                <div class="relative">
                                    <textarea name="message" rows="3" placeholder="運営への問い合わせ内容をを入力   例:「配達が完了しました」となっているが、商品が届いていない" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm md:text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                    <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">送信</button>
                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deletePost(e){
            'use strict'
            if(confirm('メッセージの送信を取り消しますか？')){
                document.getElementById('delete_' + e.dataset.id).submit()
            }
        }
    </script>
</x-app-layout>
