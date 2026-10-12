<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\dep_ag;
use App\stock_cur;
use App\stock_in;
use App\Models\User;
use DB;

class InController extends Controller
{
  
    public function In(){
        $stock_in =stock_in::orderBy('idIn', 'desc')->get();
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('listeIn',['stock_in'=>$stock_in,'data'=>$data]);
    }
    public function menu(){
       // $stock_in =stock_in::orderBy('idIn', 'desc')->get();
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('menu',['stock_in'=>$stock_in,'data'=>$data]);
    }
    public function InterIn(){

        $agences = dep_ag::distinct()->get(['ag_desc']);
        $stock_cur = stock_cur::distinct()->get(['designation','id','qt','qtMin']);
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        
        return view('stock_in',['agences'=>$agences,'stock_cur'=>$stock_cur,'data'=>$data]);
    }
    function store(Request $request)
    {
        $enTete=$request->addMoreInputFields[0];
        foreach ($request->addMoreInputFields as $key => $value) {

            //dd($value);
            stock_in::create([
                "fournisseur"=> $enTete['fournisseur'],
                "Num_facture"=> $enTete['Num_facture'],
                "designation"=> $value['designation'],
                "qte"=> $value['qte'],
               
                ]);
               // dd($value['designation']);
                DB::update('update stock_curs curs set  curs.qt="'.$value['qte'].'"+curs.qt where curs.designation="'.$value['designation'].'" '); 
        }
        return redirect('/listeIn')->with('message', 'Enregistrement Reussi');
                 
    } 
}
