<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\GoToWebinarService;

class WebinarController extends Controller
{
    protected $goToWebinarService;

    public function __construct(GoToWebinarService $goToWebinarService)
    {
        $this->goToWebinarService = $goToWebinarService;
    }

    public function index()
    {
        $webinars = $this->goToWebinarService->getWebinars();
        return view('dashboard', compact('webinars'));
    }

    public function createWebinar(Request $request)
    {        
        $webinarData = $request->all(); 
        $response = $this->goToWebinarService->createWebinar($request, $webinarData);
        return redirect()->route('dashboard')->with('success', 'Creatted Success');
    }
}
