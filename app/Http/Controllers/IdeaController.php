<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:5|max:250'
        ]);

        $idea = new Idea();
        $idea->content = $request->get("content");
        $idea->save();

        return redirect()->route("dashboard")->with("success", "Idea was created successfully!!");
    }

    public function destroy($id)
    {
        $idea = Idea::where('id', $id)->firstOrFail();
        $idea->delete();

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
        $editing = true;
        return view('idea.show', [
            'idea' => $id,
            'editing' => $editing
        ]);
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'content' => 'required|min:5|max:250'
        ]);

        $idea = Idea::find($id);
        $idea->content = $request->content;
        $idea->update();


        return redirect()->route('idea.show', $idea->id)->with('success', "Idea was updated successfully!!!!!");
    }
}
