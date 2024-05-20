<!-- ubicación: application/tasks/SendIndexationRequest.php -->

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SendIndexationRequest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('google/google_client');
        $this->load->config('google');
    }

    public function index()
    {
        // Configurar cliente de Google
        $client = $this->google_client->create();
        $client->setAuthConfig($this->config->item('google'));
        $client->setScopes($this->config->item('google')['scopes']);

        // Obtener URL del sitemap
        $sitemapUrl = 'https://tusitioweb.com/sitemap.xml';

        // Enviar solicitud de indexación
        $indexingService = new Google_Service_Indexing($client);
        $urlNotification = new Google_Service_Indexing_UrlNotification();
        $urlNotification->setUrl($sitemapUrl);
        $request = new Google_Service_Indexing_UrlNotificationSet();
        $request->setNotificationConfigs([$urlNotification]);
        $indexingService->urlNotifications->set($sitemapUrl, $request);

        echo 'Solicitud de indexación enviada correctamente';
    }
}
