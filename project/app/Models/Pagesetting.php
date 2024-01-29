<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function GuzzleHttp\json_decode;

class Pagesetting extends Model
{
    protected $fillable = [
        'contact_success',
        'contact_email',
        'contact_title',
        'contact_text',
        'street',
        'phone',
        'email',
        'site',
        'phone_code',
        'login_banner',
        'login_title',
        'login_subtitle',
        'side_title',
        'side_text',
        'review_blog',
        'pricing_plan',
        'plan_title',
        'plan_subtitle',
        'explore_psub',
        'explore_ptitle',
        'location_title',
        'location_subtitle',
        'feature_ptitle',
        'feature_psub',
        'download_title',
        'download_subtitle',
        'download_text',
        'download_photo',
        'google_play_link',
        'app_store_link',
        'footer_top_photo',
        'footer_top_title',
        'footer_top_text',
        'banner_title',
        'banner_subtitle',
        'hero_photo',
        'referral_percentage',
        'call_title',
        'call_subtitle',
        'call_button',
        'call_button_link',
        'call_bg',
        'review_title',
        'review_subtitle',
        'review_bg',
        'review_photo',
        'blog_title',
        'blog_subtitle',
        'latitude',
        'longitude',
        'home_module',
    ];

    public $timestamps = false;

    public function upload($name,$file,$oldname)
    {
        $file->move('assets/images',$name);
        if($oldname != null)
        {
            if (file_exists(public_path().'/assets/images/'.$oldname)) {
                unlink(public_path().'/assets/images/'.$oldname);
            }
        }
    }

    public function homeModuleCheck($value)
    {
        $sections = json_decode($this->home_module,true);
        if (in_array($value, $sections)){
            return true;
        }else{
            return false;
        }
    }

}
