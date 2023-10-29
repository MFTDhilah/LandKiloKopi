<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use File;

class AboutController extends Controller
{
    public function index() {
        $abouts = About::all();

        return view('about.index', compact('abouts'));
    }

    public function create() {
        return view('about.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        About::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect('/about');
    }

    public function edit(About $about) {
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, About $about) {
        $about->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect('/about');
    }

    public function delete(About $about){
        $about->delete();
        return redirect('/about');
    }
}
