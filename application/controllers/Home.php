<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home_page');

	}

	public function createEvent()
	{
		$this->load->model('event');
		$eventData = $this->parseData($_POST);
		return $this->event->createEvent($eventData);
	}

	public function updateEvent()
	{
		$this->load->model('event');
		$eventData = $this->parseData($_POST);
		return $this->event->updateEvent($eventData);
	}

	public function retrieveEvents()
	{
		$this->load->model('event');
		var_dump($this->event->retrieveEvents());
	}

	public function parseData($data)
	{
		$eventData = array();
		$eventData['title'] = $data['title'];
		$startTimeData = explode(" ", $data['start']);
		$eventData['date'] = $startTimeData[0];
		$eventData['start_time'] = $startTimeData[1];
		$endTimeData = explode(" ", $data['end']);
		$eventData['end_time'] = $endTimeData[1];
		return $eventData;
	}
}
