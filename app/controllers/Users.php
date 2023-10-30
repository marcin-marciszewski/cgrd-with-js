<?php

class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password'])
            ];

            if (!empty($data['username']) && !empty($data['username'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);
            } else {
                $loggedInUser = false;
            }

            if ($loggedInUser) {
                $this->createUserSession($loggedInUser);
            } else {
                flash('login_message', 'Wrong Login Data!', 'message message-error');
                redirect('users/login');
            }
        } else {
            $this->view('users/login');
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_username'] = $user->username;
        redirect('news');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_username']);
        session_destroy();
        redirect('users/login');
    }
}
