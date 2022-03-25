<?php

namespace App\Http\Controllers;

use App\Events\DeletionEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
use App\Models\Sheet;
use App\Http\Requests\StoreSheetRequest;
use App\Http\Requests\UpdateSheetRequest;

class SheetController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }

    public function validData(){
        return request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required'
        ]);
    }

    public function index()
    {
        $sheets = Sheet::Published();
        return compact('sheets');
    }

    public function create()
    {
        $this->authorize('create');
        // return the create view
    }

    public function store(StoreSheetRequest $request)
    {
        $this->authorize('create');
        $data = $this->validData();
        $data['user_id'] = auth()->id();
        $sheet = Sheet::create($data);
        event(new InsertionEvent($sheet,"Sheet",auth()->user()));
        return $sheet;
    }

    public function show(Sheet $sheet)
    {
        return compact('sheet');
    }

    public function edit(Sheet $sheet)
    {
        $this->authorize('update',$sheet);
        // return edit view
    }

    public function update(UpdateSheetRequest $request, Sheet $sheet)
    {
        $this->authorize('update',$sheet);
        $sheet->update($this->validData());
        event(new ModificationEvent($sheet,"Sheet",auth()->user()));
        return $sheet;
    }

    public function destroy(Sheet $sheet)
    {
        $this->authorize('delete',$sheet);
        event(new DeletionEvent($sheet,"Sheet",auth()->user()));
        $sheet->delete();
        // return redirect
    }
}
