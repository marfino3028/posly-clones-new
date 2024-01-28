<?php

// AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\PersonalAccessTokenResult;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    use HasApiTokens,Notifiable;
    public function confirmEmail($token)
{    
    $user = User::where('email_confirmation_token', $token)->first();    
    if (!$user) {
        return response()->json(['error' => 'Invalid confirmation token'], 400);
    }

    // Aktifkan user
    $user->status = 1;
    $user->email_confirmation_token = null; // Optional: Set token to null after confirmation
    $user->save();

    return redirect(Config::get('app.url'));
}

    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'no_hp' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:255',
            'villages' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Buat user baru
        $user = User::create([
            'password' => Hash::make($request->password),
            'username' => $request->username ?? null,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'villages' => $request->villages,
            'district' => $request->district,
            'city' => $request->city,
            'province' => $request->province,
            'country' => $request->country,
            'role_users_id' => 3
        ]);
        $token = $user->createToken('emailConfirmation')->accessToken;
        $user->update([
            'email_confirmation_token' => $token,
    ]);
       // Generate token for email confirmation
        $confirmationLink = route('confirm.email', ['token' => $token]);

        // Kirim email konfirmasi
        event(new Registered($user));
        Mail::to($user->email)->send(new ConfirmationEmail($user, $confirmationLink));
        
        return response()->json(['message' => 'Registration successful. Confirmation email sent.'], 201);
    }

    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Lakukan autentikasi
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;

            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
