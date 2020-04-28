<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

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
