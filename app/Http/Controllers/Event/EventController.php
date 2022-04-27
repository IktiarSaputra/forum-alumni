<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::orderBy('created_at', 'DESC')->get();
        return view('admin.event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $pagination  = 4;
        $event    = Event::when($request->keyword, function ($query) use ($request) {
            $query
            ->where('title', 'like', "%{$request->keyword}%")
            ->orWhere('content', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->simplePaginate($pagination);

        $event->appends($request->only('keyword'));

        return view('events.index', [
            'title'    => 'event',
            'event' => $event,
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        $date = $request->tanggal.' '.$request->jam;

        $event = Event::create([
            'title' => $request->title,
            'content' => $request->content,
            'schedule' => $date,
        ]);

        if($request->hasfile(['banner'])){
            $request->file(['banner'])->move(public_path('/events/banner/'),$request->file(['banner'])->getClientOriginalName());
            $event->banner = $request->file(['banner'])->getClientOriginalName();
            $event->save();
        }

        return redirect()->back()->with('insert', 'Event Berhasil Di Tambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        $date = $request->tanggal.' '.$request->jam;

        $event = Event::findOrFail($id);

        $event->update([
            'title' => $request->title,
            'content' => $request->content,
            'schedule' => $date,
        ]);

        if($request->hasfile(['banner'])){
            $request->file(['banner'])->move(public_path('/events/banner/'),$request->file(['banner'])->getClientOriginalName());
            $event->banner = $request->file(['banner'])->getClientOriginalName();
            $event->save();
        }

        return redirect(route('event.index'))->with('update','Event Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->back()->with('delete', 'Event Berhasil Di Hapus');
    }
}
