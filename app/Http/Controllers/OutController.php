<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


use App\stock_out;
use App\dep_ag;
use App\stock_cur;
use App\user;


use DB;


class OutController extends Controller
{
  
    public function Out(){
    
       $stock_out =stock_out::orderby('idOut','desc')->get();  
       $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
   
       return view('listeOut',['stock_out'=>$stock_out,'data'=>$data]);

     
    }
    public function InterOut(){

        $agences = dep_ag::distinct()->get(['ag_desc']);
        $stock_cur = stock_cur::distinct()->get(['designation','id','qt','qtMin']);
        $departement = dep_ag::distinct()->get(['dep_desc']);
        $demandeur = user::distinct()->get(['name']);
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('stock_out',['agences'=>$agences,'stock_cur'=>$stock_cur,'departement'=>$departement,'demandeur'=>$demandeur,'data'=>$data]);
    }
  
    function store(Request $request)
    {
  $enTete=$request->addMoreInputFields[0];
  $bon_num = Carbon::now()->timestamp;
  $qtE=$request->addMoreInputFields[0]['qtE'];
  $qtE1=$request->addMoreInputFields[0]['qtE1'] ?? null;
  $qtE2=$request->addMoreInputFields[0]['qtE2'] ?? null;
  $qtE3=$request->addMoreInputFields[0]['qtE3'] ?? null;
  $qtE4=$request->addMoreInputFields[0]['qtE4'] ?? null;
  $qtE5=$request->addMoreInputFields[0]['qtE5'] ?? null;
  $qtE6=$request->addMoreInputFields[0]['qtE6'] ?? null;
  $qtE7=$request->addMoreInputFields[0]['qtE7'] ?? null;
  $qtE8=$request->addMoreInputFields[0]['qtE8'] ?? null;
  $qtE9=$request->addMoreInputFields[0]['qtE9'] ?? null;
///////////////////////////////////////////////////////
  $qt=$request->addMoreInputFields[0]['qt'] ?? null;
  $qt1=$request->addMoreInputFields[1]['qt'] ?? null;
  $qt2=$request->addMoreInputFields[2]['qt'] ?? null;
  $qt3=$request->addMoreInputFields[3]['qt'] ?? null;
  $qt4=$request->addMoreInputFields[4]['qt'] ?? null;
  $qt5=$request->addMoreInputFields[5]['qt'] ?? null;
  $qt6=$request->addMoreInputFields[6]['qt'] ?? null;
  $qt7=$request->addMoreInputFields[7]['qt'] ?? null;
  $qt8=$request->addMoreInputFields[8]['qt'] ?? null;
  $qt9=$request->addMoreInputFields[9]['qt'] ?? null;


    foreach ($request->addMoreInputFields as $key => $value) {
//        dd($value);
        if($qt>$qtE or $qt1>$qtE1  or $qt1>$qtE1  or $qt2>$qtE2  or $qt3>$qtE3  or $qt4>$qtE4  or $qt5>$qtE5  or $qt6>$qtE6  or $qt7>$qtE7  or $qt8>$qtE8  or $qt9>$qtE9   ){

            return back()->with('error','La quantité saisie pour un des produits est indisponible pour le moment');
                
        }else{
 //dd($bon_num);
   $data=[
    "agence"=> $enTete['agence'],
    "dep"=> $enTete['dep'],
    "mat_user"=> $enTete['mat_user'],
    "designation"=> $value['designation'],
    "qt"=> $value['qt'],
    "updated_at"=> date("Y-m-d H:i:s"),
    "created_at"=> date("Y-m-d H:i:s"),
    "num_bs"=>$bon_num,
    
          
   ];
   //dd($value['designation']);

 
        stock_out::create($data);
  }
    $designation=$request->addMoreInputFields[0]['designation'] ?? null;
    $new=$qtE-$qt; 
    DB::update('update stock_curs curs set  curs.qt="'.$new.'"  where curs.designation="'.$designation.'" '); 
    $designation1=$request->addMoreInputFields[1]['designation'] ?? null;
    $new1=$qtE1-$qt1;  
    DB::update('update stock_curs curs set  curs.qt="'.$new1.'"  where curs.designation="'.$designation1.'" '); 
    $designation2=$request->addMoreInputFields[2]['designation'] ?? null;
    $new2=$qtE2-$qt2;  
    DB::update('update stock_curs curs set  curs.qt="'.$new2.'"  where curs.designation="'.$designation2.'" '); 
    $designation3=$request->addMoreInputFields[3]['designation'] ?? null;
    $new3=$qtE3-$qt3;  
    DB::update('update stock_curs curs set  curs.qt="'.$new3.'"  where curs.designation="'.$designation3.'" '); 
    $designation4=$request->addMoreInputFields[4]['designation'] ?? null;
    $new4=$qtE4-$qt4;  
    DB::update('update stock_curs curs set  curs.qt="'.$new4.'"  where curs.designation="'.$designation4.'" '); 
    $designation5=$request->addMoreInputFields[5]['designation'] ?? null;
    $new5=$qtE5-$qt5;  
    DB::update('update stock_curs curs set  curs.qt="'.$new5.'"  where curs.designation="'.$designation5.'" '); 
    $designation6=$request->addMoreInputFields[6]['designation'] ?? null;
    $new6=$qtE6-$qt6;  
    DB::update('update stock_curs curs set  curs.qt="'.$new6.'"  where curs.designation="'.$designation6.'" '); 
    $designation7=$request->addMoreInputFields[7]['designation'] ?? null;
    $new7=$qtE7-$qt7;  
    DB::update('update stock_curs curs set  curs.qt="'.$new7.'"  where curs.designation="'.$designation7.'" '); 
    $designation8=$request->addMoreInputFields[8]['designation'] ?? null;
    $new8=$qtE8-$qt8;  
    DB::update('update stock_curs curs set  curs.qt="'.$new8.'"  where curs.designation="'.$designation8.'" '); 
    $designation9=$request->addMoreInputFields[9]['designation'] ?? null;
    $new9=$qtE9-$qt9;  
    DB::update('update stock_curs curs set  curs.qt="'.$new9.'"  where curs.designation="'.$designation9.'" '); 
    
   
}
  
    return redirect('/listeOut')->with('message','Enregistrement Reussi');  
    }
    public function printPreviewOut($stock_out){
        //$stock_out =  DB::SELECT('SELECT * FROM stock_outs WHERE designation = "EAU MINERAL"');
          $stock_out=stock_out::where('num_bs',$stock_out)->get() ;
        
          //$stock_out= DB::select('SELECT DISTINCT date_out FROM stock_outs'); 
         //dd($stock_out);
        //＄users = DB::table('tablename')->distinct()->get();
       // $stock_out = stock_out::all()->unique('dep')->toArray();
      // $stock_out = stock_out::where('num_bs',$stock_out )->get(); 
     //dd($stock_out);  
    //$stock_out = stock_out::all();
    return view('/impressionOut',compact('stock_out'));        }
       
}
