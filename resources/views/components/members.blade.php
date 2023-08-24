<div class="my-6">
    <x-main-layout.heading>Our Team</x-main-layout.heading>
    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-7 gap-x-3 gap-y-3 md:gap-y-6 mx-4 my-6 lg:my-10">
        @foreach($members as $member)
            <div class="w-full flex flex-col justify-center items-center">
                <img class="w-28 h-28 lg:h-36 lg:w-36 rounded-full" src="{{ asset('storage/' . $member->member->image) }}" alt="{{ $member->username }}">
                <p class="text-orange-500 text-lg font-semibold pt-2">{{ $member->username }}</p>
            </div>
        @endforeach
    </div>

{{--    <div class="flex -space-x-2 overflow-hidden items-center py-10">--}}
{{--        @foreach($members as $member)--}}
{{--        <img class="inline-block h-24 w-24 rounded-full ring-2 ring-orange-500 hover:h-28 hover:w-28 hover:z-10" src="{{ asset('storage/' . $member->member->image) }}" alt="">--}}
{{--        @endforeach--}}
{{--    </div>--}}

</div>


