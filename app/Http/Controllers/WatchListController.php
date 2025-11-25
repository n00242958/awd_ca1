<?php

namespace App\Http\Controllers;

use App\Models\WatchList;
use Illuminate\Http\Request;

class WatchListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $watch_lists = WatchList::all();
        return view('watch_lists.index', compact('watch_lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('watch_lists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WatchList $watchList)
    {
        return view('watch_lists.show', compact('watchList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WatchList $watchList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WatchList $watchList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WatchList $watchList)
    {
        //
    }
}
