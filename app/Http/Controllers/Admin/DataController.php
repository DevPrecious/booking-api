<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataRequest;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function create(DataRequest $request)
    {

        $newlistPrice = convertToArray($request->listPrice);
        $newwithPrice = convertToArray($request->withPrice);
        $newincluded = convertToArray($request->included);
        $newtours = convertToArray($request->tours);

        $data = dataToSave(
            $request->name,
            $request->timeAndNight,
            $request->date,
            $newlistPrice,
            $newwithPrice,
            $request->departureDate,
            $request->returnDate,
            $request->flying,
            $newincluded,
            $newtours
        );

        $up = imageUpload($request->file('headerImage'), $request->file('defaultImage'));
        $data['headerImage'] = $up['headerImage'];
        $data['defaultImage'] = $up['defaultImage'];

        $data = Data::create($data);

        return response([
            'data' => $data,
            'message' => 'Posted'
        ], 201);
    }


    public function index()
    {
        $data = Data::latest()->get();

        return response([
            'data' => $data,
        ], 200);
    }


    public function update(DataRequest $request, Data $dataN)
    {

        $newlistPrice = convertToArray($request->listPrice);
        $newwithPrice = convertToArray($request->withPrice);
        $newincluded = convertToArray($request->included);
        $newtours = convertToArray($request->tours);

        $data = dataToSave(
            $request->name,
            $request->timeAndNight,
            $request->date,
            $newlistPrice,
            $newwithPrice,
            $request->departureDate,
            $request->returnDate,
            $request->flying,
            $newincluded,
            $newtours
        );

        $up = imageUpload($request->file('headerImage'), $request->file('defaultImage'));
        $data['headerImage'] = $up['headerImage'];
        $data['defaultImage'] = $up['defaultImage'];

        $dataN->update($data);

        return response([
            'data' => $data,
            'message' => 'Updated'
        ], 201);
    }

    public function destroy(Data $data)
    {
        $data->delete();

        return null;
    }
}
