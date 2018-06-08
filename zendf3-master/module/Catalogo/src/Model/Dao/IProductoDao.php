<?php

namespace Catalogo\Model\Dao;

use Catalogo\Model\Entity\Producto;

/**
 *
 * @author Andres
 */
interface IProductoDao {

    public function obtenerTodos();

    public function obtenerPorId($id);

    public function guardar(Producto $producto);

    public function eliminar(Producto $producto);

    public function obtenerCategorias();

    public function obtenerCategoriasSelect();
}
