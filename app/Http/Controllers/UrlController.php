<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Http\Requests\StoreUrlRequest;
use App\Http\Requests\UpdateUrlRequest;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreUrlRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUrlRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUrlRequest  $request
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUrlRequest $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
        //
    }
}
