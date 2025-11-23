<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'version' => 'v1',
            'cards' => [
                ['title' => 'Новые клиенты', 'value' => 12],
                ['title' => 'Заказы сегодня', 'value' => 37],
                ['title' => 'Доход за месяц', 'value' => '18 500'],
            ],
        ]);
    }

    public function clients(Request $request)
    {
        return response()->json([
            'data' => [
                ['id' => 1, 'name' => 'ООО Ромашка'],
                ['id' => 2, 'name' => 'ИП Иванов'],
            ],
        ]);
    }

    public function orders(Request $request)
    {
        return response()->json([
            'data' => [
                ['id' => 101, 'status' => 'new', 'total' => 500],
                ['id' => 102, 'status' => 'done', 'total' => 1200],
            ],
        ]);
    }
}
