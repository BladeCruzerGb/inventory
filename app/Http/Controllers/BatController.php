<?php

namespace App\Http\Controllers;

use App\Models\Bat;
use App\Models\BatItem;
use App\Models\Section;
use App\Models\Tool;
use Illuminate\Http\Request;

class BatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ([
            'title' => 'PETG3',
            'halaman' => 'BAT',
            'berita' => Bat::all(),
            'items' => BatItem::all()
        ]);
        return view('user.bats.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ([
            'title' => 'PETG3',
            'halaman' => 'BAT',
            'next_hal' => 'CreateData',
            'sections' => Section::all(),
            'tools' => Tool::all()
        ]);
        return view('user.bats.create', $data);
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
            'no' => 'required',
            'section' => 'required',
            'line' => 'required',
            'no_machine' => 'required',
            'no_process' => 'required',
        ]);

        $data = Bat::create($validated)->id;

        if (count($request->kode) > 0) {
            foreach ($request->kode as $item => $v) {
                $data2 = ([
                    'bat_id' => $data,
                    'kode' => $request->kode[$item],
                    'qty' => $request->qty[$item],
                    'note' => $request->note[$item]
                ]);

                $hrg = Tool::where('kode', $request->kode[$item])->first();
                $toolprice = $hrg->price;

                $total = $toolprice * $request->qty[$item];

                $data2['amount'] = $total;
                $data2['price'] = $toolprice;
                BatItem::insert($data2);

                $tool = new Tool;
                $tool->where('kode', '=', $request->kode[$item])->decrement('stock', $request->qty[$item]);
            }
        }

        return redirect()->route('bat.index')->with('success', 'Data has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bat  $bat
     * @return \Illuminate\Http\Response
     */
    public function show(Bat $bat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bat  $bat
     * @return \Illuminate\Http\Response
     */
    public function edit(Bat $bat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bat  $bat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bat $bat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bat  $bat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bat $bat)
    {
        //
    }
}
