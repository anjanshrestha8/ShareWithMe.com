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

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|min:5|max:250'
        ]);

        $idea = new Idea;
        $idea->content = $request->get('content');

        return redirect()->route('idea.show')->with('success', "Idea was updated successfully!!!!!");
    }
}
