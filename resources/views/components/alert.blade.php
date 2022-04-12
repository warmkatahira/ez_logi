<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if(session('alert_success'))
        <div class="bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 rounded mt-5" role="alert">
            <p class="font-bold">Informational message</p>
            <p class="text-sm">{{ session('alert_success') }}</p>
        </div>
    @endif
    @if(session('alert_danger'))
        <div class="bg-red-200 border border-red-500 text-red-700 px-4 py-3 rounded mt-5" role="alert">
            <p class="font-bold">Danger message</p>
            <p class="text-sm">{{ session('alert_danger') }}</p>
        </div>
    @endif
</div>