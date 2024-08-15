<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    protected $authentication;
    protected $groupModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile',
        ];

        return view('user/index', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Profile',
        ];

        return view('user/edit', $data);
    }

    public function update()
    {
        // Validasi data
        if (!$this->validate([
            'email' => 'required|valid_email',
            'username' => 'required',

            // Custom error message
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Name is required.'
                ]
            ],
            'user_img' => [
                'rules' => 'max_size[user_img,1024]|is_image[user_img]|mime_in[user_img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size'  => 'Image size is too large.',
                    'is_image'  => 'The one you selected is not an image.',
                    'mime_in'   => 'The one you selected is not an image.'
                ]
            ]
        ])) {
            return redirect()->to('user/edit')->with('errors', \Config\Services::validation()->getErrors())->withInput();
        }

        $id             = $this->request->getPost('id');
        $fullname       = $this->request->getPost('fullname');
        $email          = $this->request->getPost('email');
        $username       = $this->request->getPost('username');
        $oldUserImage   = $this->request->getPost('oldUserImage');
        $newUserImage   = $this->request->getFile('user_img');

        $userModel = new UserModel();

        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->back()->with('error', '<i class="fas fa-circle-xmark"></i> User not found.');
        }

        $user->email    = $email;
        $user->username = $username;
        $user->fullname = $fullname;

        if ($newUserImage->isValid()) {
            // Upload new user image
            $newUserImage->move('img', $newUserImage->getRandomName());

            // Delete old user image
            if ($oldUserImage != 'default_profile.svg') {
                unlink('img/' . $oldUserImage);
            }

            $user->user_img = $newUserImage->getName();
        }

        $userModel->save($user);

        return redirect()->to('user')->with('pesan', '<i class="fas fa-circle-check"></i> Profile updated successfully.');
    }
}
