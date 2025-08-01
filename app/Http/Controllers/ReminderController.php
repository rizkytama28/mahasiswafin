<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    public function index()
    {
        $reminders = Reminder::where('user_id', Auth::id())->get();
        return view('reminders.index', compact('reminders'));
    }

    public function create()
    {
        return view('reminders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'reminder_time' => 'required|date'
        ]);

        Reminder::create([
            'user_id' => Auth::id(),
            'description' => $request->description,
            'reminder_time' => $request->reminder_time,
            'status' => 1
        ]);

        return redirect()->route('reminders.index')->with('success', 'Reminder berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->delete();

        return redirect()->route('reminders.index')->with('success', 'Reminder berhasil dihapus.');
    }
}
