<x-app-layout>
    <x-main-layout.grid>
        <x-slot name="main">
            <livewire:member.overview />
        </x-slot>
        <x-slot name="side">
            <x-ranking />
        </x-slot>
    </x-main-layout.grid>
</x-app-layout>
