<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reward;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RewardController extends Controller
{
    public function index(){
        // SELECT Jurusan, COUNT(*) AS `num` FROM mahasiswa GROUP BY Jurusan
        $user = User::find(Auth::id());

        $userReward = $user->reports()->get();

        $rewardList = Reward::select('name', 'point')->where('user_id', null)->distinct()->get();

        $rewards= [];
        foreach($rewardList as $reward){
            $rewardItem = Reward::select('id', 'name', 'point')->where('user_id', null)->where('name', $reward['name'])->first();
            $rewards[] = $rewardItem;
        }
        // dd($userReward, $rewardList, $rewards);

        return view('reward.all')->with('rewards', $rewards);
    }

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

    public function show($name){
        $reward = Reward::select()->where('name', $name)->first();
        return view('detail')->with('reward', $reward);
    }

    public function update($id){
        $user = User::find(Auth::id());
        $reward = Reward::find($id);
        if($user->points >= $reward->point){
            $user->points -= $reward->point;
            $user->save();

            $user->rewards()->save($reward);

            return redirect('/reward');
        }
        else{
            return redirect()->back()->with('errors', 'Poin tidak cukup');
        }
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
