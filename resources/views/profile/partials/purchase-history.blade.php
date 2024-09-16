<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            購入履歴
        </h2>
    </header>

    @if ($stocks->isEmpty())
        <p class="text-center">商品を購入した履歴はありません。</p>
    @else
        @foreach ($stocks as $stock)
            <div class="md:flex my-6">
                <div class="mb-2 md:mb-0 md:w-5/12 lg:w-1/3">
                    <x-thumbnail filename="{{ $stock->filename ?? '' }}" type="products" />
                </div>
                <div class="md:w-7/12 lg:w-2/3 md:ml-4">
                    <div class="mb-2">
                        商品名：{{ $stock->name }}<br>
                        数量：{{ $stock->quantity }}個<br>
                        単価：{{ number_format($stock->price) }}<span class="text-sm text-gray-700">円(税込)</span><br>
                        小計：{{ number_format($stock->quantity * $stock->price) }}<span class="text-sm text-gray-700">円(税込)</span><br>
                        購入日時：{{ \Carbon\Carbon::parse($stock->created_at)->format('Y年n月j日 G時i分') }}<br><br>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</section>
