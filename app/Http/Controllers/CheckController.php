<?php
/**
 * This class is the AdditionalController class
 * 
 * PHP version 7.2
 * 
 * @category Vendor/Project
 * @package  Vendor/Project
 * @author   Sehinde Raji <sehinde@outlook.com>
 * @license  www.laravel.com Laravel
 * @link     Install this on your machine 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Check;
/**
 * This class is the AdditonalController class
 * 
 * PHP version 7.2
 * 
 * @category Vendor/Project
 * @package  Vendor/Project
 * @author   Sehinde Raji <sehinde@outlook.com>
 * @license  www.laravel.com Laravel
 * @link     Install this on your machine 
 */
class CheckController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request this is the request variable
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $check = new Check();
        //dd($request->get('check_items'));
      
        $items = implode(',', $request->get('check_items'));
        $check->check_items = $items;

        
        dd($check->save());

        return response()->json('Your values has been saved');


    }
}
