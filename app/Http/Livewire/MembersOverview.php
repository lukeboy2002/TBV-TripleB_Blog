<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MembersOverview extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::role('member')
            ->with('member')
            ->simplePaginate(1);

        return view('livewire.members-overview', [
            'users'=>$users
        ]);
    }
}
