<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|min:5|max:250'
        ]);

        $validated['user_id'] = auth()->user()->id;
        Idea::create($validated);

        return redirect()->route("dashboard")->with("success", "Idea was created successfully!!");
    }

    public function destroy(Idea $id)

    {

        if (auth()->user()->id !== $id->user_id) {
            abort(404);
        }
        $id->delete();

        return redirect()->route("dashboard")->with("success", "Idea was deleted successfully!!");
    }

    public function show(Idea $id)
    {

        return view('idea.show', [
            'idea' => $id
        ]);
    }

    public function edit(Idea $id)
    {

        if (auth()->user()->id !== $id->user_id) {
            abort(404);
        }
        $editing = true;
        return view('idea.show', [
            'idea' => $id,
            'editing' => $editing
        ]);
    }

    public function update(Idea $id, Request $request)
    {
        if (auth()->user()->id !== $id->user_id) {
            abort(404);
        }
        $validated = $request->validate([
            'content' => 'required|min:5|max:250'
        ]);



        $id->update($validated);

        return redirect()->route('idea.show', $id->id)->with('success', "Idea was updated successfully!!!!!");
    }
}
