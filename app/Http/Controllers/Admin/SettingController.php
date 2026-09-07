<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\WebsitePolicy;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SettingController extends Controller
{
    public function websiteSettings()
    {
        // প্রথম রেকর্ড নেবে, না থাকলে ডাটাবেজে একটা খালি রেকর্ড তৈরি করে নেবে
        $websiteSettings = Setting::firstOrCreate([]);
        return view('admin.settings.website-settings', compact('websiteSettings'));
    }

    public function updateSettings(Request $request)
    {
        // নিশ্চিতভাবে ডাটাবেজের আইডি সহ রেকর্ড নিয়ে আসা
        $websiteSettings = Setting::firstOrCreate([]);

        $websiteSettings->phone = $request->phone;
        $websiteSettings->email = $request->email;
        $websiteSettings->address = $request->address;
        $websiteSettings->facebook = $request->facebook;
        $websiteSettings->twitter = $request->twitter;
        $websiteSettings->youtube = $request->youtube;
        $websiteSettings->instagram = $request->instagram;

        // Logo Upload via Cloudinary
        if ($request->hasFile('logo')) {
            $websiteSettings->logo = Cloudinary::upload(
                $request->file('logo')->getRealPath()
            )->getSecurePath();
        }

        // Hero Image Upload via Cloudinary
        if ($request->hasFile('hero_image')) {
            $websiteSettings->hero_image = Cloudinary::upload(
                $request->file('hero_image')->getRealPath()
            )->getSecurePath();
        }

        // পরিবর্তন ডাটাবেজে ফোর্স সেভ
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