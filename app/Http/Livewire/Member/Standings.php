<?php

namespace App\Http\Livewire\Member;

use App\Models\Member;
use Livewire\Component;

class Standings extends Component
{
    public $sortField;

    public $sortAsc = true;

    protected $queryString = ['sortAsc', 'sortField'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.member.standings', [
            'members' => Member::orderby('points', 'desc')
                ->when($this->sortField, function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })
                ->with('user')
                ->get()
        ]);
    }
}
