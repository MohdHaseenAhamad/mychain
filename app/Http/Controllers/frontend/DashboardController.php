<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    var $_folder_name = 'frontend/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view($this->_folder_name.'index');
    }

    public function activateUser()
    {
        $node_id = auth()->user()->id;
        $parent_id = auth()->user()->parent_id;
        $user_name = auth()->user()->name;
        $parent_id = !empty($parent_id) ? $parent_id:0;
        DB::beginTransaction();
        try {
            $query = "
                INSERT INTO users_tree (ancestor,descendant,depth)
                SELECT ancestor, {$node_id}, depth+1
                FROM users_tree
                WHERE descendant = {$parent_id}
                UNION ALL SELECT {$node_id}, {$node_id}, 0";

            //connect parent to user in tree
            $tree = DB::insert($query);

            DB::table('users')->where('id', $node_id)->increment('level');
            if($parent_id != 0) {
                DB::table('users')->where('id', $parent_id)->increment('direct_downlines');
            }
        }
        catch (\Exception $e)
        {
            DB::rollback();
//            return redirect()->back()->with('error', 'OTP Re-send successfully');
        }
        DB::commit();

//        return redirect()->back()->with('success', $user_name. ' activation was successful!');
//        return redirect()->session()->flash('success', $user_name. ' activation was successful!');

    }
    public function getDownlines($level)
    {
        try{
            $theLevel = DB::table('users')
                ->select(DB::raw('users.*, users_tree.*'))
                ->where('users_tree.ancestor', '=', auth()->user()->id)
                ->where('users_tree.depth', '=', $level)
                ->join('users_tree', 'users.id', '=', 'users_tree.descendant')
                ->get()->toArray();
        }
        catch (\Exception $e)
        {
            dd($e);
        }


        return $theLevel;
    }
    public function matrix()
    {
        $level_one = $this->getDownlines(1);

        $level_two = $this->getDownlines(2);

        $level_three = $this->getDownlines(3);

        $level_four = $this->getDownlines(4);

        $level_five = $this->getDownlines(5);

        $level_six = $this->getDownlines(6);

        return view($this->_folder_name.'matrix')->with([
            'ones' => $level_one,
            'twos' => $level_two,
            'threes' => $level_three,
            'fours' => $level_four,
            'fives' => $level_five,
            'sixs' => $level_six,
        ]);
    }
    public function memberActive()
    {
        return view($this->_folder_name.'plan');
    }

}
