<?php
include "Conexion.php";

class GestorBD
{
    public function login($user, $password)
    {
        $db = Conexion::acceso();
        $correcto = false;
        $stmt = $db->prepare("SELECT * FROM restaurante WHERE Correo = ? and Clave = ?");
        $stmt->execute([$user, $password]);
        $restaurante = $stmt->fetch();
        if ($restaurante) {
            $correcto = 'true';
            $_SESSION['login'] = true;
            $_SESSION['carrito'] = [];
            $_SESSION['correo'] = (string)$user;
            return $correcto;
        } else {
            return $correcto;
        }

    }

    public function readCategorias()
    {
        $db = Conexion::acceso();
        try {
            $sql = 'Select * from categoria';
            $categorias = $db->query($sql);
            $arrayCategorias = array();
            foreach ($categorias as $categoria) {
                $cat = new Categorias($categoria['CodCat'], $categoria['Nombre'], $categoria['Descripcion']);
                array_push($arrayCategorias, $cat);
            }
            return $arrayCategorias;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    public function read1Categoria($codCat)
    {
        $db = Conexion::acceso();
        try {
            $sql = 'Select * from categoria where CodCat=?';
            $stmt = $db->prepare($sql);
            $stmt->execute(array($codCat));
            foreach ($stmt as $cat) {
                $c = new Categorias($cat['CodCat'], $cat['Nombre'], $cat['Descripcion']);
            }
            return $c;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    public function ptosCategoria($codCat)
    {
        $db = Conexion::acceso();
        try {
            $sql = 'Select * from producto where CodCat=?';
            $stmt = $db->prepare($sql);
            $stmt->execute(array($codCat));
            $arrayProductos = array();
            foreach ($stmt as $producto) {
                $p = new Productos($producto['CodProd'], $producto['CodCat'], $producto['Nombre'], $producto['Descripcion'], $producto['Peso'], $producto['Stock']);
                array_push($arrayProductos, $p);
            }
            return $arrayProductos;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    public function productoById($id)
    {
        $db = Conexion::acceso();
        try {
            $sql = 'Select * from producto where CodProd=?';
            $stmt = $db->prepare($sql);
            $stmt->execute(array($id));
            foreach ($stmt as $producto) {
                $p = new Productos($producto['CodProd'], $producto['CodCat'], $producto['Nombre'], $producto['Descripcion'], $producto['Peso'], $producto['Stock']);
                return $p;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    public function realizarPedidoP($correoRestaurante)
    {
        $db = Conexion::acceso();
        try {
            $sql3 = "Select * from restaurante where Correo =?";
            $restaurantes = $db->prepare($sql3);
            $restaurantes->execute(array($correoRestaurante));
            $codRes = null;
            foreach ($restaurantes as $r) {
                $codRes = $r['CodRes'];
            }
            $sql = "Select MAX(CodPed) from pedidosproductos";
            $resultados = $db->query($sql);
            $last_id = 0;
            foreach ($resultados as $r) {
                $last_id = $r[0];
            }
            $sql2 = 'Insert into pedido(CodPed,CodRes,Fecha,Enviado) values (?,?,?,?)';
            $stmt = $db->prepare($sql2);
            $nuevaFecha = date("Y-m-d");
            $stmt->execute(array((int)$last_id + 1, $codRes, (string)$nuevaFecha, "enviado"));
            return $last_id + 1;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    public function realizarPedidoPP($arrayCarrito)
    {
        $db = Conexion::acceso();
        try {
            $sql = "Select MAX(CodPed) from pedidosproductos";
            $resultados = $db->query($sql);
            $last_id = 0;
            foreach ($resultados as $r) {
                $last_id = $r[0];
            }
            foreach ($arrayCarrito as $key => $value) {
                $sql2 = "Insert into pedidosproductos (CodProd,CodPed, Unidades) values (?,?,?)";
                $stmt = $db->prepare($sql2);
                $stmt->execute(array((int)$key, (int)$last_id + 1, (int)$value));
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    public function actualizarStock($arrayCarrito)
    {
        foreach ($arrayCarrito as $key => $value) {
            $db = Conexion::acceso();
            try {
                $sql = "UPDATE producto set Stock=((SELECT Stock from producto where CodProd=?)-?) where CodProd=?";
                $stmt = $db->prepare($sql);
                $stmt->execute(array($key, $value, $key));
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            } finally {
                $db = null;
            }
        }
    }
}