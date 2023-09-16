<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $activationFee = 3000;

    public $referralBonus = 1000;

    public $adminPayment = 500;


    public $level1Payment = 1500;
    public $level2Payment = 2500;
    public $level3Payment = 5000;
    public $level4Payment = 16000;
    public $level5Payment = 56000;
    public $level6Payment = 350000;
}
