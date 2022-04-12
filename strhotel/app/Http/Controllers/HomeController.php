<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home = Home::latest()->get();
        return view('home', compact('home'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggalin' => 'required',
            'tanggalout' => 'required',
            'kamar' => 'required',
            'orang' => 'required',
            'jenis' => 'required',
        ]);

        $home = Home::create([
            'tanggalin' => $request->tanggalin,
            'tanggalout' => $request->tanggalout,
            'kamar' => $request->kamar,
            'orang' => $request->orang,
            'jenis' => $request->jenis,
        ]);

        if ($home) {
            return redirect()
                ->route('home.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
}
