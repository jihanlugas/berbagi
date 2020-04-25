<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kbiuser;
use App\Photoupload;
use App\Userphoto;
use App\Http\Traits\PhotouploadTrait;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use PhotouploadTrait;

    public function index()
    {
        die('asd');
        return view('register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|unique:kontak,email',
            'alamat' => 'required',
            'nohp' => 'required|numeric',
            'photo_id_1' => 'required|image|mimes:jpeg,png,gif,webp|max:20480',
            'photo_id_2' => 'required|image|mimes:jpeg,png,gif,webp|max:20480',
            'photo_id_3' => 'required|image|mimes:jpeg,png,gif,webp|max:20480',
            'photo_id_4' => 'required|image|mimes:jpeg,png,gif,webp|max:20480',
            'photo_id_5' => 'required|image|mimes:jpeg,png,gif,webp|max:20480',
        ]);

        $mUser = new Kbiuser();
        $mUser->nama = $request->nama;
        $mUser->email = $request->email;
        $mUser->nohp = $request->nohp;
        $mUser->alamat = $request->alamat;
        $mUser->save();

//        if ($photo_id_1) {
//            Photoupload::where('id', $photo_id_1)
//                ->update([
//                    'ref_id' => $mUser->id,
//                ]);
//        }

        if ($request->file('photo_id_1')) {
            $photo_id = $this->uploadPhoto($request->file('photo_id_1'), 1);
            Photoupload::where('id', $photo_id)
                ->update([
                    'ref_id' => $mUser->id,
            ]);

            Userphoto::create(['user_id' => $mUser->id, 'photo_id' => $photo_id]);
        }

        if ($request->file('photo_id_2')) {
            $photo_id = $this->uploadPhoto($request->file('photo_id_2'), 2);
            Photoupload::where('id', $photo_id)
                ->update([
                    'ref_id' => $mUser->id,
            ]);
            Userphoto::create(['user_id' => $mUser->id, 'photo_id' => $photo_id]);
        }

        if ($request->file('photo_id_3')) {
            $photo_id = $this->uploadPhoto($request->file('photo_id_3'), 3);
            Photoupload::where('id', $photo_id)
                ->update([
                    'ref_id' => $mUser->id,
            ]);
            Userphoto::create(['user_id' => $mUser->id, 'photo_id' => $photo_id]);
        }

        if ($request->file('photo_id_4')) {
            $photo_id = $this->uploadPhoto($request->file('photo_id_4'), 4);
            Photoupload::where('id', $photo_id)
                ->update([
                    'ref_id' => $mUser->id,
            ]);
            Userphoto::create(['user_id' => $mUser->id, 'photo_id' => $photo_id]);
        }

        if ($request->file('photo_id_5')) {
            $photo_id = $this->uploadPhoto($request->file('photo_id_5'), 5);
            Photoupload::where('id', $photo_id)
                ->update([
                    'ref_id' => $mUser->id,
            ]);
            Userphoto::create(['user_id' => $mUser->id, 'photo_id' => $photo_id]);
        }

        return redirect()->route('register.index')->with('alert-success', 'Berhasil Menambahkan Data!');
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
