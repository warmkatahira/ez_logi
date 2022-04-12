<script src="{{ asset('js/order.js') }}" defer></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            受注データ取込
        </h2>
    </x-slot>
    <x-alert/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('order.data_import.import') }}" id="order_data_import" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-4">
                    <label for="btob_toriyose" class="block border-2 border-teal-400 rounded-lg font-bold text-teal-400 p-8 text-center transition duration-300 ease-in-out hover:bg-teal-400 hover:text-white mr-6">
                        B to B(取り寄せ)
                        <input type="file" id="btob_toriyose" name="btob_toriyose" accept=".csv" class="hidden">
                    </label>
                    <label for="btob_zaiko" class="block border-2 border-teal-400 rounded-lg font-bold text-teal-400 p-8 text-center transition duration-300 ease-in-out hover:bg-teal-400 hover:text-white mr-6">
                        B to B(在庫)
                        <input type="file" id="btob_zaiko" name="btob_zaiko" accept=".csv" class="hidden">
                    </label>
                    <label for="btoc" class="block border-2 border-teal-400 rounded-lg font-bold text-teal-400 p-8 text-center transition duration-300 ease-in-out hover:bg-teal-400 hover:text-white mr-6">
                        B to C
                        <input type="file" id="btoc" name="btoc" accept=".csv" class="hidden">
                    </label>
                </div>
                <input type="submit" class="hidden">
                <input type="hidden" id="import_type" name="import_type">
                <input type="hidden" id="shipment_category" name="shipment_category">
            </form>
        </div>
        
    </div>
</x-app-layout>