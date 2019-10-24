<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function generalSettings() {
        $setting = Setting::all()->first();
        return view('admin.settings.generalSettings')->with('setting', $setting);
    }

    public function updateGeneralSettings(Request $request) {
        if ($request->all() == null){
            return view('admin.settings.generalSettings');
        } else {
            foreach ($request->except('_token') as $key => $value) {
                if ($key != '' && $value != '') {
                    $data = array();
                    $data['value'] == is_array($value) ? serialize($value) : $value;
                    $data['updated_at'] = Carbon::now();
                    if ($request->hasFile($key)) {
                        $image = $request->file($key);
                        $name = $key . '.' .$image->getClientOriginalExtension();
                        $path = public_path('/upload/website/');
                        if($key == 'logo'){
                            $name = 'logo.png';
                            \Image::make($image)->resize(175, 50)->save($path . $name);
                        }else{
                            $image->move($path, $name);
                        }
                        $data['value'] = $name;
                        $data['updated_at'] = Carbon::now();
                    }
                    if(Setting::where('name', $key)->exists()) {
                        Setting::where('name','=',$key)->update($data);
                    } else {
                        $data['name'] = $key;
                        $data['created_at'] = Carbon::now();
                        Setting::insert($data);
                    }
                }
            }
            if(! $request->ajax()){
                return redirect('/generalSettings')->with('success', 'Settings updated successfully!');
            }else{
                return response()->json(['result' => 'success', 'message' =>'Settings updated successfully!']);
            }
        }

    }

}
