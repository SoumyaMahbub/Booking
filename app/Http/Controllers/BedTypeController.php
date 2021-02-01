<?php

namespace App\Http\Controllers;

use App\Models\BedType;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BedTypeController extends Controller
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
    public function create($hotel_id)
    {
        return Inertia::render('Hotel/BedType/Save', ['hotel_id' => $hotel_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $hotel_id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        BedType::create([
            'hotel_id' => $hotel_id,
            'name' => $request->name
        ]);
            
        return redirect()->route('hotel.show', $hotel_id)->with(
            [
                'message' => 'A bed type was created successfully'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function show(BedType $bedType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function edit(BedType $bedType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BedType $bedType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BedType $bedType)
    {
        //
    }
}
