<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('members.index');
    }

    public function showstanding(): View
    {
        return view('members.standings');
    }
}
