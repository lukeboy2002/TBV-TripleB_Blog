<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Overview extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::role('member')
            ->with('member')
            ->simplePaginate(1);

        return view('livewire.member.overview', [
            'users'=>$users
        ]);
    }
}
