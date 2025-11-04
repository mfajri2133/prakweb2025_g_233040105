<?php

class User extends Controller
{
    public function index()
    {
        $data['judul'] = 'Data User';
        $data['users'] = $this->model('User_model')->getAllUsers();

        $this->view('templates/header', $data);
        $this->view('user/list', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail User';
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('user/detail', $data);
    }
}
