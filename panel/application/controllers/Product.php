<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public $viewFolder = "";

	public function __construct() {
		parent::__construct();
		$this->viewFolder = "product_v";
		$this->load->model("product_model");
	}

	public function index()
	{
		$viewData = new stdClass();

		/** Tablodan verilerin getirilmesi. */
		$items = $this->product_model->get_all();

		/* View'e gönderilecek değişkenlerin set edilmesi */
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function new_form(){

		$viewData = new stdClass();

		/* View'e gönderilecek değişkenlerin set edilmesi */
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

	}

	public function save(){
		$this->load->library("form_validation");

		//Kurallar yazılır
		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<strong>{field}</strong> alanı zorunludur."
			)
		);
		// Form Validation çalıştırılır.
		// TRUE - FALSE
		$validate = $this->form_validation->run();

		if($validate) {
			$insert = $this->product_model->add(
				array(
					"title"         => $this->input->post("title"),
					"description"   => $this->input->post("description"),
					"url"           => "test..",
					"rank"          => 0,
					"isActive"      => 1,
					"createdAt"     => date("Y-m-d H:i:s"),
				)
			);

			if($insert) {
				echo "işlem başarılıdır.";
			}
			else{
				echo "işlem başarısız";
			}
		}
		else {
			$viewData = new stdClass();

			/* View'e gönderilecek değişkenlerin set edilmesi */
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->form_error = true;

			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

		}
	}
}
