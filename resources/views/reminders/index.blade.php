@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Reminder</h2>
    <a href="{{ route('reminders.create') }}" class="btn btn-primary">Tambah Reminder</a>
    <table class="table mt-3">
        <tr>
            <th>Deskripsi</th>
            <th>Waktu Reminder</th>
            <th>Aksi</th>
        </tr>
        @foreach($reminders as $r)
        <tr>
            <td>{{ $r->description }}</td>
            <td>{{ $r->reminder_time }}</td>
            <td>
                <form action="{{ route('reminders.destroy', $r->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
