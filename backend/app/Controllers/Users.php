<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsersDetails;
use CodeIgniter\API\ResponseTrait;

class Users extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        return $this->fail('Invalid Request', 400);
    }

    public function create()
    {
        $request = $this->request->getJSON();
        $uuid = $request->sub;
        $userModel = new UsersDetails();
        $user = $userModel->where('uuid', $uuid)->first();

        if ($user) {
            return $this->respond($user, 200);
        } else {
            $newUserData = [
                'uuid' => $uuid,
            ];

            $userModel->insert($newUserData);

            return $this->respond($newUserData, 201);
        }
    }

    // ... (Other methods not implemented)
}
