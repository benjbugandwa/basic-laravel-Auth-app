<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordManagerController extends Controller
{
    //
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $token = Str::random(60);
        DB::table('password_reset_tokens')->insert(['email' => $request->email, 'token' => $token, 'created_at' => now(),]);
        Mail::to($request->email)->send(new ResetPasswordEmail($token));
        return back()->with('success', 'Nous vous avons envoyé un lien. Vérifiez votre boite de reception');
    }

    public function reset(Request $request)
    {
        $request->validate(['email' => 'required|email', 'password' => 'required|confirmed|min:8', 'token' => 'required']);

        $passwordReset = DB::table('password_reset_tokens')->where([['email', $request->email], ['token', $request->token]])->first();
        if (!$passwordReset) {
            return back()->withErrors(['email' => 'données invalides!']);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'cette adresse email est inexistante !']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return redirect()->route('login')->with('success', 'Votre mot de passe a été modifié avec succès!');
    }

    public function showResetForm(Request $request, $token)
    {
        return view('user.resetpassword', ['token' => $token, 'email' => $request->email]);
    }

    public function showLinkRequestForm()
    {
        return view('user.requestpasswordresetlink');
    }
}
