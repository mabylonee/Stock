<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 
class CustomAuthController extends Controller
{
    public function home()
    {
        return view('homepage');
    } 
 
    public function index()
    {
        return view('log');
    }  
       
    function login(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required|email',
            // 'password'=>'required|min:8|max:12'
        ]);

        $userInfo = User::where('email','=', $request->email)->first();
       // dd($userInfo);
        if(!$userInfo){
            return back()->with('fail','Email incorecte');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->Password)){
               $request->session()->put('LoggedUser', $userInfo->id);
               return view('listeOut');
               //->with('message', 'Signed in!');
            }else{
                
                return back()->with('fail','Mot de passe incorrecte');
            }
        }
    }
    public function signup()
    {
        return view('registration');
    }
       
    public function signupsave(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect("dashboard");
    }
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        //'password' => $data['password'],

        'password' => Hash::make($data['password'])
      ]);
    }    
     
    public function dashboard()
    {
        if(Auth::check()){
            return view('listeOut');
        }
        return redirect('/log');
    }
    public function listeCur()
    {
        if(Auth::check()){
            return view('listeCur');
        }
        return redirect('/log');
    }
     
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return redirect('log');
    }
}