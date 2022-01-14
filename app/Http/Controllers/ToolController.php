<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ([
            'tools' => Tool::all(),
            'hal' => 'List Tool'
        ]);
        return view('admin.tool.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ([
            'hal' => 'CreateData'
        ]);
        return view('admin.tool.create', $data);
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
            'kode' => 'required',
            'tool_name' => 'required',
            'part_no' => 'required|unique:tools',
            'tool_spec' => 'required',
            'tool_material' => 'required',
            'image' => 'image|file|max:1024',
            'standard_using' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('tool-image');
        }
        $validated['stock'] = 0;

        Tool::create($validated);

        return redirect('admin/tool')->with('success', 'Data has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ([
            'datatool' => Tool::find($id),
            'hal' => 'Detail'
        ]);
        return view('admin.tool.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ([
            'hal' => 'UpdateData',
            'tools' => Tool::find($id),
        ]);
        return view('admin.tool.update', $data);
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
        $data = Tool::find($id);
        $rules = [
            'kode' => 'required',
            'tool_name' => 'required',
            'tool_spec' => 'required',
            'tool_material' => 'required',
            'image' => 'image|file|max:1024',
            'standard_using' => 'required|numeric',
            'price' => 'required|numeric'
        ];

        if ($data->part_no != $request->part_no) {
            $rules['part_no'] = 'required|unique:tools';
        }

        $validated = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('tool-image');
        }

        Tool::where('id', $id)
            ->update($validated);

        return redirect()->route('tool.index')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tool::find($id);
        if ($data->image) {
            Storage::delete($data->image);
        }
        Tool::destroy($id);

        return redirect('admin/tool')->with('success', 'Data has been deleted');
    }
}
