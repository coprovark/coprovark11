<?php

namespace App\Http\Controllers;
//เรียกใช้
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //สืบทอดคุณสมบัติ

class PageController extends Controller
{
    public function show(Request $request)
    {
        $txt_name = $request->input('name');
        $txt_hidden = $request->input('hidden');
        $txt_radio = $request->input('radio');
        $txt_checkbox = $request->input('checkbox');

        $array = [
            "NAME"  => $txt_name,
            "ID"    => $txt_hidden,
            "GEN"   => $txt_radio,
            "ACCENT" => $txt_checkbox
        ];
        return view('page.page1',$array);
        //echo "Name : ".$txt_name.'<br>'."ID : ".$txt_hidden.'<br>'."Gender : ".$txt_radio.'<br>'."Accept : ".$txt_checkbox;
        //return $radio;
    }
    public function show2(Request $request)
    {
        $txt_pass = $request->input('pass');
        $txt_selec = $request->input('selec');
        $txt_area = $request->input('area');

        $array = [
            "PASS"  => $txt_pass,
            "SELEC"    => $txt_selec,
            "AREA"   => $txt_area
        ];
        return view('page.page3',$array);
    }
}