<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{__('messages.units')}}
        </h2>
    </x-slot>
@livewire('add-unit-component', [], key(1))
</x-app-layout>
