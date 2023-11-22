<?php

namespace App\Http\Controllers;

use App\Models\kuisioner;
use App\Models\Questions;
use App\Casts\Base64;
use Illuminate\Http\Request;
use File;

class KuisionerController extends Controller
{
    public function index()
    {
        $quest = Questions::all();
        return view('kuisioner.kuisioner', compact(['quest']));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'poto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->file('poto')){
            $path = $request->file('poto')->getRealPath();
            $image = file_get_contents($path);
            $poto = base64_encode($image);
        } 
        $listData = $request->input('Jawaban');
        $jsonListData = json_encode($listData);
        kuisioner::create([
            'Alamat' => $request->Alamat,
            'Instagram' => $request->Instagram,
            'Nama' => $request->Nama,
            'NoWa' => $request->NoWa,
            'poto' => $poto,
            'Jawaban' => $jsonListData, // Ganti dengan nama kolom yang diinginkan
        ]);
        // //create post
        // $kuisioner = new kuisioner;
        // $kuisioner->Alamat = $request->Alamat;
        // $kuisioner->Instagram = $request->Instagram;
        // $kuisioner->Nama = $request->Nama;
        // $kuisioner->NoWa = $request->NoWa;
        // $kuisioner->Jawaban = $request->Jawaban;

        
        // $kuisioner->save();

        return redirect('https://wa.me/6283140457656?text=Halo%20kak%20aku%20udah%20isi%20kuesioner%20nihhh%2C%20code%20promo%20buat%20aku%20mana%20yaaa%3F%3F%3F%3F');
    }

}

