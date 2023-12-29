<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Myth\Auth\Password;

class Account extends BaseController
{
    public function index(): string
    {
        $data = ['title' => 'Gaming Store || My Account'];
        return view('account', $data);
    }
    public function updateProfile($id)
    {
        $validation = \Config\Services::validation();
        $validationRules = [
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The fullname must be filled in',
                ]
            ],
            'phone_number' => [
                'rules' => 'required|integer|min_length[10]',
                'errors' => [
                    'required' => 'The phone number must be filled in',
                    'integer' => 'phone number must be a number',
                    'min_length' => 'The phone number must be at least 10 numbers.',
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The address must be filled in',
                ]
            ],
        ];

        $validation->setRules($validationRules);
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'id' => $id,
                'fullname' => $this->request->getVar('fullname'),
                'phone_number' => $this->request->getVar('phone_number'),
                'address' => $this->request->getVar('address'),
            ];
            $userModel = new UsersModel();
            $userModel->save($data);
            session()->setFlashdata('profile_success', 'Profile Updated');
            return redirect()->to('account');
        } else {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }
    }
    public function updatePassword($id)
    {
        $validation = \Config\Services::validation();
        $userModel = new UsersModel();
        $user = $userModel->find($id);
        if (!Password::verify($this->request->getVar('old_password'), $user['password_hash'])) {
            $validation->setError('old_password', 'The old password is incorrect');
        }
        $validationRules = [
            'old_password' => [
                'rules' => "required",
                'errors' => [
                    'required' => 'The old password must be filled in',
                ]
            ],
            'new_password' => [
                'rules' => 'required|min_length[8]|max_length[255]',
                'errors' => [
                    'required' => 'The new password must be filled in',
                    'min_length' => 'The new password must be at least 8 characters.',
                    'max_length' => 'The new password cannot exceed 255 characters.',
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[new_password]',
                'errors' => [
                    'required' => 'The confirm password must be filled in',
                    'matches'  => 'The confirm password does not match with the new password'
                ]
            ]
        ];

        $validation->setRules($validationRules);
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'id' => $id,
                'password_hash' => Password::hash($this->request->getVar('confirm_password')),

            ];
            $userModel = new UsersModel();
            $userModel->save($data);
            session()->setFlashdata('password_success', 'Password Updated');
            return redirect()->to('account');
        } else {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }
    }
}
