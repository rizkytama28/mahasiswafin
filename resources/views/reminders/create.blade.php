@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Reminder</h2>
    <form action="{{ route('reminders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Waktu Reminder</label>
            <input type="datetime-local" name="reminder_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Simpan</button>
    </form>
</div>
@endsection
