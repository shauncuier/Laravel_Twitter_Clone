<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     return view('welcome');
    // }


    public function index(){
        $user = [
            [
                'name'=> 'Alex',
                'age'=> 16
            ],
            [
                'name'=> 'Dan',
                'age'=> 30
            ],
            [
                'name'=> 'jon',
                'age'=> 17
            ]
            ];
            return view('dashboard',
        [
            'users' =>$user
        ]);
    }
}
