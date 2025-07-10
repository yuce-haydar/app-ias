<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSettings;
use Illuminate\Http\Request;

class ContactSettingsController extends Controller
{
    public function edit()
    {
        $settings = ContactSettings::getSettings();
        return view('admin.contact-settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'office_title' => 'required|string|max:255',
            'office_address' => 'required|string',
            'phone_title' => 'required|string|max:255',
            'phone_general' => 'required|string|max:255',
            'phone_fax' => 'nullable|string|max:255',
            'email_title' => 'required|string|max:255',
            'email_info' => 'required|email|max:255',
            'email_contact' => 'nullable|email|max:255',
            'working_hours_title' => 'required|string|max:255',
            'working_hours_weekday' => 'required|string|max:255',
            'working_hours_weekend' => 'required|string|max:255',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'map_embed_code' => 'nullable|string',
        ]);

        $settings = ContactSettings::getSettings();
        $settings->update($request->all());

        return redirect()->route('admin.contact-settings.edit')
            ->with('success', 'İletişim ayarları başarıyla güncellendi.');
    }
}
