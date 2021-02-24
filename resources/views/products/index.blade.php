<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{__('messages.Products')}}
        </h2>
    </x-slot>

    @livewire('product-component')

</x-app-layout>
