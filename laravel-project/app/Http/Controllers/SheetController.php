<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use App\Http\Requests\StoreSheetRequest;
use App\Http\Requests\UpdateSheetRequest;

class SheetController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }

    public function getValidData(){
        return request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sheets = Sheet::Published();
        return compact('sheets');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        // return the create view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSheetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSheetRequest $request)
    {
        $this->authorize('create');
        $data = $this->getValidData();
        $data['user_id'] = auth()->id;
        Sheet::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function show(Sheet $sheet)
    {
        return compact('sheet');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Sheet $sheet)
    {
        $this->authorize('update',$sheet);
        // return edit view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSheetRequest  $request
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSheetRequest $request, Sheet $sheet)
    {
        $this->authorize('update',$sheet);
        $sheet->update($this->validData());
        return compact('sheet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sheet $sheet)
    {
        $this->authorize('delete',$sheet);
        $sheet->delete();
        // return redirect
    }
}
