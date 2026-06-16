<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang.index', compact('barangs'));
    }

    public function store(Request $request)
    {
        // 1. Ambil nilai harga dari input mana pun yang dikirim oleh form HTML
        $hargaInput = $request->input('harga_sewa') ?? $request->input('harga') ?? $request->input('harga_hari') ?? $request->input('harga_per_hari');

        // 2. Satukan ke dalam request agar lolos dari jeratan sistem validasi
        $request->merge(['harga_sewa' => $hargaInput]);

        // 3. Jalankan proses validasi data
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori'    => 'required|string',
            'stok'        => 'required|integer|min:1',
            'harga_sewa'  => 'required|numeric|min:0', 
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $pathFoto = null;
        if ($request->hasFile('foto')) {
            $pathFoto = $request->file('foto')->store('barang', 'public');
        }

        // 4. Masukkan data bersih ke dalam database tabel barangs
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori'    => $request->kategori,
            'stok'        => $request->stok,
            'harga_sewa'  => $request->harga_sewa, 
            'foto'        => $pathFoto
        ]);

        return redirect()->back()->with('success', 'Aset studio baru berhasil terdaftar!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        if ($barang->foto) {
            Storage::disk('public')->delete($barang->foto);
        }
        $barang->delete();

        return redirect()->back()->with('success', 'Aset telah dihapus dari sistem.');
    }
}