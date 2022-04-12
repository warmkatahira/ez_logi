<script src="{{ asset('js/shipment_management.js') }}" defer></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            出荷管理<i class="las la-angle-double-right"></i>{{ $active_status['shipment_status_name'] }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <ul class="cursor-pointer grid grid-cols-4 gap-1">
                @foreach($shipment_statuses as $shipment_status)
                    <a href="{{ route('shipment_mgt.index', ['shipment_status_code' => $shipment_status['shipment_status_code']]) }}">
                        <li class="text-sm bg-teal-200 rounded-lg py-1 text-center transition duration-300 ease-in-out hover:bg-lime-200">
                            {{ $shipment_status['shipment_status_name'] }}
                            </br>
                            <span class="ml-2 rounded text-teal-800">
                                {{ number_format(\App\Models\Order::where('shipment_status_code', $shipment_status['shipment_status_code'])->count()) }}
                            </span>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
        <div class="my-5">
            <label for="change_status_select" class="">ステータスを</label>
            <select id="change_status_select" class="py-3 text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-teal-600 focus:outline-none">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            へ
            <a href="{{ route('order.data_import.index') }}" class="bg-pink-200 rounded-lg p-3 text-center transition duration-300 ease-in-out hover:bg-lime-200">
                変更
            </a>
        </div>
        <table class="w-full">
            <thead>
                <tr class="text-xs text-left bg-teal-200 border-gray-600">
                    <th class="p-2 text-center"><input type="checkbox" id="all_chk"></th>
                    <th class="p-2">出荷ID</th>
                    <th class="p-2">出荷管理番号</th>
                    <th class="p-2">受注番号</th>
                    <th class="p-2">出荷区分</th>
                    <th class="p-2">注文区分</th>
                    <th class="p-2">配送先名</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($orders as $order)
                    <tr class="text-xs" id="tr_{{ $order->shipment_mgt_no }}">
                        <td class="p-1 border text-center"><input type="checkbox" id="chk_{{ $order->shipment_mgt_no }}" name="{{ $order->shipment_mgt_no }}" class="checks"></td>
                        <td class="p-1 border">{{ $order->shipment_id }}</td>
                        <td class="p-1 border">{{ $order->shipment_mgt_no }}</td>
                        <td class="p-1 border">{{ $order->mall_order_no }}</td>
                        <td class="p-1 border">{{ $order->shipment_category }}</td>
                        <td class="p-1 border">{{ $order->order_category }}</td>
                        <td class="p-1 border">{{ $order->delivery_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->appends(request()->input())->links() }}
    </div>
</x-app-layout>