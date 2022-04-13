<script src="{{ asset('js/item.js') }}" defer></script>
<x-app-layout>
    <x-slot name="header">
        <span class="font-semibold text-lg text-gray-800">
            <i class="las la-tshirt la-lg align-middle"></i>
            商品
        </span>
    </x-slot>
    <x-alert/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-5 gap-4">
                <a href="{{ route('item.item_list') }}" class="border-2 border-teal-400 rounded-lg font-bold text-teal-400 p-8 text-center transition duration-300 ease-in-out hover:bg-teal-400 hover:text-white mr-6">
                    商品一覧
                </a>
                <form method="post" action="{{ route('item.item_master.import') }}" id="item_master_import_form" enctype="multipart/form-data" class="m-0">
                    @csrf
                    <label for="item_master_import" class="block border-2 border-teal-400 rounded-lg font-bold text-teal-400 p-8 text-center transition duration-300 ease-in-out hover:bg-teal-400 hover:text-white mr-6">
                        商品マスタ取込
                        <input type="file" id="item_master_import" name="item_master_import" accept=".csv" class="hidden">
                    </label>
                    <input type="submit" class="hidden">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>