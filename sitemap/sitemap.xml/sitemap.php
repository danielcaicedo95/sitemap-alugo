<!-- Ubicación: application/controllers/Sitemap.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

    public function index() {
        // Carga el modelo de productos
        $this->load->model('Product_model');
        
        // ontener los productos
        $products = $this->Product_model->get_all_products();
        
        // Pasa los datos a la vista
        $data['products'] = $products;
        
        // Carga la vista del sitemap
        $this->load->view('sitemap_view', $data);
    }
}
?>
