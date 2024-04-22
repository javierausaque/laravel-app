<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function index()
    {
        if (Auth::id()) {
            $rol = Auth()->user()->rol;
            $users = (new User)->paginate();
            return $rol == 'ROLE_ADMIN' ? view('user.index', compact('users'))
                ->with('i', (request()->input('page', 1) - 1) * $users->perPage()) : view('home', [$users]);
        }
        return redirect()->back();
    }
}
