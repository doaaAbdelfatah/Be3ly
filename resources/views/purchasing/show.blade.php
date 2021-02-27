<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{__('messages.PurchasingOrder')}}
        </h2>
    </x-slot>
    @livewire('purchasing-order-show-component', ["order"=>$purchasingOrder], key(1))
</x-app-layout>
