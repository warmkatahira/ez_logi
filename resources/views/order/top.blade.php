<x-app-layout>
    <x-slot name="header">
        <span class="font-semibold text-lg text-gray-800">
            <i class="las la-shopping-cart la-lg align-middle"></i>
            受注
        </span>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-5 gap-4">
                <a href="{{ route('order.data_import.index') }}" class="border-2 border-teal-400 rounded-lg font-bold text-teal-400 p-8 text-center transition duration-300 ease-in-out hover:bg-teal-400 hover:text-white mr-6">
                    受注データ取込
                </a>
                <a href="" class="border-2 border-teal-400 rounded-lg font-bold text-teal-400 p-8 text-center transition duration-300 ease-in-out hover:bg-teal-400 hover:text-white mr-6">
                    受注データ削除
                </a>
            </div>
        </div>
    </div>
</x-app-layout>