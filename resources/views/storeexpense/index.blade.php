<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{__('messages.storeexpense')}}
        </h2>
    </x-slot>
    @livewire('store-expense-component',["store" =>$store], key(1))
</x-app-layout>
