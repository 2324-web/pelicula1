<?php

require_once "modelo/Pelicula.php";
require_once "modelo/PeliculaDao.php";

class PeliculaController
{
    private $dao;

    // CONSTRUCTOR
    public function __construct($dao)
    {
        $this->dao = $dao;
    }

    // LISTAR
    public function index()
    {
        $peliculas = $this->dao->listar();

        require "vista/peliculas/index.php";
    }

    // NUEVO
    public function nuevo()
    {
        $pelicula = new Pelicula();

        require "vista/peliculas/formulario.php";
    }

    // GUARDAR
    public function guardar()
    {
        $pelicula = new Pelicula();

        $pelicula->setNombre($_POST["nombre"]);
        $pelicula->setGenero($_POST["genero"]);
        $pelicula->setDuracion($_POST["duracion"]);
        $pelicula->setImagenportada($_POST["imagenportada"]);

        $this->dao->insertar($pelicula);

        header("Location: index.php");
        exit;
    }
}