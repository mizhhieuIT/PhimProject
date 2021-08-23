<?php
namespace App\repository\film;

interface filminterface{
    public function createFilm($payload);
    public function getAll();
    public function deleteFilm($id);
    public function findFilm($id);
    public function updateFilm($payload,$id);
}
