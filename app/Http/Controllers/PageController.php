<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Services\ServiceBlockService;
use Illuminate\Http\Request;
use Mail;

class PageController extends Controller
{
    public function getHome()
    {
        $serviceBlockService = new ServiceBlockService();

        return view('pages.home', [
            'serviceBlocks' => $serviceBlockService->getServiceBlocks()
        ]);
    }

    public function getServices()
    {
        $serviceBlockService = new ServiceBlockService();

        return view('pages.services', [
            'serviceBlocks' => $serviceBlockService->getServiceBlocks()
        ]);
    }

    public function getServicePage($page)
    {
        if (!view()->exists('pages.services.' . $page)) {
            abort(404);
        }

        return view('pages.services.' . $page);
    }

    public function getResellers()
    {
        return view('pages.resellers');
    }

    public function getReviews()
    {
        return view('pages.reviews');
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(ContactRequest $request)
    {
        // Send email
        Mail::send(new ContactMail(
                $request->get('name'),
                $request->get('email'),
                $request->get('contactMessage')
            ));

        return response()->json([
            'msg' => 'The message was sent successfully'
        ], 200);
    }
}
