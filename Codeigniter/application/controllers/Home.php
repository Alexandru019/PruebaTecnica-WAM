<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('curl');

		$url = 'http://tech-test.wamdev.net/';

		$result = curlRequest($url);

		$fields = array(
			'Localizador', 'Huésped', 'Fecha de entrada',
			'Fecha de salida', 'Hotel', 'Precio', 'Posibles Acciones'
		);

		$bookings = array();
		$rows = preg_split('/\r\n|\r|\n/', $result);
		foreach ($rows as $position => $row) {
			if (!empty($row)) {
				$row = explode(';', $row);
				foreach ($row as $key => $value) {
					$bookings[$position][$fields[$key]] = trim($value);
				}
			}
		}

		$view_data = array(
			'bookings' => $bookings,
			'fields' => $fields,
		);

		$this->load->view('home', $view_data);
	}
}
