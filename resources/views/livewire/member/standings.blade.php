<div>
    <div class="flex justify-between items center pb-8">
        <x-main-layout.heading>Member Ranking</x-main-layout.heading>
    </div>
    <div class="relative overflow-x-auto shadow-md">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3"></th>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">

                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Won Games
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Played Games
                </th>
                <th scope="col" class="px-6 py-3 flex justify-center">
                    Points
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $member )
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->user->username }}" class="h-10 w-auto" >
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $member->user->username }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if( $member->winner =='1' )
                            <span class="bg-orange-500 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">Latest Winner</span>
                        @endif
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $member->won_games }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $member->played_games }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white flex justify-center">
                        {{ $member->points }}
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
