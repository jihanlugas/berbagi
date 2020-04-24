<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelKontak;
use App\Photoupload;
use App\Http\Traits\PhotouploadTrait;

class Kontak extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use PhotouploadTrait;

    public function index()
    {

        $data = ModelKontak::all();
        return view('kontak', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontak_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $photo_id = 0;

        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|unique:kontak,email',
            'alamat' => 'required',
            'nohp' => 'required|numeric',
            'photo_id' => 'image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        if ($request->file('photo_id')) {
            $photo_id = $this->uploadPhoto($request->file('photo_id'), 0);
        }

        $mKontak = new ModelKontak();
        $mKontak->nama = $request->nama;
        $mKontak->email = $request->email;
        $mKontak->nohp = $request->nohp;
        $mKontak->alamat = $request->alamat;
        $mKontak->photo_id = $photo_id;
        $mKontak->save();

        if ($photo_id) {
            Photoupload::where('id', $photo_id)
                ->update([
                    'ref_id' => $mKontak->id,
                ]);
        }

        return redirect()->route('kontak.index')->with('alert-success', 'Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ModelKontak::where('id', $id)->first();

        return view('kontak_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

//        $data = ModelKontak::where('id', $id)->first();
//        $data->nama = $request->nama;
//        $data->email = $request->email;
//        $data->nohp = $request->nohp;
//        $data->alamat = $request->alamat;
//        $data->save();


        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|unique:kontak,email',
            'alamat' => 'required',
            'nohp' => 'required',
        ]);

        ModelKontak::where('id', $id)
            ->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,
            ]);


        return redirect()->route('kontak.index')->with('alert-success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelKontak::where('id', $id)->first();
        $data->delete();
        return redirect()->route('kontak.index')->with('alert-success', 'Data berhasi dihapus!');
    }
}
