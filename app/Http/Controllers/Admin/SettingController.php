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
        $websiteSettings = Setting::first();


        $websiteSettings->phone = $request->phone;
        $websiteSettings->email = $request->email;
        $websiteSettings->address = $request->address;
        $websiteSettings->facebook = $request->facebook;
        $websiteSettings->twitter = $request->twitter;
        $websiteSettings->youtube = $request->youtube;
        $websiteSettings->instagram = $request->instagram;


        if (isset($request->logo)) {
            if ($websiteSettings->logo && file_exists('admin/settings/' . basename($websiteSettings->logo))) {
                unlink('admin/settings/' . basename($websiteSettings->logo));
            }

            $image = $request->file('logo');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/settings', $imageName);

            $websiteSettings->logo = url('admin/settings/' . $imageName);
        }



        if (isset($request->hero_image)) {
            if ($websiteSettings->hero_image && file_exists('admin/settings/' . basename($websiteSettings->hero_image))) {
                unlink('admin/settings/' . basename($websiteSettings->hero_image));
            }

            $image = $request->file('hero_image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/settings', $imageName);

            $websiteSettings->hero_image = url('admin/settings/' . $imageName);
        }

        $websiteSettings->save();


        toastr()->success(' updated successfully.');
        return redirect()->back();
    }


    public function websitePolicy()
    {
        $policyDeta = WebsitePolicy::first();
        return view('admin.settings.website-policy');
    }

    public function updatePolicy(Request $request)
    {
        $policyDeta = WebsitePolicy::first();
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
