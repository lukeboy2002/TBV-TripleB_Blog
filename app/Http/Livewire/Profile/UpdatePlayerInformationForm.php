<?php

namespace App\Http\Livewire\Profile;

use App\Models\Member;
use App\Models\User;
use Livewire\Component;

class UpdatePlayerInformationForm extends Component
{
    public User $user;

    public Member $member;

    public $bio;

    public $city;

    public $birthday;

    protected $rules = [
        'bio' => 'nullable|min:6',
        'city' => 'nullable|min:3',
        'birthday' => 'nullable|date',
    ];

    protected $listeners = ['changeDate' => 'changeDate'];

    public function changeDate($date)
    {
        $this->birthday = $date;
    }

    public function mount(User $user)
    {
        $member = $user->member()->firstOrNew();
        $this->bio = $member->bio;
        $this->city = $member->city;
        $this->birthday = $member->birthday;
    }

    public function render()
    {
        return view('profile.update-player-information-form');
    }

    public function save()
    {
        $this->validate();

        $member = $this->user->member()->firstOrNew();

        $member->user_id = $this->user->id;
        $member->bio = $this->bio;
        $member->city = $this->city;
        $member->birthday = $this->birthday;
        $member->save();

        session()->flash('success_small', 'User has been updated');
    }
}
