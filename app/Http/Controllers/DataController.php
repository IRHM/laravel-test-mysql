<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as Controller;

class DataController extends Controller {

  public function delete($id)
  {
    DB::table('FCSTMR_Type')->delete($id);
  }

  public function create(Request $request)
  {
    $validator = $request->validate([
      'type' => 'required|max:2',
      'name' => 'required|max:30',
      'magento_id' => 'required|integer|max:10'
    ]);

    try {
      DB::table('FCSTMR_Type')->insert([
        'type' => $request->input('type'),
        'NAME' => $request->input('name'),
        'magento_id' => $request->input('magento_id'),
      ]);

      return redirect()->intended('/');
    } catch(\Illuminate\Database\QueryException $ex) { 
      $msg = "Could not insert entry into the database";

      switch ($ex->getCode()) {
        case 23000:
          $msg = "Duplicate type";
          break;
      }

      return redirect()->intended('/')->withErrors(["db" => $msg]);
    }
  }
}