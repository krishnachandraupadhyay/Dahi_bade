<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $webpageController = new \App\Http\Controllers\WebpageController;
        $slides = $webpageController->getHeroData();
        $highlights = $webpageController->getHighlightsData();
        $welcome = $webpageController->getWelcomeData();
        return view('pages.home', compact('slides', 'highlights', 'welcome'));
    }

    public function story()
    {
        return view('pages.story');
    }

    public function menu()
    {
        return view('pages.menu');
    }

    public function franchise()
    {
        return view('pages.franchise');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function submitOrder(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Phone' => 'required|string|max:20',
            'Item' => 'nullable|string|max:100',
            'Quantity' => 'nullable|string|max:50',
            'Message' => 'nullable|string',
        ]);

        return redirect()->route('contact')->with('success', 'Thank you! Your order request has been received. Our team will get back to you shortly.');
    }

    public function submitFranchise(Request $request)
    {
        $validated = $request->validate([
            'Full_Name' => 'required|string|max:100',
            'Mobile_Number' => 'required|string|max:20',
            'Email_Address' => 'required|email|max:100',
            'City_State' => 'nullable|string|max:100',
            'Current_Business' => 'nullable|string|max:100',
            'Preferred_Investment_Range' => 'nullable|string|max:50',
            'Have_You_Identified_a_Location' => 'nullable|string|max:50',
            'Message' => 'nullable|string',
        ]);

        return redirect()->route('franchise')->with('success', 'Thank you! Your franchise enquiry has been submitted. Our team will contact you soon.');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Email' => 'required|email|max:100',
            'Phone' => 'nullable|string|max:20',
            'Message' => 'required|string',
        ]);

        return redirect()->route('contact')->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
