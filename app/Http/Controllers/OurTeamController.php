<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurTeam;
use File;

class OurteamController extends Controller
{
    public function index() {
        $ourteams = Ourteam::all();

        return view('ourteam.index', compact('ourteams'));
    }

    public function create() {
        return view('ourteam.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        Ourteam::create([
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'foto' => $this->saveImg($request->foto)
        ]);

        return redirect('/ourteam')->with('success', 'Berhasil Menambah Team');
    }

    public function edit(Ourteam $ourteam) {
        return view('ourteam.edit', compact('ourteam'));
    }

    public function update(Request $request, Ourteam $ourteam) {
        $ourteam->update([
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'foto' => $request->hasFile('foto') ? $this->saveImg($request->foto, $ourteam->foto) : $ourteam->foto
        ]);

        return redirect('/ourteam')->with('success', 'Data berhasil diubah!')->with('success', 'Data berhasil diupdate!');
    }

    public function delete(Ourteam $ourteam){
        if (File::exists(public_path('img/foto_team/'. $ourteam->foto))) {
            File::delete(public_path('img/foto_team/'. $ourteam->foto));
        }

        $ourteam->delete();
        return redirect('/ourteam');
    }

    public function saveImg($foto, $old_image = null){

        if ($old_image) {
            if (File::exists(public_path('img/foto_team/'. $old_image))) {
                File::delete(public_path('img/foto_team/'. $old_image));
            }
        }

        $nama_file = time().$foto->getClientOriginalExtension();
        $tujuan_upload = 'img/foto_team/';

		$foto->move($tujuan_upload,$nama_file);

        return $nama_file;
	}
}
