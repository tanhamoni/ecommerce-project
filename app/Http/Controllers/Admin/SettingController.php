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
        $websiteSettings = Setting::first();
        return view('admin.settings.website-settings', compact('websiteSettings'));
    }

    public function updateSettings(Request $request)
    {
        $websiteSettings = Setting::first() ?? new Setting();

        $websiteSettings->phone = $request->phone;
        $websiteSettings->email = $request->email;
        $websiteSettings->address = $request->address;
        $websiteSettings->facebook = $request->facebook;
        $websiteSettings->twitter = $request->twitter;
        $websiteSettings->youtube = $request->youtube;
        $websiteSettings->instagram = $request->instagram;

        // আপলোড ফোল্ডারের পাথ সেট এবং ফোল্ডার না থাকলে তৈরি করা
        $destinationPath = public_path('admin/settings');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        // Logo Upload
        if ($request->hasFile('logo')) {
            if ($websiteSettings->logo) {
                $oldLogo = public_path('admin/settings/' . basename($websiteSettings->logo));
                if (file_exists($oldLogo) && is_file($oldLogo)) {
                    @unlink($oldLogo);
                }
            }

            $image = $request->file('logo');
            $imageName = time() . '_logo.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);

            $websiteSettings->logo = asset('admin/settings/' . $imageName);
        }

        // Hero Image Upload
        if ($request->hasFile('hero_image')) {
            if ($websiteSettings->hero_image) {
                $oldHero = public_path('admin/settings/' . basename($websiteSettings->hero_image));
                if (file_exists($oldHero) && is_file($oldHero)) {
                    @unlink($oldHero);
                }
            }

            $image = $request->file('hero_image');
            $imageName = time() . '_hero.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);

            $websiteSettings->hero_image = asset('admin/settings/' . $imageName);
        }

        $websiteSettings->save();

        toastr()->success('Settings updated successfully.');
        return redirect()->back();
    }

    public function websitePolicy()
    {
        $policyDeta = WebsitePolicy::first();
        return view('admin.settings.website-policy', compact('policyDeta'));
    }

    public function updatePolicy(Request $request)
    {
        $policyDeta = WebsitePolicy::first() ?? new WebsitePolicy();
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