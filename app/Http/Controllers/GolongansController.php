<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Golongans;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class GolongansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = [
            'golongans' => Golongans::simplePaginate(10)
        ];
        return view('admin.golongan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.golongan.create');
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
                'id_golongan' => 'required|max:8',
                'gaji_pokok' => 'required'
            ]);
        } catch (ValidationException $e) {
        }
        $data = [
            'id_golongan' => $request-> id_golongan,
            'gaji_pokok' => $request-> gaji_pokok,
            'tunjangan_pasangan' => $request-> gaji_pokok * 0.5,
            'tunjangan_anak'  => $request-> gaji_pokok * 0.2,
            'tunjangan_transport'  => $request-> gaji_pokok * 0.1
        ];
        Golongans::create($data);

        return redirect() -> route('golongan.index') -> with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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
    public function edit($id)
    {
        $data = [
            'golongans' => Golongans::findorfail($id)
        ];
        return view('admin.golongan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $this->validate($request, [
                'id_golongan' => 'required|max:8',
                'gaji_pokok' => 'required'
            ]);
        } catch (ValidationException $e) {
        }

        $bukusData = [
            'id_golongan' => $request-> id_golongan,
            'gaji_pokok' => $request-> gaji_pokok,
            'tunjangan_pasangan' => $request-> gaji_pokok * 0.5,
            'tunjangan_anak'  => $request-> gaji_pokok * 0.2,
            'tunjangan_transport'  => $request-> gaji_pokok * 0.1
        ];

        Golongans::whereId($id) -> update($bukusData);

        return redirect() -> route('golongan.index') -> with('success', 'Data berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $golongan = Golongans::findorfail($id);
        $golongan -> delete();

        return redirect() ->back() -> with('success', 'Berhasil dihapus');

    }
}
