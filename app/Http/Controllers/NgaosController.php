<?php

namespace App\Http\Controllers;

use App\DetailNgaos;
use App\Ngaos;
use Illuminate\Http\Request;

class NgaosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surah = ["Al-Fatihah","Al-Baqarah","Ali 'Imran","An-Nisa'","Al-Ma'idah","Al-An'am","Al-A'raf","Al-Anfal","At-Taubah","Yunus","Hud","Yusuf","Ar-Ra'ad","Ibrahim","Al-Hijr","Al-Isra'","Al-Kahf","Maryam","Thaha","Al-Anbiya'","Al-Hajj","Al-Mu'minun","An-Nur","Al-Furqan","Asy-Syu'ara'","An-Naml","Al-Qasas","Al-'Ankabut","Ar-Rum","Luqman","As-Sajdah","Al-Ahzab","Saba'","Fatir","Yasin","As-Saffat","Sad","Az-Zumar","Gafir","Fussilat","Asy-Syuara","Az-Zukhruf","Ad-Dukhan","Al-Jasiyah","Al-Ahqaf","Muhammad","Al-Fath","Al-Hujurat","Qaf","Az-Zariyat","At-Tur","An-Nazm","Al-Qamar","Ar-Rahman","Al-Waqi'ah","Al-Hadid","Al-Mujadalah","Al-Hasyr","Al-Mumtahanah","As-Saff","Al-Jumu'ah","Al-Munafiqun","At-Tagabun","At-Talaq","At-Tahrim","Al-Mulk","Al-Qalam","Al-Haqqah","Al-Ma'arij","Nuh","Al-Jinn","Al-Muzzamil","Al-Muddassir","Al-Qiyamah","Al-Insan","Al-Mursalat","An-Naba'","An-Nazi'at","'Abasa'","At-Takwir","Al-Infitar","Al-Mutaffifin","Al-Insyiqaq","Al-Buruj","At-Tariq","Al-A'la","Al-Gasyiyah","Al-Fajr","Al-Balad","Asy-Syams","Al-Lail","Ad-Dhuha","Asy-Syarh","At-Tin","Al-'Alaq","Al-Qadr","Al-Bayyinah","Az-Zalzalah","Al-'Adiyat","Al-Qari'ah","At-Takasur","Al-'Asr","Al-Humazah","Al-Fil","Quraisy","Al-Ma'un","Al-Kausar","Al-Kafirun","An-Nasr","Al-Lahab","Al-Ikhlas","Al-Falaq","An-Nas"];
        $data = Ngaos::all();
        // $jumlah = DetailNgaos::with('ngaos')->where([
        //     ['bulan_ngaos','1'],
        //     ['status','kholas'],
        // ])->count();
        return view('pages.quran.index')->with([
            'data' => $data,
            // 'jumlah' => $jumlah,
            'surah' => $surah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Ngaos::create($data);

        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surah = ["Al-Fatihah","Al-Baqarah","Ali 'Imran","An-Nisa'","Al-Ma'idah","Al-An'am","Al-A'raf","Al-Anfal","At-Taubah","Yunus","Hud","Yusuf","Ar-Ra'ad","Ibrahim","Al-Hijr","Al-Isra'","Al-Kahf","Maryam","Thaha","Al-Anbiya'","Al-Hajj","Al-Mu'minun","An-Nur","Al-Furqan","Asy-Syu'ara'","An-Naml","Al-Qasas","Al-'Ankabut","Ar-Rum","Luqman","As-Sajdah","Al-Ahzab","Saba'","Fatir","Yasin","As-Saffat","Sad","Az-Zumar","Gafir","Fussilat","Asy-Syuara","Az-Zukhruf","Ad-Dukhan","Al-Jasiyah","Al-Ahqaf","Muhammad","Al-Fath","Al-Hujurat","Qaf","Az-Zariyat","At-Tur","An-Nazm","Al-Qamar","Ar-Rahman","Al-Waqi'ah","Al-Hadid","Al-Mujadalah","Al-Hasyr","Al-Mumtahanah","As-Saff","Al-Jumu'ah","Al-Munafiqun","At-Tagabun","At-Talaq","At-Tahrim","Al-Mulk","Al-Qalam","Al-Haqqah","Al-Ma'arij","Nuh","Al-Jinn","Al-Muzzamil","Al-Muddassir","Al-Qiyamah","Al-Insan","Al-Mursalat","An-Naba'","An-Nazi'at","'Abasa'","At-Takwir","Al-Infitar","Al-Mutaffifin","Al-Insyiqaq","Al-Buruj","At-Tariq","Al-A'la","Al-Gasyiyah","Al-Fajr","Al-Balad","Asy-Syams","Al-Lail","Ad-Dhuha","Asy-Syarh","At-Tin","Al-'Alaq","Al-Qadr","Al-Bayyinah","Az-Zalzalah","Al-'Adiyat","Al-Qari'ah","At-Takasur","Al-'Asr","Al-Humazah","Al-Fil","Quraisy","Al-Ma'un","Al-Kausar","Al-Kafirun","An-Nasr","Al-Lahab","Al-Ikhlas","Al-Falaq","An-Nas"];
        $ngaji = DetailNgaos::with('ngaos')->where('bulan_ngaos',$id)->get();
        $jumlah = DetailNgaos::with('ngaos')->where([
            ['bulan_ngaos',$id],
            ['status','kholas'],
        ])->count();
        $item = Ngaos::findOrFail($id);
        return view('pages.quran.detail')->with([
            'item' => $item,
            'ngaji' => $ngaji,
            'jumlah' => $jumlah,
            'surah' => $surah
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jumlah = DetailNgaos::with('ngaos')->where([
            ['bulan_ngaos',$id],
            ['status','kholas'],
        ])->count();
        $item = Ngaos::findOrFail($id);
        $ngaos = DetailNgaos::with('ngaos')->where('bulan_ngaos',$id)->get();
        return view('pages.quran.edit-ngaos')->with([
            'item' => $item,
            'jumlah' => $jumlah,
            'ngaos' => $ngaos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Ngaos::findOrFail($id);
        $item->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Ngaos::findOrFail($id);
        $detail = DetailNgaos::where('bulan_ngaos',$id);
        $item->delete();
        $detail->delete();


        return redirect()->back();
    }
}
