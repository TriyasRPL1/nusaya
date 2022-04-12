<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasUmum;

class AdminController extends Controller
{
    public function index()
    {
        return view('adm.home');
    }

    public function fasilitashotelindex()
    {
        $fasilitashotel = FasilitasUmum::all();
        return view('adm.fasilitashotel.home', ['fasilitashotel' => $fasilitashotel]);
    }

    public function edit_fasilitashotel(Request $request)
    {
        $data = FasilitasUmum::findOrFail($request->get('id'));
        return response()->json([
            'data' => $data
          ]);
    }

    public function upload_fasilitashotel(){
        // Memvalidasi
        request()->validate([
            'nama' => 'required|min:5',
            'jumlah' => 'required|integer',
            'deskripsi' => 'required',
            // 'thumbnail' => 'image:jpeg,png,jpg',
        ]);

        // if (request()->file('thumbnail')) {
        //     $thumbUrl = request()->file('thumbnail')->store('images/posts');
        // } else {
        //     $thumbUrl = null;
        // }


        $fasilitashotel = request()->all();
        // Memasukan ke database
        FasilitasUmum::create($fasilitashotel);

        session()->flash('success', 'Fasilitas telah Ditambahkan');
        return redirect()->to('/admin/fasilitashotel');

    }
}
