<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\WebsitePolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SettingController extends Controller
{
    public function websiteSettings()
    {
        $websiteSettings = Setting::firstOrCreate([]);
        return view('admin.settings.website-settings', compact('websiteSettings'));
    }

    public function updateSettings(Request $request)
    {
        $websiteSettings = Setting::firstOrCreate([]);

        $websiteSettings->phone = $request->phone;
        $websiteSettings->email = $request->email;
        $websiteSettings->address = $request->address;
        $websiteSettings->facebook = $request->facebook;
        $websiteSettings->twitter = $request->twitter;
        $websiteSettings->youtube = $request->youtube;
        $websiteSettings->instagram = $request->instagram;

        $cloudName = 'zazc3c7b';
        $uploadPreset = 'sjdi3oza';
        $cloudinaryUrl = "https://api.cloudinary.com/v1_1/{$cloudName}/image/upload";

        // Logo Upload
        if ($request->hasFile('logo')) {
            $response = Http::attach(
                'file', 
                file_get_contents($request->file('logo')->getRealPath()), 
                $request->file('logo')->getClientOriginalName()
            )->post($cloudinaryUrl, [
                'upload_preset' => $uploadPreset,
            ]);

            if ($response->successful()) {
                $websiteSettings->logo = $response->json()['secure_url'];
            }
        }

        // Hero Image Upload
        if ($request->hasFile('hero_image')) {
            $response = Http::attach(
                'file', 
                file_get_contents($request->file('hero_image')->getRealPath()), 
                $request->file('hero_image')->getClientOriginalName()
            )->post($cloudinaryUrl, [
                'upload_preset' => $uploadPreset,
            ]);

            if ($response->successful()) {
                $websiteSettings->hero_image = $response->json()['secure_url'];
            }
        }

        $websiteSettings->save();

        toastr()->success('Settings updated successfully.');
        return redirect()->back();
    }

    public function websitePolicy()
    {
        $policyDeta = WebsitePolicy::firstOrCreate([]);
        return view('admin.settings.website-policy', compact('policyDeta'));
    }

    public function updatePolicy(Request $request)
    {
        $policyDeta = WebsitePolicy::firstOrCreate([]);
        $policyDeta->privacy_policy = $request->privacy_policy;
        $policyDeta->terms_conditions = $request->terms_conditions;
        $policyDeta->refund_policy = $request->refund_policy;
        $policyDeta->payment_policy = $request->payment_policy;
        $policyDeta->about_us = $request->about_us;

        $policyDeta->save();

        toastr()->success('Policy updated successfully');
        return redirect()->back();
    }
}