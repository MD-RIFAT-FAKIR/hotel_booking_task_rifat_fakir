
<x-app-layout>
    <div class="min-h-screen bg-gray-900 text-white">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>   
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-100">
                        <a href="{{ route('hotel.booking.form') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 focus:ring-2 focus:ring-green-400 transition duration-200">
                        Booking Form
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
