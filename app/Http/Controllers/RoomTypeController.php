<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Models\Hotel;
use App\Models\BedType;
use App\Models\Bed;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomTypeController extends Controller
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
        $hotel = Hotel::with('bed_types')->where('id', $hotel_id)->first();
        return Inertia::render('Hotel/RoomType/Save', ['hotel' => $hotel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($hotel_id, Request $request)
    {
        return $this->upsert($hotel_id, $request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomType $roomType)
    {
        return $this->upsert($roomType->hotel_id, $request);
    }

    private function upsert($hotel_id, Request $request) {
        // Validate data.
        $validatedData = $request->validate([
            'room_type.id' => 'nullable',
            'room_type.name' => 'required',
            'room_type.price' => 'required',
            'room_type.has_ac' => 'required|boolean',
            'room_type.has_fan' => 'required|boolean',
            'room_type.has_tv' => 'required|boolean',
            'beds' => 'required|array|min:1',
            'beds.*.bed_type_id' => 'required'
            ]);
            
            // Create ot update room type.
            $room_type = $validatedData['room_type'];
            $room_type['hotel_id'] = $hotel_id;
            $updating = true;
            $room_type_id = 0;
            if (!array_key_exists('id', $room_type) || $room_type['id'] == null || $room_type['id'] == 0) {
                // Creating.
                $updating = false;
                unset($room_type['id']);
            }
            else {
                // Updating.
                $room_type_id = $room_type['id'];
            }
            $room_type = RoomType::updateOrCreate(['id' => $room_type_id], $room_type);
            
            // Assign room type ids to each bed.
            $beds = collect($validatedData['beds'])->map(function ($bed) use ($room_type, $updating) {
                if (!$updating) {
                    unset($bed['id']);
                }
                $bed['room_type_id'] = $room_type->id;
                return $bed;
            })->toArray();

            $deletedBedsId = $request->deletedBedsId;
            
            // Update or destroy or create all the beds.
        
            if(!empty($deletedBedsId)){
                foreach($deletedBedsId as $bed_id){
                    Bed::destroy($bed_id);
                }
            }

            Bed::upsert($beds, ['id']);
            
            return redirect()->route('hotel.show', $hotel_id)->with(
                [
                    'message' => 'Room type was saved successfully'
                    ]
                ); 
            }
            
            /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit($hotel_id, RoomType $roomType)
    {
        $hotel = Hotel::with('bed_types')->where('id', $hotel_id)->first();
        $roomType->beds = $roomType->beds->map(function ($bed) {
            unset($bed->created_at);
            unset($bed->updated_at);
            return $bed;
        });
        unset($roomType->created_at);
        unset($roomType->updated_at);
        return Inertia::render('Hotel/RoomType/Save', ['hotel' => $hotel, 'room_type' => $roomType]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy($room_type_id)
    {
        
    }
}
