<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\stock_cur;
use App\stock_in;


class ProfilController extends Controller
{
  


    public function profil(){
       // $stock_cur =stock_cur::orderBy('id','desc')->get();
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('profil',['data'=>$data]);
    }
    public function afficheProfile()
    {
      $users = User::all();
      $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];

  
         return view ('/profil', [
             'users' => $users,'data'=>$data
             ]) ;
         }   
    public function profiledetails($idm)
    {

      $users=User::find($idm);
    
       return view('/profile')->with('users',$users);

}

function update($id,Request $request){
 $id=User::where('id',$id)->update(
            ['name' => request('name'),
          
            'email' => request('email'),

         //   'password' =>Hash::make($request->password),
           // $membre->motdepasse = Hash::make($request->motdepasse);

           
            ] 
         );
                                     

           return back()->with('message','Modification reussie');
         }






 public function edite($id)
{
 $users = User::find($id);
 


return view ('profile')->with('users', $users);
}

function updatepassword($id,Request $request){
//  $userInfo = Admin::where('email','=', $request->email)->first();
 $userInfo = DB::table('users')->where('id','=', session('LoggedUser'))->pluck('Password')->last();
 $admin= $request->old_password;
 //dd($userInfo,$admin);
 
// (Hash::check($request->password, $userInfo->password));

 if($userInfo==$admin){
     $id=User::where('id',$id)->update(
     
         [
         'Password' =>$request->password,
        // $membre->motdepasse = Hash::make($request->motdepasse);
         ] 
      );
                                  

        return back()->with('message','Modification reussie');

}else{
 return back()->with('erreur','Le mot de passe actuel saisi est incorrect');


         }
     }

 public function editepassword($id)
{
 $users = User::find($id);
 
return view ('profile')->with('users', $users);
}


    

}
