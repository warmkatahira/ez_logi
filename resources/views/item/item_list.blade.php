<script src="{{ asset('js/shipment_management.js') }}" defer></script>
<x-app-layout>
    <x-slot name="header">
        <span class="font-semibold text-lg text-gray-800">
            商品一覧
        </span>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table class="w-full">
            <thead>
                <tr class="text-xs text-left bg-teal-200 border-gray-600">
                    <th class="p-2">商品区分</th>
                    <th class="p-2">商品コード</th>
                    <th class="p-2">代表JAN</th>
                    <th class="p-2">個別JAN</th>
                    <th class="p-2">ブランド名</th>
                    <th class="p-2">商品名</th>
                    <th class="p-2">在庫数</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($items as $item)
                    <tr class="text-xs" id="tr_{{ $item->item_code }}">
                        <td class="p-1 border">{{ $item->item_category }}</td>
                        <td class="p-1 border">{{ $item->item_code }}</td>
                        <td class="p-1 border">{{ $item->integrate_jan_code }}</td>
                        <td class="p-1 border">{{ $item->individual_jan_code }}</td>
                        <td class="p-1 border">{{ $item->brand_name }}</td>
                        <td class="p-1 border">{{ $item->item_name_1 }} {{ empty($item->item_name_2) ? Null : $item->item_name_2 }}</td>
                        <td class="p-1 border">{{ $item->stock->stock_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- ページネーション -->
        <div class="mt-5">
            {{ $items->appends(request()->input())->links() }}
        </div>
    </div>
</x-app-layout>