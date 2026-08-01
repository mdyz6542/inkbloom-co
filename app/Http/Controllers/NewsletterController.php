<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        Subscriber::firstOrCreate(
            ['email' => $request->email],
            ['subscribed_at' => now()]
        );

        if ($request->expectsJson()) {
            return response()->json(['message' => 'You\'re in! 🌸']);
        }

        return back()->with('newsletter_success', 'You\'re in! Check your inbox for a little welcome from us. 🌸');
    }
}
