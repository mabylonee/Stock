<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\stock_cur;
use App\stock_in;
use App\dep_ag;
use App\lignebon;
use \App\Mail\SendMail;
use DB;





class MainController extends Controller
{
    public function show(){
        $dat =user::orderby('id','desc')->get();
        $bon =lignebon::orderby('id','desc')->get();
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
    
    
    
        return view('listeUser',['dat'=>$dat,'bon'=>$bon,'data'=>$data]);
    
    }
    
    function login(){
        return view('auth.log');
    }
    function register(){
          $agences = dep_ag::distinct()->get(['ag_desc']);
          $departement = dep_ag::distinct()->get(['dep_desc']);
          $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];

          return view('auth.user',['agences'=>$agences,'departement'=>$departement,'data'=>$data]);
  }
    function save(Request $request){
       // dd("test");
       
        //Validate requests
        $request->validate([
           // 'name'=>'required',
          //  'email'=>'required|email|unique:users',
           // 'Password'=>'required|min:5|max:12'
        ]);

         //Insert data into database
         $admin = new User;
         $admin->name = $request->name;
         $admin->Matricule = $request->Matricule;
         $admin->Role = $request->Role;
         $admin->rec_date = $request->rec_date;
         $admin->dep = $request->dep;
         $admin->Agence = $request->Agence;
         $admin->email = $request->email;
         $admin->password = $request->Password;
         $save = $admin->save();

         if($save){
            return redirect('/listeUser')->with('success','Nouvel utilisateur creer');
         }else{
             return back()->with('fail','Erreur');
         }
    }

    function check(Request $request){
        //Validate requests
      
        // $request->validate([
        //     'name'=>'required',
        //    'email'=>'required|email|unique:users',
        //   //  'adresse'=>'required',
        //    // 'regions'=>'required',
        //   //  'departement'=>'required',

        // ],[
        //    // 'name'=>'Veuillez saisir votre nom',
        //     'email'=>'Veuillez saisir un email correct',
        //     'Password.min'=>'Minimum 8 caracteres'
        // ]);

        $userInfo = User::where('Matricule','=', $request->Matricule)->first();

        if(!$userInfo){
            return back()->with('fail','Matricule incorrect');
        }else{
            //check password
           // dd($request->password);
            if($request->Password== $userInfo->Password){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('index');

            }else{
                return back()->with('fail','Mot de passe incorrect');
            }
        }
    }
    public  function delete($app)
    {
       $app=user::where('id',$app)->delete();      
       return back()->with('suppression','Suppression Reussie');
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/log');
        }
    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.dashboard', $data);
    }
    function index(){
        $stock_cur =stock_cur::orderBy('id','desc')->take(5)->get();
        $stock_in =stock_in::orderBy('idIn','desc')->take(5)->get();

        return view('index',['stock_cur'=>$stock_cur,'stock_in'=>$stock_in]);
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('index', $data);
    }

    public function edite($id)
    {
         $Password = User::find($id);
         
   
   
       return view ('modPassword')->with('Password', $Password);
    }
    function updatePassword($id){
        //dd( request('confPassword'));
        if(request('confPassword')!=request('Password'))
        {
            return back()->with('modification','Mot de passe non identiques');

        }
        $id=User::where('id',$id)->update(
                   ['Password' => request('Password'),
                   ] 
                );
                                            
  
                  return redirect('/listeUser')->with('modification','Modification reussie');
                }
                public function mailsend()
                {
               $stock_cur =stock_cur::orderBy('id','desc')->where('qt','<=','qtMin')->get();
              //  $stock_cur = DB::SELECT('SELECT * FROM stock_curs WHERE qt<=qtMin');     
               //dd($stock_cur);                  


                 $details = [
                    'title' => 'Gestion de stock BIM',
                    'body' => $stock_cur,
                ];
               
                \Mail::to('mba47653566@gmail.com')->send(new SendMail($details));
                   return view('emails.thanks');
                }
    
}