<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GroupModel;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Myth\Auth\Models\UserModel;
use PhpParser\Node\Stmt\UseUse;
use App\Models\UsersModel;
use Myth\Auth\Password;


class Auth extends BaseController


{
    protected $usersModel;
    protected $userModel;
    protected $provider;
    public function __construct()
    {
        $this->provider  = new \League\OAuth2\Client\Provider\Google([
            'clientId'     => '723618285009-90qvcmrts7v562vmg2eml2b8f9g27bof.apps.googleusercontent.com',
            'clientSecret' => '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',
            'redirectUri'  => 'http://localhost:8080/auth/google/callback',
        ]);
        $this->usersModel = new UserModel();
        $this->userModel = new UsersModel();
    }
    public function redirectToGoogle()
    {
        $authUrl = $this->provider->getAuthorizationUrl();
        $_SESSION['oauth2state'] = $this->provider->getState();
        return redirect()->to($authUrl);
    }

    public function handleGoogleCallback()
    {
        $token = $this->provider->getAccessToken('authorization_code', [
            'code' => $_GET['code'],
        ]);

        // Use the token to fetch the user's profile data
        $user  = $this->provider->getResourceOwner($token);
        $email = [
            'email' => $user->getEmail()
        ];

        $userData = $this->userModel->where('email', $email)->first();

        if ($userData) {
            // User found, set session data
            $sessLogin = [
                'isLogin' => true,
                'logged_in' => $userData['id']
            ];

            // Set session data
            session()->set($sessLogin);

            // Redirect or perform other actions
            return redirect()->to('/');
        } else {
            $data = [
                'email'           => $user->getEmail(),
                'fullname'        => $user->getName(),
                'profile_picture' => $user->getAvatar(),
            ];
            session()->set($data);
            return redirect()->to('/set-password');
        }
    }
    public function setPasswordForm()
    {
        return view('auth/set-password');
    }
    public function setPassword()
    {
        $data = session()->get();
        $rules = [
            'password' => 'required|min_length[8]',
        ];
        // Validation messages
        $messages = [
            'password' => [
                'required'      => 'The password field is required.',
                'min_length'    => 'The password must be at least 8 characters long.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $password = $this->request->getVar('password');
            $hashedPassword = Password::hash($password);
            $setUsernameRandom = 'user' . rand();
            $userData = [
                'email'           => $data['email'],
                'username'        => $setUsernameRandom,
                'password_hash'   => $hashedPassword,
                'fullname'        => $data['fullname'],
                'profile_picture' => $data['profile_picture'],
                'active'          => 1
            ];
            $this->userModel->save($userData);
            $email = [
                'email' => $data['email']
            ];
            $getID = $this->userModel->where('email', $email)->first();
            $groupModel = new GroupModel();
            $groupModel->save(
                [
                    'group_id' => 3,
                    'user_id'  => $getID['id']
                ]
            );
            $sessLogin = [
                'isLogin' => true,
                'logged_in' => $getID['id']
            ];
            session()->set($sessLogin);
            // Set session data
            return redirect()->to('/');
        }
    }
}
