<x-app-layout>
    <x-main-layout.grid>
        <x-slot name="main">
            <livewire:member.standings />
        </x-slot>
        <x-slot name="side">
{{--            <x-last-winner />--}}
            <div class="flex justify-between items center pb-8">
                <x-main-layout.heading>Last Winner</x-main-layout.heading>
            </div>
            <div class="px-4">
                <img src="{{asset('storage/winners/winner.jpeg')}}" alt="BUD" class="h-auto max-w-full rounded-lg border border-orange-500" >
            </div>
        </x-slot>
    </x-main-layout.grid>
</x-app-layout>
