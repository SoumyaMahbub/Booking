<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return Inertia::render('Hotel/Index', ['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Hotel/Save', ['hotel' => null]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return Inertia::render('Hotel/Save', ['hotel' => $hotel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|sometimes|image'
        ]);

        $hotel = Hotel::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        $hotel->save();

        if ($request->image) {
            $this->saveImages($request->image, $hotel->id);
        }

        return redirect()->route('hotel.index')->with(
            [
                'message' => 'A hotel was created successfully'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::with('user')->where('id', $id)->first();
        $hotel->view_count = $hotel->view_count + 1;
        $hotel->save();
        return Inertia::render('Hotel/Show', ['hotel' => $hotel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {

        // dd($request);
        $oldName = $hotel->name;

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|sometimes|image'
        ]);

        if ($request->image) {
            $this->saveImages($request->image, $hotel->id);
        }

        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->save();

        return redirect()->route('hotel.index')->with(
            [
                'message' => $oldName . ' was updated successfully'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $oldName = $hotel->name;
        $hotel->delete();
        return redirect()->route('hotel.index');
    }

    public function saveImages($imageInput, $hotel_id)
    {
        $image = Image::make($imageInput);
        if ($image->width() > $image->height()) {
            $image->widen(1200)
                ->save(storage_path('app/public/images/hotels/' . $hotel_id . "_large.jpg"))
                ->widen(400)->pixelate(12)
                ->save(storage_path('app/public/images/hotels/' . $hotel_id . "_pixalated.jpg"));
            $image = Image::make($imageInput);
            $image->widen(60)
                ->save(storage_path('app/public/images/hotels/' . $hotel_id . "_thumb.jpg"));
        } else {
            $image->heighten(900)
                ->save(storage_path('app/public/images/hotels/' . $hotel_id . "_large.jpg"))
                ->heighten(400)->pixelate(12)
                ->save(storage_path('app/public/images/hotels/' . $hotel_id . "_pixalated.jpg"));
            $image = Image::make($imageInput);
            $image->heighten(60)
                ->save(storage_path('app/public/images/hotels/' . $hotel_id . "_thumb.jpg"));
        }
    }
}
