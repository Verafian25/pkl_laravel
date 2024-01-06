<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index():View
    {
        $kategori = Kategori::latest()->paginate(5);
        return view('kategori.index', compact('kategori'))->with('i', (request()->input('page', 1) -1) * 5);   
    }


    //create

    public function create() : View 
    {
        return view('Kategori.create');    
    }

    public function store(Request $request): RedirectResponse 
    {
        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        
        return redirect()->route('kategori.index')->with(['success' => 'Data berhasil disimpan']);
    }
    
    
    //edit
    
    public function edit(String $id) : View 
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));    
    }
    
    public function update(Request $request, $id) : RedirectResponse
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori 
        ]);
        
        return redirect()->route('kategori.index')->with(['success' => 'Data berhasil di ubah']);

    }
}
