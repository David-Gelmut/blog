<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\User;

class CreateController extends Controller
{
   public function __invoke()
   {
       return view('admin.categories.create');
   }
}
