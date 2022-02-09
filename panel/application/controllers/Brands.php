<?php

class Brands extends CD_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "brands_v";

        $this->load->model("brand_model");
        $this->load->model('customer_model', 'customer');

	    if(!get_active_user()){
		    redirect(base_url("login"));
	    }
    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->brand_model->get_all(
        	// Haber sırasına göre artan sıralama
            array(), "rank ASC"
	        // Haber id sine göre güncelden geçmişe göre sıralama
	        //array(), "id DESC"
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    function getLists(){
        $data = $row = array();

        // Fetch customer's records
        $cusData = $this->customer->getRows($_POST);

        $i = $_POST['start'];
        foreach($cusData as $customer){
            $i++;
            $createdAt = time_ago_in_cms($customer->createdAt);
            $isActiveButton = '<input data-url="'.base_url("brands/isActiveSetter/$customer->id").'" class="isActive" type="checkbox" data-switchery data-color="#10c469" checked />';
            $isPassiveButton = '<input data-url="'.base_url("brands/isActiveSetter/$customer->id").'" class="isActive" type="checkbox" data-switchery data-color="#10c469" />';
            $action = '<button data-url="'.base_url("brands/delete/$customer->id").'" class="btn btn-sm btn-danger btn-outline remove-btn"><i class="fa fa-trash"></i> Sil</button><a href="'.base_url("brands/update_form/$customer->id").'" class="m-l-xs btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>';
            $isActive = ($customer->isActive == 1) ? $isActiveButton : $isPassiveButton;
            $data[] = array($i, $customer->id, $customer->first_name, $customer->last_name, $customer->phone, $customer->address, $customer->city, $customer->country, $isActive, $createdAt, $action);
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->customer->countAll(),
            "recordsFiltered" => $this->customer->countFiltered($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function list_all()
    {
        $this->load->library('datatables_server_side', array(
        'table' => 'customers',
        'primary_key' => 'id',
        'columns' => array('id', 'first_name', 'last_name', 'phone', 'address', 'city', 'country', 'isActive', 'createdAt'),
        //'where' => array('country' => 'USA', 'city' => 'Boston')
        ));

		$this->datatables_server_side->process('id');

    }

    public function new_form(){

        if(!isAllowedWriteModule()){
            redirect(base_url("brands"));
        }

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){

        if (!isAllowedWriteModule()) {
            redirect(base_url($this->router->fetch_class()));
        }

            $this->load->library("form_validation");

        // Kurallar yazilir..

	    if($_FILES["img_url"]["name"] == ""){

		    $alert = array(
			    "title" => "İşlem Başarısız",
			    "text" => "Lütfen bir görsel seçiniz",
			    "type"  => "error"
		    );

		    // İşlemin Sonucunu Session'a yazma işlemi...
		    $this->session->set_flashdata("alert", $alert);

		    redirect(base_url("brands/new_form"));

		    die();
	    }

        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){
	        // Upload Süreci...

	        $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            $image_350x216 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder", 350, 216, $file_name );

            if ($image_350x216) {

		        $insert = $this->brand_model->add(
			        $data = array(
				        "title"         => $this->input->post("title"),
				        "img_url"       => $file_name,
				        "rank"          => 0,
				        "isActive"      => 1,
				        "createdAt"     => date("Y-m-d H:i:s")
			        )
		        );

		        // TODO Alert sistemi eklenecek...
		        if($insert){

			        $alert = array(
				        "title" => "İşlem Başarılı",
				        "text" => "Kayıt başarılı bir şekilde eklendi",
				        "type"  => "success"
			        );

		        } else {

			        $alert = array(
				        "title" => "İşlem Başarısız",
				        "text" => "Kayıt Ekleme sırasında bir problem oluştu",
				        "type"  => "error"
			        );
		        }

	        } else {

		        $alert = array(
			        "title" => "İşlem Başarısız",
			        "text" => "Görsel yüklenirken bir problem oluştu",
			        "type"  => "error"
		        );

		        $this->session->set_flashdata("alert", $alert);

		        redirect(base_url("brands/new_form"));

		        die();

	        }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("brands"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id){

        if(!isAllowedUpdateModule()){
            redirect(base_url("brands"));
        }

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->brand_model->get(
            array(
                "id"    => $id,
            )
        );
        
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function update($id){

        if (!isAllowedUpdateModule()) {
            redirect(base_url($this->router->fetch_class()));
        }

        $this->load->library("form_validation");

        // Kurallar yazilir..

        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){

	        // Upload Süreci...
	        if($_FILES["img_url"]["name"] !== "") {

		        $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $image_350x216 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder", 350, 216, $file_name );

                if ($image_350x216) {

			        $data = array(
				        "title" => $this->input->post("title"),
				        "img_url" => $file_name
			        );

		        } else {

			        $alert = array(
				        "title" => "İşlem Başarısız",
				        "text" => "Görsel yüklenirken bir problem oluştu",
				        "type" => "error"
			        );

			        $this->session->set_flashdata("alert", $alert);

			        redirect(base_url("brands/update_form/$id"));

			        die();

		        }

	        } else {

		        $data = array(
			        "title" => $this->input->post("title")
		        );

	        }

            $update = $this->brand_model->update(array("id" => $id), $data);

            // TODO Alert sistemi eklenecek...
            if($update){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("brands"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->brand_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){

        if (!isAllowedDeleteModule()) {
            redirect(base_url($this->router->fetch_class()));
        }

        //$delete = $this->brand_model->delete(
        $delete = $this->customer->delete(
            array(
                "id"    => $id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type"  => "error"
            );


        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("brands"));


    }

    public function isActiveSetter($id){

        if (!isAllowedUpdateModule()) {
            die();
        }

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            //$this->brand_model->update(
            $this->customer->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    public function rankSetter(){

        if (!isAllowedUpdateModule()) {
            die();
        }

        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->brand_model->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );

        }

    }

}
