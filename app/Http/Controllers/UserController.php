<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('pages.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('pages.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'min:4', 'max:20'],
            'bio' => ['required', 'string', 'min:4', 'max:20'],
            'address' => ['required', 'string', 'min:4', 'max:20'],
        ]);

        User::where('id', Auth::user()->id)->update($data);

        return redirect()->back();
    }
}
