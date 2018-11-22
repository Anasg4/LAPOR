<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reward;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class RewardController extends Controller
{
    public function index(){

        $user = User::find(Auth::id());        
        $user->laporan = count($user->reports()->get());       
        $userReward = $user->rewards()->get();
        $rewardList = Reward::select('name', 'point')->where('user_id', null)->distinct()->get();
        $rewards= [];
        foreach($rewardList as $reward){
            $rewardItem = Reward::select('id', 'name', 'point', 'image', 'description')->where('user_id', null)->where('name', $reward['name'])->first();
            $rewards[] = $rewardItem;
        }        

        return view('reward.all')->with(compact('rewards', 'user', 'userReward'));
    }    

    public function add(){
        $user = User::find(Auth::id());       
        $rewardList = Reward::select('name', 'point')->where('user_id', null)->distinct()->get();
        $rewards= [];
        foreach ($rewardList as $reward) {
            $rewardItem = Reward::select('id', 'name', 'point', 'image', 'description')->where('user_id', null)->where('name', $reward['name'])->first();
            $rewards[] = $rewardItem;
        }
        return view('admin.reward.add')->with(compact('rewards', 'user'));
    }

    public function store(Request $request){
        $filename = explode('.', $request->image->getClientOriginalName());
        $fileExt = end($filename);
        $id = $this->generateId();
        
        $path = Storage::putFileAs(
            'public/voucher', $request->file('image'), $id.'.'.$fileExt
        );

        for($i=0;$i<$request['amount'];$i++){
            $reward = new Reward;
            $reward->id = $this->generateId();
            $reward->name = $request['name'];
            $reward->point = $request['point'];
            $reward->redeem_code = $this->generateRedeemCode();
            $reward->image = $id.'.'.$fileExt;
            $reward->description = $request['description'];

            $reward->save();
        }
        return redirect('/admin/reward/add');
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

    public function delete($name){
        $rewards =  Reward::where('user_id', null)->where('name', $name)->delete();        
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
