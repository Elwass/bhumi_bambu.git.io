<?php

namespace App\Http\PromoControllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromoController extends Controller
{
    // READ
    public function index()
    {
        $promos = Promo::all();
        return view('admin.promo.index', compact('promos'));
    }

    // CREATE (form)
    public function create()
    {
        return view('admin.promo.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'nama_promo' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'diskon' => 'required|numeric|min:1|max:100',
        ]);

        Promo::create([
            'id_admin' => Auth::id(), // admin login
            'nama_promo' => $request->nama_promo,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'diskon' => $request->diskon,
        ]);

        return redirect()->route('promo.index')->with('success', 'Promo berhasil ditambahkan.');
    }

    // EDIT (form)
    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        return view('admin.promo.edit', compact('promo'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_promo' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'diskon' => 'required|numeric|min:1|max:100',
        ]);

        $promo = Promo::findOrFail($id);
        $promo->update($request->all());

        return redirect()->route('promo.index')->with('success', 'Promo berhasil diperbarui.');
    }

    // DELETE
    public function destroy($id)
    {
        Promo::destroy($id);
        return redirect()->route('promo.index')->with('success', 'Promo berhasil dihapus.');
    }
}
