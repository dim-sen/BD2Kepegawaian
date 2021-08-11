<?php

namespace App\Http\Controllers;

use App\Models\Pegawais;
use App\Models\Golongans;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Gajis;
use Illuminate\Validation\ValidationException;

class GajisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = [
            'gajis' => Gajis::with('pegawais')->simplePaginate(10)
        ];
        return view('admin.gaji.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $data = [
            'pegawais' => Pegawais::all(),
            'golongans' => Golongans::all()
        ];
        return view('admin.gaji.create', $data);
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
                'nip' => 'required',
                'tanggal_gaji' => 'required'
            ]);
        } catch (ValidationException $e) {
        }

        $pegawai = Pegawais::where('id', '=', $request -> nip)->first();
        $golongan = Golongans::where('id', '=', $pegawai -> id_golongan)->first();

        $jumlah_gaji = $request-> gaji_pokok + $golongan -> tunjangan_pasangan + $golongan -> tunjangan_anak + $golongan -> tunjangan_transport;
        $potongan = $jumlah_gaji * 0.05;
        $total_gaji =  $jumlah_gaji - $potongan;

        $data = [
            'nip' => $request-> nip,
            'tanggal_gaji' => $request-> tanggal_gaji,
            'jumlah_gaji' => $jumlah_gaji,
            'potongan' => $potongan,
            'total_gaji' => $total_gaji
        ];

        Gajis::create($data);

        return redirect() -> route('gaji.index') -> with('success', 'Data berhasil disimpan');
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
            'pegawais' => Pegawais::all(),
            'gajis' => Gajis::findorfail($id)
        ];
        return view('admin.gaji.edit', $data);
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
                'nip' => 'required',
                'tanggal_gaji' => 'required'
            ]);
        } catch (ValidationException $e) {
        }

        $pegawai = Pegawais::where('id', '=', $request -> nip)->first();
        $golongan = Golongans::where('id', '=', $pegawai -> id_golongan)->first();

        $jumlah_gaji = $request-> gaji_pokok + $golongan -> tunjangan_pasangan + $golongan -> tunjangan_anak + $golongan -> tunjangan_transport;
        $potongan = $jumlah_gaji * 0.05;
        $total_gaji =  $jumlah_gaji - $potongan;

        $gajisData = [
            'nip' => $request-> nip,
            'tanggal_gaji' => $request-> tanggal_gaji,
            'jumlah_gaji' => $jumlah_gaji,
            'potongan' => $potongan,
            'total_gaji' => $total_gaji
        ];

        Gajis::whereId($id) -> update($gajisData);

        return redirect() -> route('gaji.index') -> with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $gaji = Gajis::findorfail($id);
        $gaji -> delete();

        return redirect() ->back() -> with('success', 'Berhasil dihapus');

    }
}
