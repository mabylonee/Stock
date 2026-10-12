<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Stroage;
//use Illuminate\Support\Facades\Storage;
use Mail;
use DB;
use PDF;
use App\lignebon;
use App\bonCommande;
use App\Models\User;


class bonController extends Controller
{
    public function listeBon(){
        $bon =lignebon::orderby('id','desc')->get();
        $bonComande =bonCommande::orderby('idBon','desc')->get();


        return view('listeBon',['bon'=>$bon,'bonCommande'=>$bonComande]);
    }
    public function bon(){
        $data = lignebon::all();
        $data2 = bonCommande::all();

        return view('bon',['data'=>$data]);
    }
    public function bons(){

        $form = lignebon::distinct()->get();
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
       // dd($data);
        return view('form-bon',['form-bon'=>$form,'data'=>$data]);
        //return view('form-bon',['form-bon'=>$form]);
    }
    function store(Request $request)
    {
        //$enTete=$request->addMoreInputFields[0];
      //  $description=$request->addMoreInputFields[1]['description'] ?? null;
    
           
//    $data = new ligneBon();
//    $data->description = request('description');
//    $data->qt = request('qt');
//    $data->prixUnit = request('prixUnit');
//    $data->prixTotal = $data->qt * $data->prixUnit ;
//    $data->save();

   $data2 = new bonCommande();
   $data2->code = request('code');
   $data2->tva = request('tva');
   $data2->sousTotal = request('sousTotal');
   $data2->totalGeneral = request('totalGeneral');
   $data2->totalLettre = request('totalLettre');
   $data2->destinataire = request('destinataire');
   $data2->autorisation = request('autorisation');
   $data2->modalite = request('modalite');
   $data2->file=request('file');
   $file=$request->file('file');
   $extension=$file->getClientOriginalExtension();
    $filename = time() . '.' . $extension;
   $file->move('uploads/',$filename);
   $data2->file = $filename;
   $data2->save();
   $id=DB::getPdo()->lastInsertId();



   foreach ($request->addMoreInputFields as $key => $value) {
    $prixTotal= $value['qt']* $value['prixUnit'];
   // $sous=++$prixTotal;
     //dd($bon_num);

   //dd($filename);

       $data=[
        "qt"=>$value['qt'],
        "idBon"=>$id,
         "prixUnit"=> $value['prixUnit'],
         "description"=> $value['description'],
         "prixTotal"=> $prixTotal,  
       //  "file"=> $filename,  


       ];
     //dd($value[$sous]);
     lignebon::create($data);    
    }
    return redirect('/listeBon')->with('message','Enregistrement Réussi');

   //$app=stock_cur::where('id',$app)->delete();      
//    $data2 = boncommande::orderBy('idBon','desc')->take(1)->get();
//    $data = lignebon::where('idBon','73')->get();
//    $pdf = PDF::loadView('bon', [ 'data' => $data],['data2'=>$data2]);
//    return $pdf->download('latihanpdf.pdf');   
}  
// public function index(){
//     $data = bon::all();

//     return view('bon', ['data'=>$data]);
// }

public function generatepdf($data){
    $data = lignebon::where('idBon',$data)->get() ;
    $data2 = boncommande::where('idBon',$data2)->get();

    //$data=lignebon::where('idBon',$data)->get() ;

    $pdf = PDF::loadView('bon', [ 'data' => $data],['data2'=>$data2]);

    return $pdf->download('latihanpdf.pdf');
}
// public function download(Request $request,$file){
//     //dd($file);
    
//     return response()->download(public_path('uploads/'.$file));
// }
public function show(){
    $dat =bonCommande::orderby('idBon','desc')->get();
    $bon =lignebon::orderby('id','desc')->get();
    $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];



    return view('listeBon',['dat'=>$dat,'bon'=>$bon,'data'=>$data]);

}

public function download(Request $request,$file){
    
    return response()->download(public_path('uploads/'.$file));
}
public function printPreview($bon){
    //$stock_out =  DB::SELECT('SELECT * FROM stock_outs WHERE designation = "EAU MINERAL"');
      $data=lignebon::where('idBon',$bon)->get() ;
      $data2 = boncommande::where('idBon',$bon)->get();

return view('bon', [ 'data' => $data],['data2'=>$data2]);
     }

}