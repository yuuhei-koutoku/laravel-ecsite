<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お問い合わせ詳細（ユーザーID：{{ $inquiries->first()->user->id }}、ユーザー名：{{ $inquiries->first()->user->name }}）
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="-m-2">
                        <div class="p-2 w-3/4 mx-auto">
                            @foreach($inquiries as $inquiry)
                                @if ($inquiry->admin === 1)
                                    @if ($inquiry->deleted_at === null)
                                        <div class="text-white bg-indigo-500 rounded-lg text-sm break-words px-2 py-1 mb-1 ml-20 lg:ml-40">
                                            {{ $inquiry->message }}
                                        </div>
                                        <div class="flex flex-row-reverse">
                                            <form method="post" action="{{ route('admin.inquiries.softDestroy', ['id' => $inquiry->id]) }}" id="delete_{{ $inquiry->id }}">
                                                @csrf
                                                @method('POST')
                                                    <a href="#" data-id="{{ $inquiry->id }}" onclick="deletePost(this)" class="text-white bg-pink-500 text-xs rounded-lg px-2 py-1 mb-8 hover:bg-pink-600">送信取消</a>
                                            </form>
                                            <p class="text-gray-700 text-xs px-2 py-1 mb-8">送信日時：{{  \Carbon\Carbon::parse($inquiry->created_at)->format('Y年n月j日 G時i分') }}</p>
                                        </div>
                                    @else
                                        <div class="bg-gray-100 rounded-lg break-words px-2 py-1 mb-8 text-xs text-center ml-20 lg:ml-40">
                                            メッセージの送信を取り消しました
                                        </div>
                                    @endif
                                @else
                                    @if ($inquiry->deleted_at === null)
                                        <div class="bg-gray-100 rounded-lg text-sm break-words px-2 py-1 mb-1 mr-20 lg:mr-40">
                                            {{ $inquiry->message }}
                                        </div>
                                        <div class="flex flex-row-reverse">
                                            <p class="text-gray-700 text-xs px-2 py-1 mr-40 mb-8">送信日時：{{ \Carbon\Carbon::parse($inquiry->created_at)->format('Y年n月j日 G時i分') }}</p>
                                        </div>
                                    @else
                                        <div class="bg-gray-100 rounded-lg break-words px-2 py-1 mb-8 text-xs text-center mr-20 lg:mr-40">
                                            メッセージの送信が取り消しされました
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <form method="post" action="{{ route('admin.inquiries.store', ['user_id' => $inquiries->first()->user->id]) }}">
                        @csrf
                        <div class="-m-2">
                            <div class="p-2 w-3/4 mx-auto">
                                <div class="relative">
                                    <textarea name="message" rows="3" placeholder="お問い合わせの返答を入力   例:お問い合わせありがとうございます。早急に対応いたします。" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
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
