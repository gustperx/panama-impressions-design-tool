<?php

namespace App\Http\Controllers\Web;

use App\Modules\Auth\User;
use App\Modules\Auth\UserMailer;
use App\Modules\Auth\UserRepository;
use App\Modules\Auth\UserStorage;
use App\Modules\Web\Builder\HtmlBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class UserController extends Controller
{
    private $webBreadcrumb;

    private $htmlBuilder;

    public function __construct(HtmlBuilder $htmlBuilder)
    {
        $this->webBreadcrumb = true;
        $this->htmlBuilder   = $htmlBuilder;
    }

    public function index()
    {
        $breadcrumb = $this->htmlBuilder->breadcrumbAccount();

        return view('web.users.index', compact('breadcrumb'))->with(['user' => auth()->user(), 'webBreadcrumb' => $this->webBreadcrumb]);
    }
    
    public function update(Request $request, UserRepository $userRepository, UserStorage $userStorage, User $user)
    {
        $this->validate($request, [
            'first_name'   => 'required|string|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            'last_name'    => 'required|string|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            'email'        => 'required|email|max:60|unique:users,email,'. $user->id,
            'avatar'       => 'image|max:5120',
            'password'     => 'confirmed',
        ]);

        $userRepository->update($user, $request->all());
        
        if ($request->hasFile('avatar')) {

            $user->avatar = $userStorage->avatar($user, $request->file('avatar'));

            $user->save();
        }
        
        Alert::info("Actualización realizada satisfactoriamente");

        return back();
    }
    
    
    public function confirmation(UserMailer $userMailer)
    {
        $user = auth()->user();

        $user->update([
            'registration_token' => str_random(60)
        ]);

        $userMailer->confirmation($user, 'Sin cambios');

        return back();
    }
}
