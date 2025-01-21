<?php
// app/Http/Controllers/TransactionController.php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Kantinwk;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Method untuk menampilkan semua transaksi
    public function index()
    {
        $transactions = Transaction::with(['user', 'kantinwk'])->get();
        return view('transactions.index', compact('transactions'));
    }

    // Method untuk menampilkan transaksi berdasarkan item kantin
    public function show(Kantinwk $kantinwk)
    {
        $transactions = Transaction::where('kantinwk_id', $kantinwk->id)
                                    ->with('user')
                                    ->get();
        return view('transactions.show', compact('transactions', 'kantinwk'));
    }
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function destroyAll()
    {
        Transaction::truncate();

        return redirect()->route('transactions.index')->with('success', 'Semua transaksi berhasil dihapus.');
    }
}
