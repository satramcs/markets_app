<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['markets'] = Market::select('currency')->get();
        return view('home', $data);
    }

    public function get_pairs(){
        $markets = Market::select('currency', 'second_currency')->get();
            $all_markets = [];
        if(!empty($markets)){
            foreach ($markets as $value) {
                $all_markets[] = "2~Coinbase~$value->currency~$value->second_currency";
            }
        }
        return response()->json($all_markets);
    }
}
