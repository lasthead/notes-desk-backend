<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NotesController extends Controller
{
    public function getList(Request $request) {
        return Note::all();
    }
    public function getItemById(Request $request) {
        $request->validate([
            'id' => 'required|string'
        ]);
        return Note::find($request->id);
    }
    public function createItem(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'user' => 'string',
            'text' => 'required|string',
            'completed' => 'boolean',
            'date_created' => 'date'
        ]);
        $item = new Note();
        $item->name = $request->name;
        $item->user = $request->user ?? 1;
        $item->text = $request->text;
        $item->completed = $request->completed ?? false;
        $item->save();
        return $item;
    }
    public function updateItem(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'text' => 'required|string',
            'completed' => 'boolean'
        ]);
        $item = Note::find($request->id);
        $item->name = $request->name;
        $item->text = $request->text;
        $item->completed = $request->completed ?? false;
        $item->save();
    }
    public function removeItem(Request $request) {
        $request->validate([
            'id' => 'required'
        ]);
        $item = Note::find($request->id);
        $item->delete();
    }
}
