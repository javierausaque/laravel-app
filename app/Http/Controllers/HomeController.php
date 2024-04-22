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
            return $rol == 'ROLE_ADMIN' ? view('admin.admin') : view('home');
        }
        return redirect()->back();
    }
}
