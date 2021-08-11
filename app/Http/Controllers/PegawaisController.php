<?php

namespace App\Http\Controllers;

use App\Models\Golongans;
use App\Models\Pegawais;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PegawaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = [
            'pegawais' => Pegawais::with('golongans')->simplePaginate(10)
        ];
        return view('admin.pegawai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $data = [
            'golongans' => Golongans::all()
        ];
        return view('admin.pegawai.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $this->validate($request, [
                'nip' => 'required|max:19|min:18',
                'nama' => 'required|max:25|min:3',
                'jenis_kelamin' => 'required|in:pria,wanita',
                'tempat_lahir' => 'required|max:100',
                'tanggal_lahir' => 'required',
                'no_telp' => 'required|max:13|min:12',
                'alamat' => 'required',
                'status_nikah' => 'required|in:belum nikah,nikah',
                'jumlah_anak' => 'required',
                'id_golongan' => 'required'
            ]);
        } catch (ValidationException $e) {
        }

        $data = [
            'nip' => $request -> nip,
            'nama' => $request -> nama,
            'jenis_kelamin' => $request -> jenis_kelamin,
            'tempat_lahir' => $request -> tempat_lahir,
            'tanggal_lahir' => $request -> tanggal_lahir,
            'no_telp' => $request -> no_telp,
            'alamat' => $request -> alamat,
            'status_nikah' => $request -> status_nikah,
            'jumlah_anak' => $request -> jumlah_anak,
            'id_golongan' => $request -> id_golongan
        ];
        Pegawais::create($data);

        return redirect() -> route('pegawai.index') -> with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $data = [
            'golongans' => Golongans::all(),
            'pegawais' => Pegawais::findorfail($id)
        ];
        return view('admin.pegawai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            $this->validate($request, [
                'nip' => 'required|max:19|min:18',
                'nama' => 'required|max:25|min:3',
                'jenis_kelamin' => 'required|in:pria,wanita',
                'tempat_lahir' => 'required|max:100',
                'tanggal_lahir' => 'required',
                'no_telp' => 'required|max:13|min:12',
                'alamat' => 'required',
                'status_nikah' => 'required|in:belum nikah,nikah',
                'jumlah_anak' => 'required',
                'id_golongan' => 'required'
            ]);
        } catch (ValidationException $e) {
        }

        $pegawaisData = [
            'nip' => $request -> nip,
            'nama' => $request -> nama,
            'jenis_kelamin' => $request -> jenis_kelamin,
            'tempat_lahir' => $request -> tempat_lahir,
            'tanggal_lahir' => $request -> tanggal_lahir,
            'no_telp' => $request -> no_telp,
            'alamat' => $request -> alamat,
            'status_nikah' => $request -> status_nikah,
            'jumlah_anak' => $request -> jumlah_anak,
            'id_golongan' => $request -> id_golongan
        ];

        Pegawais::whereId($id) -> update($pegawaisData);

        return redirect() -> route('pegawai.index') -> with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $pegawai = Pegawais::findorfail($id);
        $pegawai -> delete();

        return redirect() ->back() -> with('success', 'Berhasil dihapus');
    }
}
