<?php

namespace App\Http\Controllers\Panel\Users;

use App\DataTables\Panel\Users\UsersDataTable;
use App\DataTables\Panel\Users\UsersRecycledDataTable;
use App\DataTables\Scopes\Panel\Users\UserTypeClient;
use App\Modules\Auth\ClientHtmlBuilder;
use App\Modules\Auth\User;
use App\Modules\Auth\UserMailer;
use App\Modules\Auth\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class ClientController extends Controller
{
    private $htmlBuilder;

    private $userRepository;

    private $userMailer;

    public function __construct(
        ClientHtmlBuilder $htmlBuilder,
        UserRepository $userRepository,
        UserMailer $userMailer
    )
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->userRepository = $userRepository;
        $this->userMailer = $userMailer;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Users\UsersDataTable $dataTable
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        $view_dataTable        = $this->htmlBuilder->dataTablePanelIndex();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActions();

        $breadcrumb            = $this->htmlBuilder->breadcrumbIndex();

        return $dataTable->addScope(new UserTypeClient())
            ->render('panel.form.index', compact('view_dataTable', 'breadcrumb', 'multiple_form_actions'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Users\UsersRecycledDataTable $dataTable
     *
     * @return \Illuminate\Http\Response
     */
    public function recycled(UsersRecycledDataTable $dataTable)
    {
        $view_dataTable        = $this->htmlBuilder->dataTablePanelTrash();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActionsTrash();

        $breadcrumb            = $this->htmlBuilder->breadcrumbTrash();

        return $dataTable->addScope(new UserTypeClient())
            ->render('panel.form.index', compact('view_dataTable', 'breadcrumb', 'multiple_form_actions', 'trash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = $this->htmlBuilder->breadcrumbCreate();

        $form       = $this->htmlBuilder->formBuilder();

        $dynamic    = ['type' => 'open', 'route' => 'users.client.create', 'title' => "Nuevo Administrador"];

        return view('panel.form.dynamic', compact('breadcrumb', 'form', 'dynamic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            'last_name'  => 'required|string|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            'email'      => 'required|email|max:60|unique:users,email',
        ]);

        $password = str_random(20);

        $data = [
            'first_name'         => $request->get('first_name'),
            'last_name'          => $request->get('last_name'),
            'email'              => $request->get('email'),
            'password'           => $password,
            'status'             => 'active',
            'type'               => 'client',
            'registration_token' => str_random(60),
        ];

        $user = $this->userRepository->create($data);

        $this->userMailer->confirmation($user, $password);

        Alert::success(trans('users.client.create', ['name' => $user->fullname]));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Modules\Auth\User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(User $user)
    {
        $model      = $user;

        $breadcrumb = $this->htmlBuilder->breadcrumbEdit();

        $form       = $this->htmlBuilder->formBuilder();

        $dynamic    = ['type' => 'model', 'route' => 'users.client.update', 'title' => "Actualizar administrador: $user->fullname"];

        return view('panel.form.dynamic', compact('breadcrumb', 'form', 'model', 'dynamic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Auth\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            'last_name'  => 'required|string|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            'email'      => 'required|email|max:60|unique:users,email,'. $user->id,
        ]);

        $user->update($request->all());

        Alert::info(trans('users.client.update', ['name' => $user->fullname]));

        return back();
    }

    /**
     * Trash the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request)
    {
        $trash_ids = explode(',', $request->get('trash_ids'));

        $this->userRepository->trash($trash_ids);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $destroy_ids = explode(',', $request->get('destroy_ids'));

        $this->userRepository->destroy($destroy_ids);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        $restore_ids = explode(',', $request->get('restore_ids'));

        $this->userRepository->restore($restore_ids);
    }

    /**
     * Permitted the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function permitted(Request $request)
    {
        $permitted_ids = explode(',', $request->get('permitted_ids'));

        $this->userRepository->permitted($permitted_ids);
    }

    /**
     * Banned the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function banned(Request $request)
    {
        $banned_ids = explode(',', $request->get('banned_ids'));

        $this->userRepository->banned($banned_ids);
    }
}
