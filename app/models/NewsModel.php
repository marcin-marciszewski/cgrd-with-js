<?php

class NewsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getNews()
    {
        $this->db->query('SELECT * FROM news ORDER BY news.id DESC');

        return $this->db->all();
    }

    public function addNews($data)
    {
        $this->db->query('INSERT INTO news (title, description) VALUES (:title, :description)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);

        return $this->db->execute() ? true : false;
    }

    public function updateNews($data)
    {
        $this->db->query('UPDATE news SET title = :title, description = :description WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);

        return $this->db->execute() ? true : false;
    }

    public function deleteNews($id)
    {
        $this->db->query('DELETE FROM news  WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->execute() ? true : false;
    }

    public function getNewsById($id)
    {
        $this->db->query('SELECT * FROM news WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }
}
