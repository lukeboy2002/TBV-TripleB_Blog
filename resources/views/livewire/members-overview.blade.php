<div>
    <div class="flex justify-between items center pb-8">
        <x-main-layout.heading>Player overview</x-main-layout.heading>
        {{ $users->links() }}
    </div>
    @foreach($users as $user)
        <x-card.player>
            <div class="sm:flex">
                <div class="w-2/3">
                    <img src="{{ asset('storage/' . $user->member->image) }}" alt="{{ $user->username }}" class="h-full sm:h-80 sm:w-auto rounded-t-lg sm:rounded-t-none sm:rounded-tl-lg" >
                </div>
                <div class="ml-4 py-8 w-full space-y-4 sm:space-y-6 w-3/5">
                    <div>
                        <p class="text-2xl font-black text-orange-500">{{ $user->username }}</p>
                        <p class="text-gray-700 dark:text-white text-sm">{{ $user->member->city }}</p>
                    </div>
                    <div class="flex justify-start gap-4 w-full text-sm text-gray-700 dark:text-white">
                        <div class="w-1/4">Age</div>
                        <div class="w-1/4">{{ $user->member->age() }}</div>
                        <div class="w-1/4">Points</div>
                        <div class="w-1/4">{{ $user->member->points }}</div>
                    </div>
                    <div class="flex justify-start gap-4 w-full text-sm text-gray-700 dark:text-white">
                        <div class="w-1/4">Played games</div>
                        <div class="w-1/4">{{ $user->member->played_games }}</div>
                        <div class="w-1/4">Games won</div>
                        <div class="w-1/4">{{ $user->member->won_games }}</div>
                    </div>
                </div>
            </div>

            @if( $user->member->bio )
                <hr class="h-px mb-2 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="px-4 py-2">
                    <x-main-layout.heading>Biograpy</x-main-layout.heading>
                    <div class="pt-4 text-gray-900 dark:text-white prose dark:prose-invert">
                        {!! $user->member->bio !!}
                    </div>
                </div>
            @endif
        </x-card.player>
    @endforeach
</div>
