<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {

        $ideas = $id->ideas()->paginate(5);
        return view('users.show', [
            'user' => $id,
            'ideas' => $ideas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id)
    {
        $editing = true;
        $ideas = $id->ideas()->paginate(5);

        return view('users.edit', [
            'user' => $id,
            'ideas' => $ideas,
            'editing' => $editing

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $id, Request $request)
    {
        $validate = $request->validate(
            [
                'name' => 'required| min:3 | max:40',
                'bio' => 'nullable | min:1 | max:225',
                'image' => 'image'
            ]
        );



        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            $validate['image'] = $imagePath;
        }

        Storage::disk('public')->delete($id->image ?? '');



        $id->update($validate);

        return redirect()->route('profile')->with('success', 'Profile is updated successfully!!');
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}
