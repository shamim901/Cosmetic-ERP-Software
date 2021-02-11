<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use App\Helpers\Frontend\Auth\Socialite;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
         return view('frontend.auth.login-bulma')
            ->withSocialiteLinks((new Socialite())->getSocialLinks());

        // $settingData = Setting::first();
        // $google_analytics = $settingData->google_analytics;

        // return view('frontend.index', compact('google_analytics', $google_analytics));
    }

    public function faqs()
    {
        return view('frontend.faqs');
    }

    public function contacts()
    {
        return view('frontend.contacts');
    }

    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);

        return view('frontend.pages.index')
            ->withpage($result);
    }
}
