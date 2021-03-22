<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
class ReportController extends Controller
{


    public function index()
    {
        //return view("proje.stock");
        $data['report'] = Report::all()->where("silindiMi", 1);
        /*
        foreach (stock::all() as $stock) {
            echo $stock->ad;
        }*/
        return view("proje.report" , $data);
    }
}
