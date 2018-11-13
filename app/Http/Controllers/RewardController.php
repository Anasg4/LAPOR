<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reward;

class RewardController extends Controller
{
    public function add(){
        return view('admin.reward.add');
    }

    public function store(Request $request){
        for($i=0;$i<$request['amount'];$i++){
            $reward = new Reward;
            $reward->id = $this->generateId();
            $reward->name = $request['name'];
            $reward->point = $request['point'];
            $reward->redeem_code = $this->generateRedeemCode();

            $reward->save();
        }
        return redirect('/admin');
    }

    private function generateId(){
        $char = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f'];
        $id = "";
        for($i=0;$i<6;$i++){
            $id = $id.$char[rand(0, 15)];
        }

        return $id;
    }

    private function generateRedeemCode(){
        $char = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        $code = "";
        for($i=0;$i<6;$i++){
            $code = $code.$char[rand(0, 35)];
        }

        return $code;
    }
}
