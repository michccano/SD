<?php

namespace App\Http\Controllers;

class SportsListController extends Controller
{
    public function index()
    {
        return view('sports.all-sports');
    }

    public function showLeagues()
    {
        return view('sports.single-sport', ['sport' => "Leagues"]);
    }

    public function showNfl()
    {
        return view('sports.single-sport', ['sport' => "NFL"]);
    }

    public function showBasketball()
    {
        return view('sports.single-sport', ['sport' => "Basketball"]);
    }

    public function showBaseball()
    {
        return view('sports.single-sport', ['sport' => "Baseball"]);
    }

    public function showFighting()
    {
        return view('sports.single-sport', ['sport' => "Fighting"]);
    }

    public function showHockey()
    {
        return view('sports.single-sport', ['sport' => "Hockey"]);
    }

    public function showSoccer()
    {
        return view('sports.single-sport', ['sport' => "Soccer"]);
    }
}
