<!-- application/controllers/IndexController.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('google_client');
        $this->load->config('google');
    }

    public function index()
    {
        // Configurar cliente de Google
        $client = $this->google_client->create();
        $client->setAuthConfig($this->config->item('google')['credentials']);
        $client->setScopes($this->config->item('google')['scopes']);

        // Obtener URL del sitemap
        $sitemapUrl = 'https://alugo.com.ar/sitemap.xml';

        // Enviar solicitud de indexación
        $indexingService = new Google_Service_Indexing($client);
        $urlNotification = new Google_Service_Indexing_UrlNotification();
        $urlNotification->setUrl($sitemapUrl);
        $urlNotification->setType("URL_UPDATED");

        try {
            $response = $indexingService->urlNotifications->publish($urlNotification);
            echo 'Solicitud de indexación enviada correctamente: ' . json_encode($response);
        } catch (Exception $e) {
            echo 'Error al enviar la solicitud de indexación: ' . $e->getMessage();
        }
    }
}
?>
