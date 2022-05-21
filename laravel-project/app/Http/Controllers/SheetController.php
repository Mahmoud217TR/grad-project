<?php

namespace App\Http\Controllers;

use App\Events\DeletionEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
use App\Models\Sheet;
use App\Http\Requests\StoreSheetRequest;
use App\Http\Requests\UpdateSheetRequest;
use Illuminate\Validation\Rule;

class SheetController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }

    public function validData(){
        return request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => ['required',Rule::in(Sheet::getStatuses())],
        ]);
    }

    public function index()
    {
        $sheets = Sheet::Published();
        return compact('sheets');
    }

    public function create()
    {
        $this->authorize('create', Sheet::class);
        return view('sheet.create',['sheet'=>new Sheet, 'statuses'=>Sheet::getStatuses()]);
    }

    public function store(StoreSheetRequest $request)
    {
        $this->authorize('create', Sheet::class);
        $data = $this->validData();
        $data['user_id'] = auth()->id();
        $data['status'] = Sheet::getStatusValue($data['status']);
        $sheet = Sheet::create($data);
        event(new InsertionEvent($sheet,"Sheet",auth()->user()));
        return redirect()->route('fields.edit',$sheet);
    }

    public function show(Sheet $sheet)
    {
        $sheet->with('user','fields');
        return view('sheet.show',compact('sheet'));
    }

    public function edit(Sheet $sheet)
    {
        $this->authorize('update',$sheet);
        $sheet->with('fields');
        return view('sheet.edit',['sheet'=>$sheet, 'statuses'=>Sheet::getStatuses()]);
    }

    public function update(UpdateSheetRequest $request, Sheet $sheet)
    {
        $this->authorize('update',$sheet);
        $data = $this->validData();
        $data['status'] = Sheet::getStatusValue($data['status']);
        $sheet->update($data);
        event(new ModificationEvent($sheet,"Sheet",auth()->user()));
        return redirect()->route('sheet.show',$sheet);
    }

    public function destroy(Sheet $sheet)
    {
        $this->authorize('delete',$sheet);
        event(new DeletionEvent($sheet,"Sheet",auth()->user()));
        // return redirect
    }
}
