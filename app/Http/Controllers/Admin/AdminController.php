<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use DB;

Class AdminController extends BaseController
{
    public function index()
    {
        $actions = DB::table('admin_actions')->pluck('action', 'alias');
        return response()->json(['message' => $actions]);
    }
}
