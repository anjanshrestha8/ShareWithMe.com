<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'idea' => 'required|min:5|max:250'
        ]);

        $idea = new Idea();
        $idea->content = $request->get("idea");
        $idea->save();

        return redirect()->route("dashboard")->with("success", "Idea was created successfully!!");
    }

    public function destroy($id)
    {
        Idea::where("id", $id)->firstOrFail()->delete();

        return redirect()->route("dashboard")->with("success", "Idea was deleted successfully!!");
    }
}
