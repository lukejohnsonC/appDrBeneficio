<?php
namespace App\Http\Controllers\Auth\Gestor;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
       public function __construct()
       {
           $this->middleware('guest:gestor')->except('logout');
       }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('gestor.auth.login');
    }
    public function loginGestor(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('gestor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location

        $pedidos = DB::table('areadocliente_gestores_pedidos as agp')
        ->leftJoin('tb_pedido as p', 'agp.ID_PEDIDO', '=', 'p.id_pedido')
        ->where('ID_GESTOR', Auth::guard('gestor')->id())
        ->select('p.*')
        ->get();

        $pedido_selecionado = $pedidos[0];

        Session::put('gestor_pedidos', $pedidos);
        Session::put('gestor_pedido_selecionado', $pedido_selecionado);
        Session::put('gestor', Auth::guard('gestor')->user());

        return redirect()->intended(route('gestor.dashboard'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('gestor')->logout();
        return redirect()->route('gestor.auth.login');
    }
}
