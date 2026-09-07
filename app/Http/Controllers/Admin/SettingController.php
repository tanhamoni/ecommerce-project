<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\WebsitePolicy;
use Illuminate\Http\Request;
use Cloudinary\Api\Upload\UploadApi;

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

        // Direct Cloudinary Upload Configuration
        $options = [
            'cloud' => [
                'cloud_name' => 'zazc3c7b',
                'api_key'    => '239595857632991',
                'api_secret' => '5kzAiJfZ91WpO5xw8-yULKs5SBg',
            ]
        ];

        $uploadApi = new UploadApi();

        // Logo Upload
        if ($request->hasFile('logo')) {
            $uploadedLogo = $uploadApi->upload(
                $request->file('logo')->getRealPath(),
                $options
            );
            $websiteSettings->logo = $uploadedLogo['secure_url'];
        }

        // Hero Image Upload
        if ($request->hasFile('hero_image')) {
            $uploadedHero = $uploadApi->upload(
                $request->file('hero_image')->getRealPath(),
                $options
            );
            $websiteSettings->hero_image = $uploadedHero['secure_url'];
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