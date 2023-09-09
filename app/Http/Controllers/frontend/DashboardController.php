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
        DB::beginTransaction();
        try{
            $query = "
                INSERT INTO users_tree (ancestor,descendant,depth)
                SELECT ancestor, {$node_id}, depth+1
                FROM users_tree
                WHERE descendant = {$parent_id}
                UNION ALL SELECT {$parent_id}, {$node_id}, 0";

            //connect parent to user in tree
            $tree = DB::insert($query);

            DB::table('users')->where('id', $node_id)->increment('level');
            if($parent_id != 0) {
                DB::table('users')->where('id', $parent_id)->increment('direct_downlines');
            }
        }catch (\Exception $e)
        {

            DB::rollback();
//            return redirect()->back()->with('error', 'OTP Re-send successfully');
        }
        DB::commit();

//        return redirect()->back()->with('success', $user_name. ' activation was successful!');
//        return redirect()->session()->flash('success', $user_name. ' activation was successful!');

    }
}
