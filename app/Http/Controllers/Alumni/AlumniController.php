<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumni = Alumni::all();
        return view('admin.alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function list(Request $request)
    {
        $pagination  = 12;
        $alumni    = Alumni::when($request->keyword, function ($query) use ($request) {
            $query
            ->where('name', 'like', "%{$request->keyword}%")
             ->orWhere('working_in', 'like', "%{$request->keyword}%")
              ->orWhere('graduation_year', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->simplePaginate($pagination);

        $alumni->appends($request->only('keyword'));

        return view('alumni.index', [
            'name'    => 'alumni',
            'alumni' => $alumni,
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumni = Alumni::find($id)->load('user');
        return response()->json($alumni);
    }

    public function detail($id)
    {
        $alumni = Alumni::find($id);
        $jurusan = $alumni->major;
        return response()->json($jurusan);
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
        $alumni = Alumni::find($id);
        $alumni->user()->delete();
        $alumni->delete();
        return redirect()->back()->with('delete', "Sukses");
    }
}
