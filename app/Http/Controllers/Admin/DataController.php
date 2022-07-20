<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function create(Request $request) 
    {
        $request->validate([
            'headerImage' => 'required|image',
            'name' => 'required',
            'timeAndNight' => 'required',
            'date' => 'required',
            'listPrice' => 'required',
            'withPrice' => 'required',
            'defaultImage' => 'required|image',
            'departureDate' => 'required',
            'returnDate' => 'required',
            'flying' => 'required',
            'included' => 'required',
            'tours' => 'required'
        ]);

        $listPrice = $request->listPrice;
        $newlistPrice = explode(',', $listPrice);

        $withPrice = $request->withPrice;
        $newwithPrice = explode(',', $withPrice);

        $included = $request->included;
        $newincluded = explode(',', $included);

        $tours = $request->tours;
        $newtours = explode(',', $tours);

        $data = [
            'name' => $request->name,
            'timeAndNight' => $request->timeAndNight,
            'date' => $request->date,
            'listPrice' => serialize($newlistPrice),
            'withPrice' => serialize($newwithPrice),
            'departureDate' => $request->departureDate,
            'returnDate' => $request->returnDate,
            'flying' => $request->flying,
            'included' => serialize($newincluded),
            'tours' => serialize($newtours)
        ];

        if($request->file('headerImage') && $request->file('defaultImage')){
            $headerImage = $request->file('headerImage');
            $defaultImage = $request->file('defaultImage');
            
            $headerImageName = date('YmdHi').$headerImage->getClientOriginalName();
            $defaultImageName = date('YmdHi').$defaultImage->getClientOriginalName();

            //move image

            $headerImage->move(public_path('public/images'), $headerImageName);
            $defaultImage->move(public_path('public/images'), $defaultImageName);

            // add to data array

            $data['headerImage'] = $headerImageName;
            $data['defaultImage'] = $defaultImageName;
        }

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


    public function update(Request $request, Data $dataN) 
    {
        $request->validate([
            'headerImage' => 'required|image',
            'name' => 'required',
            'timeAndNight' => 'required',
            'date' => 'required',
            'listPrice' => 'required',
            'withPrice' => 'required',
            'defaultImage' => 'required|image',
            'departureDate' => 'required',
            'returnDate' => 'required',
            'flying' => 'required',
            'included' => 'required',
            'tours' => 'required'
        ]);

        $listPrice = $request->listPrice;
        $newlistPrice = explode(',', $listPrice);

        $withPrice = $request->withPrice;
        $newwithPrice = explode(',', $withPrice);

        $included = $request->included;
        $newincluded = explode(',', $included);

        $tours = $request->tours;
        $newtours = explode(',', $tours);

        $data = [
            'name' => $request->name,
            'timeAndNight' => $request->timeAndNight,
            'date' => $request->date,
            'listPrice' => serialize($newlistPrice),
            'withPrice' => serialize($newwithPrice),
            'departureDate' => $request->departureDate,
            'returnDate' => $request->returnDate,
            'flying' => $request->flying,
            'included' => serialize($newincluded),
            'tours' => serialize($newtours)
        ];

        if($request->file('headerImage') && $request->file('defaultImage')){
            $headerImage = $request->file('headerImage');
            $defaultImage = $request->file('defaultImage');
            
            $headerImageName = date('YmdHi').$headerImage->getClientOriginalName();
            $defaultImageName = date('YmdHi').$defaultImage->getClientOriginalName();

            //move image

            $headerImage->move(public_path('public/images'), $headerImageName);
            $defaultImage->move(public_path('public/images'), $defaultImageName);

            // add to data array

            $data['headerImage'] = $headerImageName;
            $data['defaultImage'] = $defaultImageName;
        }

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
