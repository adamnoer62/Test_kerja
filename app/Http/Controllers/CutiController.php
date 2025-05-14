<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Cuti::with('pegawai')->get(); // ambil data cuti dan relasi ke pegawai
        return view('pegawai_cuti.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawais = Pegawai::all(); // gak perlu eager load cutis di form
        return view('pegawai_cuti.create')->with('pegawais', $pegawais);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'alasan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        $tanggal_mulai = date('Y-m-d', strtotime($request->tanggal_mulai));
        $tanggal_selesai = date('Y-m-d', strtotime($request->tanggal_selesai));

        if ($tanggal_mulai !== $tanggal_selesai) {
            return back()->withErrors(['tanggal' => 'Tanggal cuti harus 1 hari yang sama di karenakan Cuti sebulan 1 hari'])->withInput();
        }

        $pegawaiId = $request->pegawai_id;
        $tahun = date('Y', strtotime($tanggal_mulai));
        $bulan = date('m', strtotime($tanggal_mulai));


        $totalCutiTahun = Cuti::where('pegawai_id', $pegawaiId)
            ->whereYear('tanggal_mulai', $tahun)
            ->count();

        if ($totalCutiTahun >= 12) {
            return back()->withErrors(['limit_tahun' => 'Pegawai sudah menggunakan 12 hari cuti di tahun ini'])->withInput();
        }


        $sudahCutiBulanIni = Cuti::where('pegawai_id', $pegawaiId)
            ->whereMonth('tanggal_mulai', $bulan)
            ->whereYear('tanggal_mulai', $tahun)
            ->exists();

        if ($sudahCutiBulanIni) {
            return back()->withErrors(['limit_bulan' => 'Pegawai hanya boleh cuti 1 hari per bulan'])->withInput();
        }


        Cuti::create([
            'pegawai_id' => $pegawaiId,
            'alasan' => $request->alasan,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
        ]);

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

        $cuti = Cuti::find($id);
        return view('pegawai_cuti.show', compact('cuti'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $cuti = Cuti::find($id);
        $pegawais = Pegawai::all();
        return view('pegawai_cuti.edit', compact('cuti', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'alasan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        $cuti = Cuti::findOrFail($id);

        $tanggal_mulai = date('Y-m-d', strtotime($request->tanggal_mulai));
        $tanggal_selesai = date('Y-m-d', strtotime($request->tanggal_selesai));

        if ($tanggal_mulai !== $tanggal_selesai) {
            return back()->withErrors(['tanggal' => 'Tanggal cuti harus 1 hari yang sama'])->withInput();
        }

        $pegawaiId = $request->pegawai_id;
        $tahun = date('Y', strtotime($tanggal_mulai));
        $bulan = date('m', strtotime($tanggal_mulai));


        $totalCutiTahun = Cuti::where('pegawai_id', $pegawaiId)
            ->whereYear('tanggal_mulai', $tahun)
            ->where('id', '!=', $id)
            ->count();

        if ($totalCutiTahun >= 12) {
            return back()->withErrors(['limit_tahun' => 'Pegawai sudah menggunakan 12 hari cuti di tahun ini'])->withInput();
        }


        $sudahCutiBulanIni = Cuti::where('pegawai_id', $pegawaiId)
            ->whereMonth('tanggal_mulai', $bulan)
            ->whereYear('tanggal_mulai', $tahun)
            ->where('id', '!=', $id)
            ->exists();

        if ($sudahCutiBulanIni) {
            return back()->withErrors(['limit_bulan' => 'Pegawai hanya boleh cuti 1 hari per bulan'])->withInput();
        }


        $cuti->update([
            'pegawai_id' => $pegawaiId,
            'alasan' => $request->alasan,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
        ]);

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cuti = Cuti::find($id);
        $cuti->delete();


        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil dihapus');
    }
}
