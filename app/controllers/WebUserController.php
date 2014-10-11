<?php

class WebUserController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth', array('except' => array('getLogin', 'postLogin')));
    }

    public function getLogin()
    {
        $data = array();

        if(Session::has('message')){
            $data['message'] = Session::get('message');
        }
        return View::make('login')->with($data);
    }

    public function postLogin(){
        $credentials = Input::only(
            'username', 'password'
        );

        if (Auth::attempt($credentials, Input::has('remember'))) {
            return Redirect::intended('/');
        } else {
            return Redirect::back()->with('message', array('type' => 'alert-danger', 'text' =>'Login Failed'));
        }
    }

    public function getProfile() {
        $user = Auth::user();

        return View::make('user.profile')->with('user', $user);
    }

    public function postProfile() {
        if(Input::has('password_old')) {
            if (Auth::validate(array('email' => Auth::user()->email, 'password' => Input::get('password_old')))) {
                $password = Input::get('password_new');
                $password_confirm = Input::get('password_confirm');
                if($password == $password_confirm) {
                    Auth::user()->password = Hash::make($password);
                    Auth::user()->save();
                    return Redirect::back()->with('message', new Message(Message::SUCCESS, 'Password Updated'));
                } else {
                    return Redirect::back()->with('message', new Message(Message::ERROR, 'Confirm does not match new password'));
                }
            } else {
                return Redirect::back()->with('message', new Message(Message::ERROR, 'Incorrect password'));
            }
        }
    }

    public function logout(){
        Auth::logout();
        return Redirect::action('WebUserController@getLogin')->with('logout', true);
    }
}