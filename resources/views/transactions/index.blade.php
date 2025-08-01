@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Transaksi</h2>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Tambah Transaksi</a>
    <table class="table mt-3">
        <tr>
    <th>Tipe</th>
    <th>Kategori</th>
    <th>Jumlah</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>
@foreach($transactions as $t)
<tr>
    <td>{{ $t->type }}</td>
    <td>{{ $t->category }}</td>
    <td>{{ $t->amount }}</td>
    <td>{{ $t->date }}</td>
    <td>
        <a href="{{ route('transactions.edit', $t->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('transactions.destroy', $t->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
