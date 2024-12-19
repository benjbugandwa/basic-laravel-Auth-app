<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use DB;
//use Mail;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmail;
use App\Http\Requests\ResetPassword;

class PasswordRecoveryController extends Controller
{
    //
    public function showLinkRequestForm()
    {
        return view('user.requestpasswordresetlink');
    }

    public function sendResetLinkEmail(Request $request)
    {


        $count = User::where('email', '=', $request->email)->count();

        if ($count > 0) {
            $user = User::where('email', '=', $request->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();

            $details = [
                'title' => 'Réinitialisation de mot de passe',
                'body' => 'Nous vous avons envoyé un lien, vérifiez votre boite de réception'
            ];

            Mail::to($request->email)->send(new ResetPasswordEmail($user));

            return redirect()->back()->with('success', 'Un lien vous a été envoyée, vérifiez votre adresse email');

        } else {
            return redirect()->back()->with('error', 'adresse email introuvable');
        }




        /* $request->validate(['email' => 'required|email']);

         $status = Password::sendResetLink(
             $request->only('email')
         );

         return $status === Password::RESET_LINK_SENT
             ? back()->with(['status' => __($status)])
             : back()->withErrors(['email' => __($status)]);*/
    }

    public function showResetForm(Request $request, $token)
    {

        $user = User::where('remember_token', '=', $token);
        if ($user->count() == 0) {

            abort(403);
        }
        $user = $user->first();
        $data['token'] = $token;
        return view('user.resetpassword', $data);


        /* return view('user.resetpassword')->with(
             ['token' => $token, 'email' => $request->email]
         );*/
    }

    public function reset(Request $request, $token)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);


        /*$status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);*/
    }

    public function update($token, ResetPassword $request)
    {
        /* $request->validate([
             'token' => 'required',
             'email' => 'required|email',
             'password' => 'required|confirmed|min:8',
         ]);*/

        $user = User::where('remember_token', '=', $token);
        if ($user->count() == 0) {

            abort(403);
        }

        $user = $user->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('login')->with('success', 'Votre mot de passe a été mis à jour avec succès;');




    }



    //---------------------------------------------------------------------------------


}
