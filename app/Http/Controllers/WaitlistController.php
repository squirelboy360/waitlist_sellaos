<?php

namespace App\Http\Controllers;

use App\Models\Waitlist;
use Illuminate\Http\Request;

class WaitlistController extends Controller
{
    public function index()
    {
        return view('waitlist');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:waitlists,email',
        ]);

        Waitlist::create($request->only('email'));

        return redirect('/')->with('success', 'Thank you for joining the waitlist!');
    }

    public function showAll()
    {
        $waitlists = Waitlist::all();
        return view('waitlists', compact('waitlists'));
    }

    public function update(Request $request, $id)
    {
        $waitlist = Waitlist::findOrFail($id);
        $request->validate([
            'email' => 'required|email|unique:waitlists,email,' . $id,
        ]);
        $waitlist->update($request->only('email'));

        return redirect('/waitlists')->with('success', 'Email updated successfully!');
    }

    public function destroy($id)
    {
        $waitlist = Waitlist::findOrFail($id);
        $waitlist->delete();

        return redirect('/waitlists')->with('success', 'Email deleted successfully!');
    }
}
