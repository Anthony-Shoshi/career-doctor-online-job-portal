<?php

if ( ! function_exists('get_option')){
	function get_option($name, $optional = '') 
	{
		$setting = DB::table('settings')->where('name', $name)->get();
		if ( ! $setting->isEmpty() ) {
			return $setting[0]->value;
		}
		return $optional;

	}
}

if ( ! function_exists('get_logo')){
    function get_logo()
    {
        $logo = get_option("logo");
        if($logo == ''){
            return asset("public/upload/website/default-logo.png");
        }
        return asset("public/upload/website/$logo");
    }
}

