<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TasksModel;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.index');
    }
     public function SuperUser(Request $request)
    {
        return view('superuser.index');
    }

        public function adminHome(Request $request)
    {
        return view('admin.index');
    }

        public function tutorHome(Request $request)
    {
        return view('tutor.index');
    }

        public function clientHome(Request $request)
    {
       // return view('client.index');

        $data = DB::table('tasks')->paginate(20);


      return view('client.index', ['tasks' => $data]);
    }

    public function testing ()
    {
         //$data = DB::table('tasks')->paginate(20);

        return view('client.date-test');

    }
}
