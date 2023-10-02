<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    public function index(){
        $listItems = ListItem::where('is_complete', 0)->get();
        return view('welcome', ['listItems' => $listItems]);
    }
    
    public function saveItem(Request $request) {
        // \Log::info(json_encode($request->all()));

        $listItem = new ListItem();
        $listItem->name = $request->input('new-task');
        $listItem->is_complete = 0;
        $listItem->save();

        return redirect('/');
    }

    public function markComplete($id) {
        // \Log::info(json_encode($request->all()));

        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }
}
