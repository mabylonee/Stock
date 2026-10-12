<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Models\User;

use App\stock_cur;
use App\stock_in;


class CurController extends Controller
{
  
    public function Cur(){
        $stock_cur =stock_cur::orderBy('id','desc')->get();
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('listeCur',['stock_cur'=>$stock_cur,'data'=>$data]);
    }
    public function stock_cur(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('stock_cur',['data'=>$data]);
    }
    function dernierAjout(){
        $stock_cur =stock_cur::orderBy('id','desc')->take(5)->get();
        $stock_in =stock_in::orderBy('idIn','desc')->take(5)->get();
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];

//dd($data);
        return view('index',['stock_cur'=>$stock_cur,'stock_in'=>$stock_in,'data'=>$data]);

        return view('index', $data);
    }
    function store(Request $request)
    {
        $stock_cur = new stock_cur();
        $stock_cur->designation = request('designation');
       // $stock_cur->qt = request('qt');
        $stock_cur->qtMin = request('qtMin');
       // $stock_in->date_in=request(date);
      // dd($stock_cur->qt);
    if(DB::select('select designation    from stock_curs curs   where curs.designation="'.$stock_cur->designation.'"')){
         return back()->with('alert','Produit Existe Déja');                   
        
    }                         
        
        DB::update('update stock_curs curs set  curs.qt="'.$stock_cur->qt.'"+curs.qt where curs.designation="'.$stock_cur->designation.'" order by curs.id');                       
       $stock_cur->save();
      // $alertQt= DB::select('select designation    from stock_curs curs   where curs.designation="'.$stock_cur->designation.'"');
   //  $alertQt= DB::select('select designation    from stock_curs curs where qt<qtMin');
    //    dd($alertQt); 
    // $data = [
    //     'subject' =>'BIM bank',
    //     'email' =>'mabyba9@gmail.com',
    //     'content' => DB::select('select designation    from stock_curs curs where qt<qtMin')
    //   ];
    // if($alertQt){
    //     Mail::send('email-template', $data ,function($message) use ($data) {
    //         $message->to($data['email'])
    //        ->subject($data['subject']);
    //     });
    // }
       return redirect('/listeCur')->with('message','Enregistrement Reussi');  
        
       
    } 

    // function alert(){
    //     $stock_cur =stock_cur::orderBy('id', 'desc')->get();
    //     dd($stock_cur);

    // }
    function updateCur($id){
        $id=stock_cur::where('id',$id)->update(
                   ['designation' => request('designation'),
                   'qt' => request('qt'),
                   'qtMin' => request('qtMin'),
                   ] 
                );
                                            
  
                  return redirect('/listeCur')->with('modification','Modification reussie');
                }
                public function edite($id)
                {
                     $stock_cur = stock_cur::find($id);
                     $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];

                     
               
                   return view('modCur',['stock_cur'=>$stock_cur,'data'=>$data]);
                   //return view ('modCur')->with('stock_cur', $stock_cur);
                }
    public  function delete($app)
    {
       $app=stock_cur::where('id',$app)->delete();      
            return back()->with('suppression','Suppression Reussie');
    }
   
    public function printPreview(){
        $stock_cur = stock_cur::all();
        //$stock_cur = DB::SELECT('SELECT * FROM stock_curs WHERE designation = "EAU MINERAL"');                       
//dd($stock_cur);

        return view('/impression',compact('stock_cur'));        }
    

}
