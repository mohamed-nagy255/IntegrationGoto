<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WebinarService;

class WebinarController extends Controller
{
    protected $WebinarService;

    public function __construct(WebinarService $WebinarService)
    {
        $this->WebinarService = $WebinarService;
    }

    public function index()
    {
        $webinars = $this->WebinarService->getWebinars();
        return view('dashboard', compact('webinars'));
    }

    public function store(Request $request)
    {
        $data = [
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
            'startTime' => $request->input('startTime'),
            'endTime' => $request->input('endTime'),
        ];
        $createdWebinar = $this->goToMeetingService->createWebinar($data);
        return redirect()->route('dashboard')->with('success', 'DONE');
    }
}
