<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Enums\ReviewStatusEnum;
use App\Enums\ContactStatusEnum;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    function __construct()
    {
        $this->middleware(['check.admin.permission:message-list'], ['only' => ['allMessages', 'showMessage']]);
        $this->middleware(['check.admin.permission:message-read'], ['only' => ['markRead']]);
        $this->middleware(['check.admin.permission:message-unread'], ['only' => ['marUnRead']]);
        $this->middleware(['check.admin.permission:message-delete'], ['only' => ['destroyMessage']]);
        $this->middleware(['check.admin.permission:review-list'], ['only' => ['allReviews', 'showReview']]);
        $this->middleware(['check.admin.permission:review-view'], ['only' => ['markView']]);
        $this->middleware(['check.admin.permission:review-unview'], ['only' => ['marUnView']]);
        $this->middleware(['check.admin.permission:review-delete'], ['only' => ['destroyReview']]);
    }
    
    public function allMessages()
    {
        $messages = Contact::orderBy('created_at', 'DESC')->paginate();
        return view('web.admin.pages.contact.all_messages', compact('messages'));
    }

    public function showMessage(Contact $contact)
    {
        $status = ContactStatusEnum::cases();
        return view('web.admin.pages.contact.show_message', compact('contact', 'status'));
    }

    public function markRead(Contact $contact)
    {
        $contact->update([
            'status' => ContactStatusEnum::READ->value,
        ]);
        return back()->with('success', __('admin/contact/index.read_success'));
    }

    public function markUnRead(Contact $contact)
    {
        $contact->update([
            'status' => ContactStatusEnum::UNREAD->value,
        ]);
        return back();
    }

    public function destroyMessage(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', __('admin/contact/index.success'));
    }

    public function allReviews()
    {
        $reviews = ProductReview::orderBy('created_at', 'DESC')->with('product')->paginate();
        return view('web.admin.pages.contact.all_reviews', compact('reviews'));
    }

    public function showReview(ProductReview $review)
    {
        $status = ReviewStatusEnum::cases();
        return view('web.admin.pages.contact.show_review', compact('review', 'status'));
    }

    public function markView(ProductReview $review)
    {
        $review->update([
            'status' => ReviewStatusEnum::VIEW->value,
        ]);
        return back()->with('success', __('admin/contact/index.view_success'));
    }

    public function markUnView(ProductReview $review)
    {
        $review->update([
            'status' => ReviewStatusEnum::UNVIEW->value,
        ]);
        return back();
    }

    public function destroyReview(ProductReview $review)
    {
        $review->delete();
        return back()->with('success', __('admin/contact/index.success_review'));
    }
}
