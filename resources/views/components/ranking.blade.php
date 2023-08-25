<table class="w-full text-left">
    <thead>
    <tr>
        <th scope="col">
            <x-main-layout.heading>Ranking</x-main-layout.heading>
        </th>
        <th scope="col" class="px-6 py-3 flex justify-end space-x-4 text-orange-500">
            Points
        </th>
    </tr>
    </thead>
    <tbody class="text-sm">
    @foreach($members as $member )
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $member->user->username }}
            </th>
            <th scope="row" class="flex justify-end space-x-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $member->points }}
            </th>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="flex justify-center items-center w-full py-4">
    <x-link.btn-secondary href="{{ route('members.standings') }}" class="w-full px-3 py-2 text-xs font-medium">Full standings</x-link.btn-secondary>
</div>
