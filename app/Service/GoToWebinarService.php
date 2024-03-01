<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class GoToWebinarService
{
    public function createWebinar($request, $webinarData)
    {
        $requestData = [
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
            'startTime' => $request->input('startTime'),
            'endTime' => $request->input('endTime'),
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GOTO_APP_SECRET'),
            'Content-Type' => 'application/json',
        ])->post('https://api.getgo.com/G2W/rest/v2/organizers/{organizerKey}/webinars', $requestData);

        return $response->json();
    }

    public function getWebinars()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer' . env('GOTO_APP_KEY'),
            'Content-Type' => 'application/json',
        ])->get('https://api.getgo.com/G2W/rest/v2/organizers/{organizerKey}/webinars');
        return $response->json();
    }
}
