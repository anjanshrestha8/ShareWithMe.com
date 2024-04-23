<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {

        return view('users.show', [
            'user' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id)
    {
        return view('users.edit', [
            'user' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $id)
    {
        //
    }
}
