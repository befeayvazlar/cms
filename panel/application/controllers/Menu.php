<?php

class Menu extends CD_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "menu_v";

        $this->load->model('Menu_model', 'menu');

	    if(!get_active_user()){
		    redirect(base_url("login"));
	    }
    }

    public function index(){

        $viewData = new stdClass();

        $menus = $this->menu->get_all(array(), "menu_id ASC");
        $viewData->menus = $menus;

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function getAjaxmenu()
    {
        if($this->input->is_ajax_request()) {
            header('Content-Type: application/json');

            $menu = $this->menu->getMenu();
            echo json_encode($menu);
        }
    }

    public function postAjaxmenu()
    {
        if($this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            $input_data = $this->input->post('data');

            $no = 0;
            $seq_no = 0;
            foreach ($input_data as $data)
            {
                $id = $data['id'];
                $parent_id = isset($data['parent_id']) ? $data['parent_id'] : null;

                if($parent_id !=0){
                    $no++;
                } else {
                    $no = 0;
                    $seq_no++;
                }

                $sequence = $parent_id == 0 ? $seq_no : $parent_id.'.'.$no;

                $update_data = ['menu_parent_id' => $parent_id, 'menu_sequence' => $sequence];
                $where = ['menu_id' => $id];
                $this->menu->updateMenu($where, $update_data);
            }

            echo json_encode(['success' => true]);
        }
    }

    public function save(){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("menu_name", "Menü Adı", "required|trim|min_length[2]");

        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> alanı doldurulmalıdır",
                "min_length"    => "<b>{field}</b> en az 2 karakterden oluşmalıdır",
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){

            $last_menu_sequence = $this->menu->get(array(""), "menu_sequence DESC");

            if(!empty($last_menu_sequence)){

                $last_menu_sequence = ($last_menu_sequence->menu_sequence);
                $last_menu_sequence = explode(".",$last_menu_sequence);

                $last_menu_sequence_0 = ($last_menu_sequence[0]);
                //$last_menu_sequence_1 = ($last_menu_sequence[1]);

            }

            else{
                $last_menu_sequence_0 = 0;
            }

            if($this->input->post("menu_id") != 0){

                $last_menu_sequence = $this->menu->get(array("menu_parent_id" => $this->input->post("menu_id")), "menu_id DESC");

                $last_menu_sequence = ($last_menu_sequence->menu_sequence);
                $last_menu_sequence = explode(".",$last_menu_sequence);

                $last_menu_sequence_0 = ($last_menu_sequence[0]);
                $last_menu_sequence_1 = ($last_menu_sequence[1]);

                $insert = $this->menu->add(array(
                    "menu_parent_id" => $this->input->post("menu_id"),
                    "menu_sequence" => $this->input->post("menu_id").'.'.(($last_menu_sequence_1)+1),
                    "menu_name" => (!empty($this->input->post("menu_name"))) ? $this->input->post("menu_name") : null,
                    "menu_url" => (!empty($this->input->post("menu_url"))) ? $this->input->post("menu_url") : "#"
                ));

                // TODO Alert sistemi eklenecek...
                if ( $insert ) {

                    $alert = array(
                        "title" => "İşlem Başarılı",
                        "text"  => "Kayıt başarılı bir şekilde eklendi",
                        "type"  => "success"
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text"  => "Kayıt Ekleme sırasında bir problem oluştu",
                        "type"  => "error"
                    );
                }

                $this->session->set_flashdata( "alert", $alert );

            }
            else {
                $insert = $this->menu->add(
                    $data = array(
                        "menu_parent_id" => null,
                        "menu_sequence" => (($last_menu_sequence_0)+1),
                        "menu_name" => (!empty($this->input->post("menu_name"))) ? $this->input->post("menu_name") : null,
                        "menu_url" => (!empty($this->input->post("menu_url"))) ? $this->input->post("menu_url") : "#"
                    ));

                // TODO Alert sistemi eklenecek...
                if ( $insert ) {

                    $alert = array(
                        "title" => "İşlem Başarılı",
                        "text"  => "Kayıt başarılı bir şekilde eklendi",
                        "type"  => "success"
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text"  => "Kayıt Ekleme sırasında bir problem oluştu",
                        "type"  => "error"
                    );
                }

                $this->session->set_flashdata( "alert", $alert );
            }

            redirect(base_url("menu"));

        }
        else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "list";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }
    }

    public function update_form($id)
    {

        if (!isAllowedUpdateModule()) {
            redirect(base_url($this->router->fetch_class()));
        }

        $viewData = new stdClass();

        $menus = $this->menu->get_all(array(), "menu_id ASC");

        /** Tablodan Verilerin Getirilmesi.. */

        $menu_item = $this->menu->get(
            array(
            "menu_id" => $id
            )
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->menus = $menus;
        $viewData->menu_item = $menu_item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function update($id){

        if (!isAllowedUpdateModule()) {
            redirect(base_url($this->router->fetch_class()));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("menu_name", "Menü Adı", "required|trim|min_length[2]");

        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> alanı doldurulmalıdır",
                "min_length"    => "<b>{field}</b> en az 2 karakterden oluşmalıdır",
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){

            $last_menu_sequence = $this->menu->get(array(""), "menu_sequence DESC");

            if(!empty($last_menu_sequence)){

                $last_menu_sequence = ($last_menu_sequence->menu_sequence);
                $last_menu_sequence = explode(".",$last_menu_sequence);

                $last_menu_sequence_0 = ($last_menu_sequence[0]);
                //$last_menu_sequence_1 = ($last_menu_sequence[1]);

            }

            else{
                $last_menu_sequence_0 = 0;
            }

            if($this->input->post("menu_id") != 0){

                $last_menu_sequence = $this->menu->get(array("menu_parent_id" => $this->input->post("menu_id")), "menu_id DESC");

                $last_menu_sequence = ($last_menu_sequence->menu_sequence);
                $last_menu_sequence = explode(".",$last_menu_sequence);

                $last_menu_sequence_0 = ($last_menu_sequence[0]);
                $last_menu_sequence_1 = ($last_menu_sequence[1]);

                    $data = array(
                        "menu_parent_id" => $this->input->post("menu_id"),
                        "menu_sequence" => $this->input->post("menu_id").'.'.(($last_menu_sequence_1)+1),
                        "menu_name" => (!empty($this->input->post("menu_name"))) ? $this->input->post("menu_name") : null,
                        "menu_url" => (!empty($this->input->post("menu_url"))) ? $this->input->post("menu_url") : "#"
                    );

            }
            else {

                    $data = array(
                        "menu_parent_id" => null,
                        "menu_sequence" => ($last_menu_sequence_0),
                        "menu_name" => (!empty($this->input->post("menu_name"))) ? $this->input->post("menu_name") : null,
                        "menu_url" => (!empty($this->input->post("menu_url"))) ? $this->input->post("menu_url") : "#"
                    );

            }

            $update = $this->menu->update(array("menu_id" => $id), $data);

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

            redirect(base_url("menu"));

        }
        else {

            $viewData = new stdClass();

            $menus = $this->menu->get_all(array(), "menu_id ASC");

            /** Tablodan Verilerin Getirilmesi.. */

            $menu_item = $this->menu->get(
                array(
                    "menu_id" => $id
                )
            );

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->menus = $menus;
            $viewData->menu_item = $menu_item;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }

    }

    public function delete($id){

        if (!isAllowedDeleteModule()) {
            redirect(base_url($this->router->fetch_class()));
        }

        $menu_item = $this->menu->get(array("menu_id" => $id), "menu_id DESC");

        /*if($menu_item->menu_parent_id != null){

            $delete = $this->menu->delete(
                array("menu_parent_id" => $menu_item->menu_parent_id)
            );

        }*/
       /* else{*/

            $delete = $this->menu->delete(
                array("menu_id" => $id)
            );
       /* }*/

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
        redirect(base_url("menu"));


    }

}
