<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\WebsitePolicy;
use Illuminate\Http\Request;

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

        // সাধারণ তথ্য ও সোশ্যাল লিঙ্ক সেভ
        $websiteSettings->phone = $request->phone;
        $websiteSettings->email = $request->email;
        $websiteSettings->address = $request->address;
        $websiteSettings->facebook = $request->facebook;
        $websiteSettings->twitter = $request->twitter;
        $websiteSettings->youtube = $request->youtube;
        $websiteSettings->instagram = $request->instagram;

        // ছবির টেক্সট লিঙ্ক সেভ (ফাইল আপলোডের জটিলতা ছাড়া)
        $websiteSettings->logo = $request->logo;
        $websiteSettings->hero_image = $request->hero_image;

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