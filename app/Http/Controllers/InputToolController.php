<?php

namespace App\Http\Controllers;

use App\Models\InputTool;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Tool;

class InputToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ([
            'halaman' => 'Input Tool',
            'inputs' => InputTool::all()
        ]);
        return view('admin.input-tool.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = ([
            'halaman' => 'Input Tool',
            'hal' => 'Create Input Tool',
            'inputs' => InputTool::all(),
            'sections' => Section::all(),
            'tools' => Tool::all()
        ]);
        return view('admin.input-tool.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'section' => 'required',
            'no_spb' => 'required',
            'part_no' => 'required',
            'spec' => 'required',
            'qty' => 'required|numeric'
        ]);

        InputTool::create($validated);

        $tool = new Tool;
        $tool->where('part_no', '=', $request->part_no)->increment('stock', $request->qty);

        return redirect('admin/intool');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
