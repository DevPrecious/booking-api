<?php

function imageUpload($headerImagePassed, $defaultImagePassed)
{
    if ($headerImagePassed && $defaultImagePassed) {
        $headerImage = $headerImagePassed;
        $defaultImage = $defaultImagePassed;

        $headerImageName = date('YmdHi') . $headerImage->getClientOriginalName();
        $defaultImageName = date('YmdHi') . $defaultImage->getClientOriginalName();

        //move image

        $headerImage->move(public_path('public/images'), $headerImageName);
        $defaultImage->move(public_path('public/images'), $defaultImageName);

        return [
            'headerImage' => $headerImageName,
            'defaultImage' => $defaultImageName,
        ];
    }
}


function convertToArray(String $toarray)
{
    return explode(',', $toarray);
}

function dataToSave($name, $timeAndNight, $date, $newlistPrice, $newwithPrice, $departureDate, $returnDate, $flying, $newincluded, $newtours)
{
    return [
        'name' => $name,
        'timeAndNight' => $timeAndNight,
        'date' => $date,
        'listPrice' => serialize($newlistPrice),
        'withPrice' => serialize($newwithPrice),
        'departureDate' => $departureDate,
        'returnDate' => $returnDate,
        'flying' => $flying,
        'included' => serialize($newincluded),
        'tours' => serialize($newtours),
    ];
}
