<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        // Where to redirect users after registering
        $this->redirectTo = route('frontend.index');

        $this->user = $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('frontend.auth.register-bulma');
    }

    /**
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(RegisterRequest $request)
    {
        /*if (config('access.users.confirm_email')) {
            $user = $this->user->create($request->all());
            event(new UserRegistered($user));

            return redirect($this->redirectPath())->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.created_confirm'));
        } else {
            access()->login($this->user->create($request->all()));
            event(new UserRegistered(access()->user()));

            return redirect($this->redirectPath());
        }*/
        ;

        if (config('access.users.confirm_email') || config('access.users.requires_approval')) {
            $user = $this->user->create($request->only('first_name', 'username', 'email', 'password', 'division', 'district', 'upazila', 'union', 'is_term_accept'));
            event(new UserRegistered($user));

            if ($request->isJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Registration successfully done',
                    'redirect' => $this->redirectPath(),
                ]);
            }

            return redirect($this->redirectPath())->withFlashSuccess(
                config('access.users.requires_approval') ?
                    trans('exceptions.frontend.auth.confirmation.created_pending') :
                    trans('exceptions.frontend.auth.confirmation.created_confirm')
            );
        } else {
            // access()->login($this->user->create($request->only('first_name', 'username', 'email', 'password', 'is_term_accept')));
            // event(new UserRegistered(access()->user()));
            $data=$request->all();
            $form_data=array(); 
            $form_data['first_name'] = $data['first_name'];
            $form_data['email'] = $data['email'];
            $form_data['username'] = $data['username'];
            $form_data['division'] = $data['division']['id'];
            $form_data['district'] = $data['district']['id'];
            $form_data['upazila'] = $data['upazila']['id'];
            $form_data['union'] = $data['union']['id'];
            $form_data['password'] = $data['password'];
            $form_data['is_term_accept'] = $data['is_term_accept'];

            $user =$this->user->create($form_data);
            event(new UserRegistered($user));

            if ($request->isJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Registration successfully done',
                    'redirect' => $this->redirectPath(),
                ]);
            }

            return redirect($this->redirectPath());
        }
    }
}
