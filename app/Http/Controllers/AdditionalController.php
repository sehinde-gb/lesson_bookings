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
class AdditionalController extends Controller
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

        $additional = new Additional;
        $items = implode(',', $request->get('add_lessons'));
        $additional->add_lessons = $items;

        $additional->save();

        return response()->json('Your values has been saved');


    }
}
