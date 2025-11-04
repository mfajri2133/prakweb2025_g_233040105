<?php

class User extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Pengguna';
        $data['users'] = $this->model('User_model')->getAllUsers();

        $this->view('templates/header', $data);
        $this->view('user/list', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $data['judul'] = 'Tambah Pengguna';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('User_model')->addUser($_POST) > 0) {
                header('Location: ' . BASEURL . '/user');
                exit;
            }
        }
        $this->view('templates/header', $data);
        $this->view('user/add', $data);
        $this->view('templates/footer');
    }

    public function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($this->model('User_model')->updateUser($_POST) > 0) {
                header('Location: ' . BASEURL . '/user');
                exit;
            }
        }

        $data['judul'] = 'Ubah Pengguna';
        $data['user'] = $this->model('User_model')->getUserById($id);

        $this->view('templates/header', $data);
        $this->view('user/edit', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Pengguna';
        $data['user'] = $this->model('User_model')->getUserById($id);

        $this->view('templates/header', $data);
        $this->view('user/detail', $data);
        $this->view('templates/footer');
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model('User_model')->deleteUser($_POST['id']) > 0) {
                header('Location: ' . BASEURL . '/user');
                exit;
            }
        }
    }
}
