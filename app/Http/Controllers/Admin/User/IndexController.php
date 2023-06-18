<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class indexController extends Controller
{
   public function __invoke()
   {
       $users=User::all();
       return view('admin.users.index',['users'=>$users]);
   }
}
