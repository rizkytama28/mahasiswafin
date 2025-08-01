<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'category' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date'
        ]);

        Transaction::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'category' => $request->category,
            'amount' => $request->amount,
            'date' => $request->date
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }
    public function edit($id)
{
    $transaction = Transaction::findOrFail($id);
    return view('transactions.edit', compact('transaction'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'type' => 'required',
        'category' => 'required',
        'amount' => 'required|numeric',
        'date' => 'required|date'
    ]);

    $transaction = Transaction::findOrFail($id);
    $transaction->update([
        'type' => $request->type,
        'category' => $request->category,
        'amount' => $request->amount,
        'date' => $request->date
    ]);

    return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
}

public function destroy($id)
{
    $transaction = Transaction::findOrFail($id);
    $transaction->delete();

    return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
}
}
