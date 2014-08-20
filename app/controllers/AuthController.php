<?php

class AuthController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    // 登録をする画面
    public function showSignUp()
    {
        return View::make('auth/signup');
    }

    // 登録処理
    public function execSignUp()
    {
        $validation_rule = array(
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        );
        $validator = Validator::make(Input::all(), $validation_rule);

        // バリデーション判定
        if ($validator->fails())
        {
            // 失敗
            return Redirect::back()->withErrors($validator);
        }

        // 成功
        try{
            // ユーザーの追加
            Sentry::register(array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
            ), true);

            return Redirect::route('home');

        }catch(Exception $e) {
            // エラー
            $this->messageBag->add('all', Lang::get('auth/message.signup.error'));
        }

        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    // ログイン画面
    public function showLogin()
    {
        return View::make('auth/login');
    }

    // ログイン処理
    public function execLogin()
    {
        $validation_rule = array(
            'email' => 'required|email',
            'password' => 'required'
        );
        $validator = Validator::make(Input::all(), $validation_rule);

        // バリデーション判定
        if ($validator->fails())
        {
            // 失敗
            return Redirect::back()->withInput()->withErrors($validator);
        }

        try{
            // 認証
            $user = Sentry::authenticate(Input::only('email','password'), Input::get('remember-me', 0));

            // 認証出来たのでリダイレクト
            return Redirect::route('home');

        } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            // 制限中
            $this->messageBag->add('all', Lang::get('auth/message.account_suspended'));
        } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
            // バン
            $this->messageBag->add('all', Lang::get('auth/message.account_banned'));
        } catch (Exception $e) {
            // 他
            $this->messageBag->add('all', Lang::get('auth/message.login.error'));
        }

        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }
}