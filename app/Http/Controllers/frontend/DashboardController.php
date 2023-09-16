<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Coinremitter\Coinremitter;
use App\Models\Transaction;
use App\Models\Wallet;

class DashboardController extends Controller
{
    var $_folder_name = 'frontend/';
    var $_api_key ='EK4WHQJ-WJ04B3S-PWRN6ME-E55Z8ZX';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


$curl = curl_init();
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => 'https://api.nowpayments.io/v1/status',
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => '',
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 0,
//            CURLOPT_FOLLOWLOCATION => true,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => 'GET',
//        ));

//        curl_setopt_array($curl, array(
//            CURLOPT_URL => 'https://api.nowpayments.io/v1/currencies?fixed_rate=true',
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => '',
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 0,
//            CURLOPT_FOLLOWLOCATION => true,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => 'GET',
//            CURLOPT_HTTPHEADER => array(
//                'x-api-key: '.$this->_api_key
//            ),
//        ));


//curl_setopt_array($curl, array(
//    CURLOPT_URL => 'https://api.nowpayments.io/v1/balance',
//    CURLOPT_RETURNTRANSFER => true,
//    CURLOPT_ENCODING => '',
//    CURLOPT_MAXREDIRS => 10,
//    CURLOPT_TIMEOUT => 0,
//    CURLOPT_FOLLOWLOCATION => true,
//    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//    CURLOPT_CUSTOMREQUEST => 'GET',
//    CURLOPT_HTTPHEADER => array(
//        'x-api-key: EK4WHQJ-WJ04B3S-PWRN6ME-E55Z8ZX'
//    ),
//));

//$response = curl_exec($curl);
//
//curl_close($curl);
//echo $response;die;


//        curl_setopt_array($curl, array(
//            CURLOPT_URL => 'https://api.nowpayments.io/v1/payment',
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => '',
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 0,
//            CURLOPT_FOLLOWLOCATION => true,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => 'POST',
//            CURLOPT_POSTFIELDS =>'{
//  "price_amount": 3999.5,
//  "price_currency": "usd",
//  "pay_currency": "doge",
//  "ipn_callback_url": "https://nowpayments.io",
//  "order_id": "RGDBP-21314",
//  "order_description": "Apple Macbook Pro 2019 x 1"
//}',
//            CURLOPT_HTTPHEADER => array(
//                'x-api-key: EK4WHQJ-WJ04B3S-PWRN6ME-E55Z8ZX',
//                'Content-Type: application/json'
//            ),
//        ));
//
//        $response = curl_exec($curl);
//
//        curl_close($curl);
//        echo $response;die;


//        $btc_wallet = new Coinremitter('DOGE');
//        $param = ['amount'=>1000,'address'=>'bnb165q9dz39mqh789zuuuqwkv22plut6f4nzy9jc9','merchant_id'=>'64ff358cdbf17f3fa003062a'];
//
//        $balance = $btc_wallet->get_transaction_by_address($param);
//        dd($balance);
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
            if($parent_id != 0)
            {
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
    public function pay($parent, $levelPayment, $type ) {

        if($wallet = Wallet::where('user_id',  $parent->id)->first()) {
            $amount =  $wallet->amount + $levelPayment;
            $wallet->amount = $amount;
            $wallet->save();

            Transaction::create(['user_id' => $parent->id,
                'amount' => $levelPayment, 'type'=> $type, 'status' => 'successful']);
        }else {

            $amount =  $levelPayment;
            Wallet::create(['user_id' =>  $parent->id, 'amount' => $levelPayment]);

            Transaction::create(['user_id' => $parent->id,
                'amount' => $amount, 'type'=> $type, 'status' => 'successful']);
        }
    }

    public function verify(Request $request)
    {

        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
//        $url = 'https://api.paystack.co/transaction/verify/'. $reference;

//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt(
//            $ch, CURLOPT_HTTPHEADER, [
//                'Authorization: Bearer '. env('PAYSTACK_SECRET_KEY')]
//        );
//        $request = curl_exec($ch);
//        if(curl_error($ch)){
//            echo 'error:' . curl_error($ch);
//        }
//        curl_close($ch);
//
//        if ($request) {
//            $result = json_decode($request, true);
//        }

//        if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success'))
        if(true)
        {
            $paid_amount = $request->amount;
            // return response()->json($result['data']);
            if(auth()->user()->level < 1) {

                // return response()->json($result['data']);
                if($this->onlinePaymentActivate($paid_amount))
                {
                    return redirect()->back()->with('error', 'OTP Re-send successfully');
                }

            }else {
                if($this->upgradeOnlinePayment($paid_amount))
                {
                    return redirect()->back()->with('error', 'OTP Re-send successfully');
                }
            }

        }else {

        }

    }
    public function onlinePaymentActivate( $paid_amount)
    {

        if($paid_amount < $this->activationFee)
        {

            return false;
        }



        $user = DB::table('users')->where('id', auth()->user()->id)->first();

        $node_id = $user->id;

        DB::beginTransaction();

        try {

            if($node_id == 100000012) {
                $parent_id = 0;
            }else {
                $parent = DB::table('users')->where('id', auth()->user()->parent_id)->first();

                $type = "Referral Bonus";

                $this->pay($parent, $this->referralBonus, $type);

                $parent_id =  auth()->user()->parent_id;
            }


            $query = "
                INSERT INTO users_tree (ancestor,descendant,depth)
                SELECT ancestor, {$node_id}, depth+1
                FROM users_tree
                WHERE descendant = {$parent_id}
                UNION ALL SELECT {$node_id}, {$node_id}, 0";
dd($query);
            //connect parent to user in tree
            $tree = DB::statement($query);
            //update users parent id field
            DB::table('users')
                ->where('id', $node_id)
                ->update(['parent_id' => $parent_id]);

            DB::table('users')->where('id', $node_id)->increment('level');

            //increment downline count
            if($parent_id != 0) {

                DB::table('users')->where('id', $parent_id)->increment('direct_downlines');

                $realParent =  DB::table('users')->where('id', $parent_id)->first();

                $type = "Level 1 Benefits";

                $this->pay($realParent, $this->level1Payment, $type);

            }//end if

            $ghost =  DB::table('users')->where('id', 1)->first();

            $type = "Registration Fee";

            $this->pay($ghost, $this->adminPayment, $type);

            DB::table('users')
                ->where('id', $node_id)
                ->update(['activated' => 'yes',
                    'activated_by' => auth()->user()->id, 'activated_at' => DB::raw('now()')
                ]);

        } catch (\Exception $e) {
            // ignore everything if there is an error
            DB::rollback();

            //return response()->json($e->getMessage());
            return false;
            // something went wrong
        }

        //everything is good: hit the database with changes
        DB::commit();

        return true;


    }
    public function upgradeOnlinePayment( $paid_amount) {


        $level = auth()->user()->level + 1;


        if($paid_amount < $this->levelAmount($level))
        {
            return false;
        }

        DB::beginTransaction();
        try{

            if($level == 2) {

                $parent = $this->getWhoToPay(auth()->user()->id, 2);
                // return response()->json($parent);

                $type = "Level 2 Benefits";

                $this->pay($parent, $this->level2Payment, $type);

                $type = "Level 2 Upgrade Fee (Card)";

                $this->record(auth()->user()->id, $this->level2Payment, $type);


                DB::table('users')->where('id', $parent->id)->increment('two');

                DB::table('users')->where('id',auth()->user()->id)->increment('level');

            }
            if($level == 3) {
                $parent = $this->getWhoToPay(auth()->user()->id, 3);

                $type = "Level 3 Benefits";

                $this->pay($parent, $this->level3Payment, $type);

                $type = "Level 3 Upgrade Fee (Card)";

                $this->record(auth()->user()->id, $this->level3Payment, $type);

                DB::table('users')->where('id', $parent->id)->increment('three');

                DB::table('users')->where('id', auth()->user()->id)->increment('level');

            }
            if($level == 4) {
                $parent = $this->getWhoToPay(auth()->user()->id, 4);

                $type = "Level 4 Benefits";

                $this->pay($parent, $this->level4Payment, $type);

                $type = "Level 4 Upgrade Fee (Card)";

                $this->record(auth()->user()->id, $this->level4Payment, $type);

                DB::table('users')->where('id', $parent->id)->increment('four');

                DB::table('users')->where('id', auth()->user()->id)->increment('level');

            }

            if($level == 5) {
                $parent = $this->getWhoToPay(auth()->user()->id, 5);

                $type = "Level 5 Benefits";

                $this->pay($parent, $this->level5Payment, $type);

                $type = "Level 5 Upgrade Fee(Card)";

                $this->record(auth()->user()->id, $this->level5Payment, $type);


                DB::table('users')->where('id', $parent->id)->increment('five');

                DB::table('users')->where('id', auth()->user()->id)->increment('level');

            }

            if($level == 6) {
                $parent = $this->getWhoToPay(auth()->user()->id, 6);

                $type = "Level 6 Benefits";

                $this->pay($parent, $this->level6Payment, $type);

                $type = "Level 6 Upgrade Fee (Card)";

                $this->record(Auth::id(), $this->level6Payment, $type);

                DB::table('users')->where('id', $parent->id)->increment('six');

                DB::table('users')->where('id', Auth::id())->increment('level');

            }

        }catch (\Exception $e) {
            // ignore everything if there is an error
            DB::rollback();

            return false;

            // something went wrong
        }

        DB::commit();


        return true;

    }
    public function getWhoToPay($id, $level)
    {
        if($level == 2){
            $col = 'users.two';
            $count = 4;
        }else if($level == 3){
            $col = 'users.three';
            $count = 8;
        }else if($level == 4)
        {
            $col = 'users.four';
            $count = 16;
        }else if($level == 5){
            $col = 'users.five';
            $count = 32;
        }else if($level == 6){
            $col = 'users.six';
            $count = 64;
        }

        $parent = DB::table('users')
            ->select(DB::raw('users.*, users_tree.*'))
            ->where('users_tree.descendant', '=', $id)
            ->where('users_tree.depth', '=', ($level-1))
            ->join('users_tree', 'users.id', '=', 'users_tree.ancestor')
            ->where('users.level', '>=', $level)
            ->where($col, '<', $count)
            ->first();



        if(!$parent) {

            $parent = DB::table('users')
                ->select(DB::raw('users.*, users_tree.*'))
                ->where('users_tree.descendant', '=', $id)
                ->where('users_tree.depth', '>', ($level-1))
                ->join('users_tree', 'users.id', '=', 'users_tree.ancestor')
                ->where('users.level', '>=', $level)
                ->where($col, '<', $count)
                ->latest('activated_at')
                ->first();

            if(!$parent) {
                $parent = DB::table('users')->where('id', 1)->first();
                return $parent;

            }

            return $parent;


        }

        return $parent;


    }

    public function levelAmount($level)
    {
        if($level == 2)
        {
            return $this->level2Payment;
        }else if($level == 3){
            return $this->level3Payment;
        }else if($level == 4){
            return $this->level4Payment;
        }else if($level == 5){
            return $this->level5Payment;
        }else if($level == 6){
            return $this->level6Payment;
        }
    }
    public function record($id, $amount, $type)
    {
        Transaction::create(['user_id' => $id,
            'amount' => $amount, 'type'=> $type, 'status' => 'successful']);

    }


}
