<?php
namespace TECWEB\MYAPI;

require_once __DIR__ . '/DataBase.php';

class Products extends DataBase {
    public $data = [];

    // Crear producto
    public function add($jsonOBJ) {
        $this->data = array(
            'status' => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        );

        if (isset($jsonOBJ->nombre)) {
            $nombre = $this->conexion->real_escape_string($jsonOBJ->nombre);
            $sql = "SELECT * FROM productos WHERE nombre = '$nombre' AND eliminado = 0";
            $result = $this->conexion->query($sql);

            if ($result && $result->num_rows == 0) {
                $this->conexion->set_charset("utf8");

                $precio = $this->conexion->real_escape_string($jsonOBJ->precio ?? 0);
                $descripcion = $this->conexion->real_escape_string($jsonOBJ->descripcion ?? '');

                $sql = "INSERT INTO productos (nombre, precio, descripcion, eliminado)
                        VALUES ('$nombre', '$precio', '$descripcion', 0)";

                if ($this->conexion->query($sql)) {
                    $this->data['status'] = "success";
                    $this->data['message'] = "Producto agregado correctamente";
                } else {
                    $this->data['message'] = "Error al agregar producto: " . $this->conexion->error;
                }
            }
        }

        return json_encode($this->data);
    }

    // Actualizar producto
    public function update($jsonOBJ) {
        $this->data = [
            'status' => 'error',
            'message' => 'Datos incompletos para actualizar'
        ];

        if (isset($jsonOBJ->id, $jsonOBJ->nombre)) {
            $id = (int)$jsonOBJ->id;
            $nombre = $this->conexion->real_escape_string($jsonOBJ->nombre);
            $precio = $this->conexion->real_escape_string($jsonOBJ->precio ?? 0);
            $descripcion = $this->conexion->real_escape_string($jsonOBJ->descripcion ?? '');

            $sql = "UPDATE productos 
                    SET nombre = '$nombre', precio = '$precio', descripcion = '$descripcion' 
                    WHERE id = $id AND eliminado = 0";

            if ($this->conexion->query($sql)) {
                $this->data['status'] = 'success';
                $this->data['message'] = 'Producto actualizado correctamente';
            } else {
                $this->data['message'] = 'Error al actualizar: ' . $this->conexion->error;
            }
        }

        return json_encode($this->data);
    }

    // Eliminar producto (soft delete)
    public function delete($jsonOBJ) {
        $this->data = [
            'status' => 'error',
            'message' => 'ID no válido para eliminar'
        ];

        if (isset($jsonOBJ->id)) {
            $id = (int)$jsonOBJ->id;

            $sql = "UPDATE productos SET eliminado = 1 WHERE id = $id";

            if ($this->conexion->query($sql)) {
                $this->data['status'] = 'success';
                $this->data['message'] = 'Producto eliminado correctamente';
            } else {
                $this->data['message'] = 'Error al eliminar: ' . $this->conexion->error;
            }
        }

        return json_encode($this->data);
    }
}
