<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Site\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function index()
    {
        return view('web.site.pages.contact');
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());
        return back()->with('success', __('site/home/nav.success_msg'));
    }
}
