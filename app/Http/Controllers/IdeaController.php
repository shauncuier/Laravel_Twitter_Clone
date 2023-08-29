<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{


    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }


    public function store()

    {
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);
        Idea::create($validated);
        return redirect()->route('dashboard')->with('success', 'Tweet created Successfully!');
    }
    public function destroy(Idea $idea)
    {

        $idea->delete();
        return redirect()->route('dashboard')->with('error', 'Tweet Delete Successfully!');
    }

    public function edit(Idea $idea)
    {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success', "Tweet Update Successfully!");
    }
}
