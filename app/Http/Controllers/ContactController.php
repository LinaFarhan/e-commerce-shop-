<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|max:500',
        ]);

        // ممكن هنا تحفظ الرسالة بجدول أو ترسلها بإيميل
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
