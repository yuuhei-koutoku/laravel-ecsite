<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            カートを表示
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($products) > 0)
                        @foreach ($products as $product )
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-3/12 mb-2 md:mb-0">
                                    @if ($product->imageFirst->filename !== null)
                                        <img src="{{ Storage::disk('s3')->url('products/' . $product->imageFirst->filename) }}">
                                    @else
                                        <img src="">
                                    @endif
                                </div>
                                <div class="md:w-9/12 flex flex-col md:flex-row">
                                    <div class="md:w-5/12 md:ml-4">{{ $product->name }}</div>
                                    <div class="flex flex-row justify-around items-center md:w-4/12">
                                        <div>{{ $product->pivot->quantity }}個</div>
                                        <div>{{ number_format($product->pivot->quantity * $product->price) }}<span class="text-sm text-gray-700">円(税込)</span></div>
                                        <form method="post" action="{{route('user.cart.delete', ['item' => $product->id])}}">
                                            @csrf
                                            <button class="flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-2">
                            計: {{ number_format($totalPrice)}}<span class="text-sm text-gray-700">円(税込)</span>
                        </div>
                        <div>
                            <button onclick="location.href='{{ route('user.cart.checkout')}}'" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">購入</button>
                        </div>
                    @else
                        カートに商品が入っていません。
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
