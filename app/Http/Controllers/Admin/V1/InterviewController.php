<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\PublicController;
use App\Http\Requests\ExchangeRequest;

class InterviewController extends PublicController
{
    public function exchange(ExchangeRequest $request)
    {
        $rate = $this->getRate();

        $exchangedAmount = number_format(round($rate['currencies'][$request->source][$request->target] * $request->amount, 2), 2);

        return response(["msg" => "success", "amount" => $exchangedAmount]);

    }

    public function getRate()
    {
        $path = storage_path('app/public/rate.json');
        $json = json_decode(file_get_contents($path), true);
        return $json;
    }
}
