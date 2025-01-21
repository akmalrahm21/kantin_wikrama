<?php
namespace App\Http\Controllers;

use App\Models\Kantinwk;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KantinwkController extends Controller
{
    public function pembeliIndex(Request $request)
    {
        $type = $request->get('type', 'all');
    
        if ($type === 'all') {
            $kantinwks = Kantinwk::all();
        } else {
            $kantinwks = Kantinwk::where('jenis_barang', $type)->get();
        }
    
        return view('pembeli.index', compact('kantinwks'));
    }
    public function index()
    {
        $kantinwks = Kantinwk::all();
        return view('kantinwks.index', compact('kantinwks'));
    }

    public function create()
    {
        return view('kantinwks.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nama_pemasok' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'jenis_barang' => 'required|string|max:255',
            'harga_barang' => 'required|numeric',
            'jumlah_barang' => 'required|integer',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image_path->extension();
        $request->image_path->storeAs('public/images', $imageName);
    
        Kantinwk::create([
            'nama_pemasok' => $request->nama_pemasok,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'harga_barang' => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'image_path' => 'images/' . $imageName,
        ]);
    
        return redirect()->route('kantinwks.index');
    }


// app/Http/Controllers/KantinwkController.php

public function show(Kantinwk $kantinwk)
{
    // Mengambil data transaksi terkait dengan kantinwk dan memuat informasi user
    $transactions = $kantinwk->transactions()->with('user')->get();

    // Menggabungkan informasi transaksi
    $combinedTransactions = $transactions->groupBy('user_id')->map(function ($userTransactions) {
        $firstTransaction = $userTransactions->first();
        return [
            'user_name' => $firstTransaction->user->name,
            'total_quantity' => $userTransactions->sum('quantity'),
            'total_price' => $userTransactions->sum('total_price'),
        ];
    });

    return view('kantinwks.show', compact('kantinwk', 'combinedTransactions'));
}


    

    public function edit(Kantinwk $kantinwk)
    {
        return view('kantinwks.edit', compact('kantinwk'));
    }

    public function update(Request $request, $id)
    {
        $kantinwk = Kantinwk::findOrFail($id);
    
        $kantinwk->nama_pemasok = $request->nama_pemasok;
        $kantinwk->nama_barang = $request->nama_barang;
        $kantinwk->jenis_barang = $request->jenis_barang;
        $kantinwk->harga_barang = $request->harga_barang;
        $kantinwk->jumlah_barang = $request->jumlah_barang;
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $kantinwk->image_path = $path;
        }
    
        $kantinwk->save();
    
        return redirect()->route('kantinwks.index')->with('success', 'Barang telah diupdate.');
    }
    

    public function destroy(Kantinwk $kantinwk)
    {
        $kantinwk->delete();
        return redirect()->route('kantinwks.index');
    }
    public function beli($id)
    {
        $kantinwk = Kantinwk::findOrFail($id);
        return view('beli', compact('kantinwk'));
    }

    public function processBeli(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . Kantinwk::findOrFail($id)->jumlah_barang,
        ]);

        $kantinwk = Kantinwk::findOrFail($id);
        $quantity = $request->input('quantity');
        $total_price = $kantinwk->harga_barang * $quantity;

        Transaction::create([
            'kantinwk_id' => $kantinwk->id,
            'user_id' => Auth::id(),
            'quantity' => $quantity,
            'total_price' => $total_price,
        ]);

        $kantinwk->jumlah_barang -= $quantity;
        $kantinwk->save();

        return redirect()->route('pembeli.index')->with('success', 'Pembelian berhasil dilakukan!');
    }
    public function search(Request $request)
{
    $query = $request->input('query');
    $kantinwks = Kantinwk::where('nama_barang', 'LIKE', "%{$query}%")->get();

    return view('pembeli.index', compact('kantinwks'));
}

}
