<?php

class News extends Controller
{
    private $newsModel;
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->newsModel = $this->model('NewsModel');
    }

    public function index()
    {
        $data = [
            'news' => $this->newsModel->getNews(),
            'title' => '',
            'description' => ''
        ];
        $this->view('news/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description'])
            ];

            if (!empty($data['title']) && !empty($data['description'])) {
                if ($this->newsModel->addNews($data)) {
                    flash('news_message', 'News was successfully created!', 'message message-success');
                }
            }
        }
        redirect('news');
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'id' => (int) $id,
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description'])
            ];

            if (!empty($data['title']) && !empty($data['description'])) {
                if ($this->newsModel->updateNews($data)) {
                    flash('news_message', 'News was successfully changed!', 'message message-success');
                }
            }
        }
        redirect('news');
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->newsModel->deleteNews($id)) {
                flash('news_message', 'News was deleted!', 'message message-success');
            }
        }
        redirect('news');
    }
}
