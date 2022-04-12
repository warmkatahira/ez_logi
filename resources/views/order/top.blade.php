<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            受注
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
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