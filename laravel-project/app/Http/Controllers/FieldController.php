<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Sheet;
use Illuminate\Http\Request;

class FieldController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    private function validateField(){
        return request()->validate([
            'title' => 'required|string',
            'info' => 'required|string',
        ]);
    }

    public function index(Sheet $sheet)
    {
        $this->authorize('update',$sheet);
        return $sheet->fields;
    }
    
    public function edit(Sheet $sheet)
    {
        $this->authorize('update',$sheet);
        $sheet->with('fields');
        return view('fields.edit',compact('sheet'));
    }

    public function store(Sheet $sheet)
    {
        $this->authorize('update',$sheet);
        Field::create(['title'=>' ','info'=>' ','sheet_id'=>$sheet->id]);
    }

    public function update(Sheet $sheet, Field $field)
    {
        $this->authorize('update',$sheet);
        $field->update($this->validateField());
    }

    public function destory(Sheet $sheet, Field $field)
    {
        $this->authorize('update',$sheet);
        $field->delete();
    }
}
