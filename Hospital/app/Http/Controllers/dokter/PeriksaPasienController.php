<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\Models\JanjiPeriksa;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Obat;
use App\Models\DetailPeriksa;


class PeriksaPasienController extends Controller
{
    public function index()
    {
        $janjiPeriksas = JanjiPeriksa::whereHas('jadwalPeriksa', function ($query) {
            $query->where('id_dokter', Auth::id());
        })->with('pasien', 'periksa')->get();

        return view('dokter.periksa.index', compact('janjiPeriksas'));
    }

    public function create($id)
    {
        $janjiPeriksa = JanjiPeriksa::with('pasien')->findOrFail($id);
        $obats = Obat::all();
        return view('dokter.periksa.create', compact('janjiPeriksa', 'obats'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'obat' => 'required|array',
            'obat.*' => 'exists:obats,id',
        ]);

        // Hitung total harga obat
        $totalHargaObat = Obat::whereIn('id', $request->obat)->sum('harga');
        $biayaPeriksa = 150000;
        $totalBayar = $biayaPeriksa + $totalHargaObat;

        $periksa = Periksa::create([
            'id_janji_periksa' => $id,
            'tgl_periksa' => $request->tgl_periksa,
            'catatan' => $request->catatan,
            'biaya_periksa' => $biayaPeriksa,
            'total_bayar' => $totalBayar,
        ]);

        foreach ($request->obat as $id_obat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $id_obat,
            ]);
        }

        return redirect()->route('dokter.periksa.index')->with('success', 'Data pemeriksaan berhasil disimpan');
    }

    public function edit($id)
    {
        $periksa = Periksa::findOrFail($id);
        $obats = Obat::all();
        return view('dokter.periksa.edit', compact('periksa', 'obats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'obat' => 'required|array',
            'obat.*' => 'exists:obats,id',
        ]);

        $periksa = Periksa::findOrFail($id);

        // Update data periksa
        $periksa->update([
            'tgl_periksa' => $request->tgl_periksa,
            'catatan' => $request->catatan,
            'biaya_periksa' => 150000, // tetap
        ]);

        // Hapus dulu obat sebelumnya
        DetailPeriksa::where('id_periksa', $periksa->id)->delete();

        // Tambahkan obat baru
        foreach ($request->obat as $id_obat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $id_obat,
            ]);
        }

        return redirect()->route('dokter.periksa.index')->with('success', 'Pemeriksaan berhasil diperbarui');
    }

}
