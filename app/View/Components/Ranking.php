<?php

namespace App\View\Components;

use App\Models\Member;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Ranking extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $members = Member::orderby('points', 'desc')
            ->with('user')
            ->take(5)
            ->get();

        return view('components.ranking', [
            'members' => $members,
        ]);
    }
}
