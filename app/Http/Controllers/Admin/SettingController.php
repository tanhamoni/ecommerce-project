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

        // ১. সাধারণ তথ্য
        $websiteSettings->phone = $request->phone;
        $websiteSettings->email = $request->email;
        $websiteSettings->address = $request->address;

        // ২. সোশ্যাল লিঙ্ক (ফাঁকা থাকলেও যেন Not Null Error না দেয়)
        $websiteSettings->facebook = $request->facebook ?? '';
        $websiteSettings->twitter = $request->twitter ?? '';
        $websiteSettings->youtube = $request->youtube ?? '';
        $websiteSettings->instagram = $request->instagram ?? '';

        // ৩. লোগো (নতুন ফাইল দিলে সেভ হবে, না দিলে আগেরটাই থাকবে)
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/settings'), $logoName);
            $websiteSettings->logo = asset('uploads/settings/' . $logoName);
        } else {
            $websiteSettings->logo = $websiteSettings->logo ?? '';
        }

        // ৪. হিরো ইমেজ (নতুন ফাইল দিলে সেভ হবে, না দিলে আগেরটাই থাকবে)
        if ($request->hasFile('hero_image')) {
            $hero = $request->file('hero_image');
            $heroName = time() . '_hero.' . $hero->getClientOriginalExtension();
            $hero->move(public_path('uploads/settings'), $heroName);
            $websiteSettings->hero_image = asset('uploads/settings/' . $heroName);
        } else {
            $websiteSettings->hero_image = $websiteSettings->hero_image ?? '';
        }

        // ৫. সেভ
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