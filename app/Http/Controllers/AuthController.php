<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\LoginService;

class AuthController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    
    public function showLogin()
    {
        return view('auth.login');
    }

    public function loginWeb(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email'    => 'required|string|email',
                'password' => 'required|string'
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('records.index');
            }

            return back()->withErrors(['email' => 'Email ou senha inválidos'])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao efetuar login: ' . $e->getMessage()]);
        }
    }

    public function loginApi(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email'    => 'required|string|email',
                'password' => 'required|string'
            ]);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                // Gera o token utilizando o Sanctum (certifique-se de que o modelo User utiliza o HasApiTokens)
                $token = $user->createToken('YourAppName')->plainTextToken;

                return response()->json([
                    'message' => 'Login sucedido',
                    'token'   => $token
                ], 200);
            }

            return response()->json(['message' => 'Email ou senha inválidos'], 401);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro no login: ' . $e->getMessage()], 500);
        }
    }

    public function logoutWeb(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao efetuar logout: ' . $e->getMessage()]);
        }
    }

    public function logoutApi(Request $request)
    {
        try {
            $user = Auth::user();
            if ($user) {
                $user->tokens()->delete();
            }
            return response()->json(['message' => 'Logout sucedido'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao efetuar logout: ' . $e->getMessage()], 500);
        }
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name'     => 'required|string',
                'email'    => 'required|string|email|unique:users',
                'password' => 'required|string|min:6|confirmed'
            ]);

            $user = $this->loginService->register($request->all());
            Auth::login($user);

            return redirect()->route('records.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro no registro: ' . $e->getMessage()]);
        }
    }

    public function showResetPassword()
    {
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'email'    => 'required|string|email|exists:users,email',
                'password' => 'required|string|min:6|confirmed'
            ]);

            $this->loginService->resetPassword($request->email, $request->password);
            return redirect()->route('login')->with('success', 'Senha redefinida com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro na redefinição de senha: ' . $e->getMessage()]);
        }
    }
}
