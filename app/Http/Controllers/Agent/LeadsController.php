<?php

namespace App\Http\Controllers\Agent;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadsController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:agent');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $leads = auth('agent')->user()->leads;
        return view('agent.leads.index', compact('leads'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $lead = $user;
        $topViews = $lead->views->sortByDesc('user_views')->take(4);
        return view('agent.leads.show', compact('lead', 'topViews'));
    }
}
