<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Mail\Websitemail;
use Auth;

class WebsiteController extends Controller
{
    // Page de UI front
    public function index()
    {
        return view('home');
    }
    /* -------------------- Page de dashboard -------------------- */
    public function dashboard()
    {
        return view('dashboard');
    }
    /* -------------------- Page mot de connexion -------------------- */
    public function login()
    {
        return view('login');
    }
    /* -------------------- Soummision de formulaire lors de l'inscription -------------------- */
    public function login_submit(Request $request)
    {
       $credentials = [
          'email' => $request->email,
          'password' => $request->password,
          'status' => 'Active'
        ];
        
        // if the credential match
        if(Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login');
        }

    }
    /* -------------------- Deconnexion -------------------- */
    public function logout() 
    {
        Auth::guard('web')->logout();

        return redirect()->route('login');
    }
    
    public function registration()
    {
        return view('registration');
    }
    /* -------------------- Soumission de formulaire lors de l'inscription -------------------- */
    public function registration_submit(Request $request)
    {
        //echo $request->name;
        
        $token = hash('sha256', time());
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'Pending';
        $user->token = $token;
        $user->save();
        $verification_link = url('registration/verify/'.$token.'/'.$request->email);

        // Send email
        $subject = 'Registration Verification';
        $message  = 'Please click on the link below to confirm the registration process: <br>';
        $message .= '<a href="'.$verification_link.'">';
        $message .= $verification_link;
        $message .= '</a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        echo 'Email is sent';


    }
    /* -------------------- Verification de l'email et token lors de l'nscription avec mailtrap -------------------- */
    public function registration_verify($token, $email)
    {
      $user = User::where('token', $token)->where('email', $email)->first();
        if(!$user) {
          return redirect()->route('login');
        }

        $user->status = 'Active';
        $user->token = '';
        $user->update();

        echo 'Registration verification is successful';
    }
    
    /* -------------------- Page mot de passe oublié -------------------- */
    public function forget_password()
    {
        return view('forget_password');
    }
    
    
     /* -------------------- Soumission du formulaire de mot de passe oublié -------------------- */
    public function forget_password_submit(Request $request)
    {
        $token = hash('sha256', time());

        $user = User::where('email', $request->email)->first();

        if(!$user) {

        }

        $user->token = $token;
        $user->update();
        // Créer le lien de réinitialisation
        $reset_link = url('reset-password/' . $token . '/' . $request->email);

         // Message et sujet de l'email
        $subject = "Password Reset Request";
        $message = "To reset your password, please click on the link below:<br>";
        $message .= "<a href='" . $reset_link . "'>Click Here</a>";

         // Envoyer l'email
        \Mail::to($request->email)->send(new Websitemail($subject, $message));
        
     
    }


     /* -------------------- Page de réinitialisation de mot de passe -------------------- */
    public function reset_password($token, $email)
    {
        $user = User::where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid token or email.');
        }

        return view('reset_password', compact('token', 'email'));
    }

    /* -------------------- Soumission du formulaire de réinitialisation -------------------- */
    public function reset_password_submit(Request $request, $token, $email)
    {
        $request->validate([
            'new_password' => ['required', 'min:6'],
            'retype_password' => ['required', 'same:new_password'],
        ]);

        $user = User::where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid token or email.');
        }

        // Réinitialiser le mot de passe
        $user->update([
            'password' => Hash::make($request->new_password),
            'token' => null,
        ]);

        return redirect()->route('login')->with('success', 'Password reset successfully. You can now log in.');
    }


}
