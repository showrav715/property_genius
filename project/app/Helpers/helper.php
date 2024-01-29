<?php

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Currency;
use App\Models\Deposit;
use App\Models\Generalsetting;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\EmailTemplate;
use App\Models\Partner;
use App\Models\Withdraw;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

    if(!function_exists('globalCurrency')){
        function globalCurrency(){
            $currency = Session::get('currency') ?  DB::table('currencies')->where('id','=',Session::get('currency'))->first() : DB::table('currencies')->where('is_default','=',1)->first();
            return $currency;
        }
    }

    if(!function_exists('defaultCurrency')){
        function defaultCurrency(){
            $currency = DB::table('currencies')->where('is_default','=',1)->first();
            return $currency;
        }
    }

    if(!function_exists('showAmount')){
        function showAmount($price){
            $gs = Generalsetting::first();
            $currency = globalCurrency();

            $price = round(($price) * $currency->value,2);
            $price = number_format($price);
            if($gs->currency_format == 0){
                return $currency->sign. $price;
            }
            else{
                return $price. $currency->sign;
            }
        }
    }

    if(!function_exists('showAdminAmount')){
        function showAdminAmount($price){
            $gs = Generalsetting::first();
            $currency = Currency::where('is_default','=',1)->first();

            $price = round(($price) * $currency->value,2);
            if($gs->currency_format == 0){
                return $currency->name.' '. $price;
            }
            else{
                return $price.' '. $currency->name;
            }
        }
    }

    if(!function_exists('showBladeAdminAmount')){
        function showBladeAdminAmount($price){
            $gs = Generalsetting::first();
            $currency = Currency::where('is_default','=',1)->first();

            $price = round(($price) * $currency->value,2);
            return $price;
        }
    }

    if(!function_exists('showNameAmount')){
        function showNameAmount($amount){
            $gs = Generalsetting::first();
            $currency = globalCurrency();

            $price = round(($amount) * $currency->value,2);
            if($gs->currency_format == 0){
                return $currency->name.' '. $price;
            }
            else{
                return $price.' '. $currency->name;
            }
        }
    }

    if(!function_exists('showSignAmount')){
        function showSignAmount($amount){
            $gs = Generalsetting::first();
            $currency = globalCurrency();

            $price = round(($amount) * $currency->value,2);
            if($gs->currency_format == 0){
                return $currency->sign.' '. $price;
            }
            else{
                return $price.' '. $currency->sign;
            }
        }
    }


    if(!function_exists('convertedPrice')){
        function convertedPrice($price){
            $currency = DB::table('currencies')->where('is_default','=',1)->first();
            $gs = Generalsetting::first();

            $price = round(($price) * $currency->value,2);
            if($gs->currency_format == 0){
                return $currency->sign. $price;
            }
            else{
                return $price. $currency->sign;
            }
        }
    }

    if(!function_exists('baseCurrencyAmount')){
        function baseCurrencyAmount($amount){
            $currency = globalCurrency();
            return $amount/$currency->value;
        }
    }


    if(!function_exists('getAdmin')){
        function getAdmin(){
            return Admin::first();
        }
    }

    if(!function_exists('prefix')){
        function prefix(){
            $gs = GeneralSetting::first();
            return $gs->prefix != NULL ? $gs->prefix : 'admin';
        }
    }

    if(!function_exists('fileName')){
        function fileName($file){
            return Str::random(8).time().'.'.$file->getClientOriginalExtension();
        }
    }

    if(!function_exists('upload')){
        function upload($name,$file,$oldname)
        {
            $file->move('assets/images',$name);
            if($oldname != null)
            {
                if (file_exists(public_path().'/assets/images/'.$oldname)) {
                    unlink(public_path().'/assets/images/'.$oldname);
                }
            }
        }
    }

    function handleMakeImage($file,$resize_array=null,$ticket = false)
    {
        $image_name = imageNameValidation($file);
        $locaion = base_path('../assets/images/');

        $fileExts = ['pdf','doc','docx','csv'];
        if($ticket || in_array($file->getClientOriginalExtension(),$fileExts)){
            $locaion = base_path('../assets/ticket/');
            $file->move($locaion, $image_name);
        }else{
            if($resize_array){
                $image = Image::make($file)->resize($resize_array[0], $resize_array[1]);
               if ($file->getClientOriginalExtension() == 'gif') {
                    copy($file->getRealPath(), $locaion.'/'.$image_name);
                }
                else {
                   $image->save($locaion.'/'.$image_name);
                }
            }else{
                $image = Image::make($file);
                 if ($file->getClientOriginalExtension() == 'gif') {
                    copy($file->getRealPath(), $locaion.'/'.$image_name);
                }
                else {
                   $image->save($locaion.'/'.$image_name);
                }

            }
        }

        return $image_name;
    }


    function handleUpdateImage($file,$field,$resize_array=null)
    {
        $image_name = imageNameValidation($file);
        $locaion = base_path('../assets/images/');

        if($field && file_exists($locaion.$field)){
            unlink($locaion.$field);
        }
        if($resize_array){
            $image = Image::make($file)->resize($resize_array[0], $resize_array[1]);
            if ($file->getClientOriginalExtension() == 'gif') {
                copy($file->getRealPath(), $locaion.'/'.$image_name);
            }
            else {
               $image->save($locaion.'/'.$image_name);
            }
        }else{
            $image = Image::make($file);
            if ($file->getClientOriginalExtension() == 'gif') {
                copy($file->getRealPath(), $locaion.'/'.$image_name);
            }
            else {
               $image->save($locaion.'/'.$image_name);
            }
        }
        return $image_name;
    }


    function handleDeleteImage($field)
    {
        $locaion = base_path('../assets/images/');
        if($field && file_exists($locaion.$field)){
            unlink($locaion.$field);
        }
    }

    function imageNameValidation($image)
    {
       $extension = $image->getClientOriginalExtension();
       $old_name  = explode('.',$image->getClientOriginalName());
       $new_name = rand().time() . '.'. $extension;
       return $new_name;
    }

    function ExtensionValidation($image)
    {
       $extension = ['jpg','JPG','jpeg','JPEG','zip','pdg','csv','png','PNG','pdf','doc','docx','webp'];
       $image_extension = $image->getClientOriginalExtension();
       if(in_array($image_extension,$extension)){
           return true;
       }else{
           return false;
       }
    }

    function agentReview(){

    }


    function email($data){

        $gs = Generalsetting::first();

        if ($gs->is_smtp != 1) {
            $headers = "From: $gs->sitename <$gs->email_from> \r\n";
            $headers .= "Reply-To: $gs->sitename <$gs->email_from> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=utf-8\r\n";
            mail($data['email'], $data['subject'], $data['message'], $headers);
        }
        else {
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = $gs->smtp_host;
                $mail->SMTPAuth   = true;
                $mail->Username   = $gs->smtp_user;
                $mail->Password   = $gs->smtp_pass;
                if ($gs->smtp_encryption == 'ssl') {
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                } else {
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                }
                $mail->Port       = $gs->smtp_port;
                $mail->CharSet = 'UTF-8';
                $mail->setFrom($gs->from_email, $gs->from_name);
                $mail->addAddress($data['email'], $data['name']);
                $mail->addReplyTo($gs->from_email, $gs->from_name);
                $mail->isHTML(true);
                $mail->Subject = $data['subject'];
                $mail->Body    = $data['message'];
                $mail->send();
            } catch (Exception $e) {
                throw new Exception($e);
            }
        }
    }
