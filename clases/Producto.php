<?php 

class Producto
{
    private $id_producto;
    private $nombre;
    private $id_marca;
    private $foto;

    private function __constructor($id_producto, $nombre, $id_marca, $foto)
    {
        $this->setIdProducto($id_producto);
        $this->setNombre($nombre);
        $this->setIdMarca($id_marca);
        $this->setFoto($foto);
    }


    /**
     * Get the value of idProducto
     */ 
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    /**
     * Set the value of idProducto
     *
     * @return  self
     */ 
    public function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of id_marca
     */ 
    public function getIdMarca()
    {
        return $this->id_marca;
    }

    /**
     * Set the value of id_marca
     *
     * @return  self
     */ 
    public function setIdMarca($id_marca)
    {
        $this->id_marca = $id_marca;

        return $this;
    }

    /**
     * Get the value of foto
     */ 
    public function getfoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */ 
    public function setfoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }
}