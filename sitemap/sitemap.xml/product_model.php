<!-- Ubicación: application/models/Product_model.php -->
<?php
class Product_model extends CI_Model {

    public function get_all_products() {
        // Obtiene todos los productos desde la base de datos
        $query = $this->db->get('products');
        return $query->result();
    }
}
?>
