<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{__('messages.Property')}}
        </h2>
    </x-slot>
    @livewire('new-property-component', [], key(1))
</x-app-layout>
