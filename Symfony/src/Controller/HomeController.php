<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{

    public function index()
    {

        $url = 'http://tech-test.wamdev.net/';

        // funcion del helper para devolver el contenido de la web
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_result = curl_exec($curl);
        curl_close($curl);

        $fields = array(
            'Localizador', 'Huésped', 'Fecha de entrada',
            'Fecha de salida', 'Hotel', 'Precio', 'Posibles Acciones'
        );

        $result = array();
        $rows = preg_split('/\r\n|\r|\n/', $curl_result);
        foreach ($rows as $position => $row) {
            if (!empty($row)) {
                $row = explode(';', $row);
                foreach ($row as $key => $value) {
                    $result[$position][$fields[$key]] = trim($value);
                }
            }
        }

        $view_data = array(
            'bookings' => $result,
            'fields' => $fields,
        );

        return $this->render('home.html.twig', $view_data);
    }
}
