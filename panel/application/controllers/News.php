<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public $viewFolder = "";

	public function __construct(){
		parent::__construct();
		$this->viewFolder = "News_v";
		$this->load->model("news_model");
		$this->load->model("product_image_model");

	}
	public function index()
	{
		$viewData = new stdClass();
		

		/** Tablodan verilerin getirilmesi */
		$items = $this->news_model->get_all(
			array(), "rank ASC"
		);
		

		/** View e gönderilecek değişkenlerin set edilmesi */
		$viewData->viewFolder = $this->viewFolder; /** dosya yolu dinamikleştirimesi*/
		$viewData->subViewFolder = "list";         /** dosya yolu dinamikleştirimesi*/
		$viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function new_form(){

		$viewData = new stdClass();

		/** View e gönderilecek değişkenlerin set edilmesi */
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder= "add";
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);

	}

	public function save(){


		$this->load->library("form_validation");

		//kurallar yazılır.
		

		
		$news_type = $this->input->post("news_type");
		


		if($news_type == "image") {
			
			if($_FILES["img_url"]["name"] == "" ){


				$alert = array(
					"title" => "İşlem Başarısızdır",
					"text"  => "Lütfen bir görsel seçiniz",
					"type"  => "error"
				);
				


				$this->session->set_flashdata("alert", $alert);

				redirect(base_url("news/new_form"));
				die();
				
			}

		}else if($news_type == "video"){

			$this->form_validation->set_rules("video_url","Video URL","required|trim");

		}
		
		
		$this->form_validation->set_rules("title","Başlık","required|trim");

		$this->form_validation->set_message(

			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır."    
			)
		);

		$validate = $this->form_validation->run(); 
		

		if($validate){

			echo "kayıt işlemi başlasın";
			die();
			
			$insert = $this->news_model->add(
				array(
					"title"       => $this->input->post("title"),
					"description" => $this->input->post("description"),
					"url"         =>convertToSEO($this->input->post("title")),
					"isActive"    => 1,
					"createdAt"   => date("Y-m-d H:i:s")
				)
			);


            //TODO Alert sistemi
			if($insert){
				$alert = array(
					"title" => "İşlem Başarılıdır",
					"text"  => "Kayıt başarılı bir şekilde eklendi",
					"type"  => "success"
				);

			}
			else{

				$alert = array(
					"title" => "İşlem Başarısızdır",
					"text"  => "Kayıt ekleme sırasında bir problem oluştu",
					"type"  => "error"
				);
				
			}

			$this->session->set_flashdata("alert", $alert);

			redirect(base_url("news"));
		}

		else {

			$viewData = new stdClass();

			/** View e gönderilecek değişkenlerin set edilmesi */
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder= "add";
			$viewData->form_error= true;
			$viewData->news_type = $news_type;
           
			
			
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
			
		} 

	}

	public function update_form($id){


		$viewData = new stdClass();
		/** Tablodan verilerin getirilmesi */
		$item = $this->news_model->get(
			array(
				"id" => $id

			)
		);



		/** View e gönderilecek değişkenlerin set edilmesi */
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder= "update";
		$viewData->item = $item;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);

	}

	public function update($id){
		$this->load->library("form_validation");
		//kurallar yazılır.
		$this->form_validation->set_rules("title","Başlık","required|trim");

		$this->form_validation->set_message(

			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır."    
			)
		);

		$validate = $this->form_validation->run(); 
		

		if($validate){
			
			$update = $this->news_model->update(
				array(
					"id" => $id 
				),
				array(
					"title"       => $this->input->post("title"),
					"description" => $this->input->post("description"),
					"url"         =>convertToSEO($this->input->post("title")),
					
				)
			);


            //TODO Alert sistemi eklenecek.
			if($update){
				$alert = array(
					"title" => "İşlem Başarılıdır",
					"text"  => "Kayıt başarılı bir şekilde güncellendi",
					"type"  => "success"
				);

			}
			else{

				$alert = array(
					"title" => "İşlem Başarısızdır",
					"text"  => "Güncelleme sırasında bir problem oluştu",
					"type"  => "error"
				);
				
			}

			$this->session->set_flashdata("alert", $alert);

			redirect(base_url("product"));
		}


		else {

			$viewData = new stdClass();
			$item = $this->news_model->get(
				array(
					"id" => $id

				)
			);

			/** View e gönderilecek değişkenlerin set edilmesi */
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder= "update";
			$viewData->form_error= true;
			$viewData->item = $item;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);

		} 

	}

	public function delete($id){

		$delete = $this->news_model->delete(
			array(
				"id"  => $id
			)
		);

     //TODO Alert sistemi eklenecek.
		if($delete){
			$alert = array(
				"title" => "İşlem Başarılıdır",
				"text"  => "Kayıt başarılı bir şekilde silindi",
				"type"  => "success"
			);

		}
		else{

			$alert = array(
				"title" => "İşlem Başarısızdır",
				"text"  => "Silme sırasında bir problem oluştu",
				"type"  => "error"
			);

		}

		$this->session->set_flashdata("alert", $alert);

		redirect(base_url("product"));
	}



	public function imageDelete($id, $parent_id){

		$fileName = $this->product_image_model->get(
			array(
				"id" => $id
			)
		);

		$delete = $this->product_image_model->delete(
			array(
				"id"         => $id,
				"product_id" => $parent_id
			)
		);

     //TODO Alert sistemi eklenecek.
		if($delete){

			unlink("uploads/{$this->viewFolder}/$fileName->img_url");

			redirect(base_url("product/image_form/$parent_id"));
		}
		else{
			redirect(base_url("product/image_form/$parent_id"));
		}

	}

	public function isActiveSetter($id){

		if($id){
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			//true-false bilgisi buraya custom.js ten gelir.custom.js te bu bilgi isActive sınıfına bağlı değişiklik eventi ile alınır ve prop ile true-false değer alınıp jQuery nin post metoduyla gönderilir.

			$this->news_model->update(
				array(
					"id"  => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}

	}

	public function rankSetter(){

		$data = $this->input->post("data");
		parse_str($data, $order);
		$items = $order["ord"];
		foreach ($items as $rank => $id) {
			$this->news_model->update(
				array(
					"id"     => $id,
					"rank!=" => $rank
				),
				array(

					"rank"=> $rank
				)
			);
		}

	}

	public function imageRankSetter(){

		$data = $this->input->post("data");
		parse_str($data, $order);
		$items = $order["ord"];
		foreach ($items as $rank => $id) {
			$this->product_image_model->update(
				array(
					"id"     => $id,
					"rank!=" => $rank
				),
				array(

					"rank"=> $rank
				)
			);
		}

	}

	public function image_form($id){

		$viewData = new stdClass();

		/** View e gönderilecek değişkenlerin set edilmesi */
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder= "image";

		$viewData->items = $this->news_model->get(
			array(
				"id" => $id
			)
		);

		$viewData->item_images = $this->product_image_model->get_all(
			array(
				"product_id" => $id
			),
			"rank ASC"
		);


		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);

	}

	public function image_upload($id){
		$file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"] , PATHINFO_EXTENSION);

		$config["allowed_types"] = "jpg|jpeg|png"	;
		$config["upload_path"]   = "uploads/$this->viewFolder/";
		$config["file_name"]     = $file_name;

		$this->load->library("upload", $config);
		$upload = $this->upload->do_upload("file");
		if($upload){
			$uploaded_file = $this->upload->data("file_name");

			$this->product_image_model->add(

				array(
					"img_url"    => $uploaded_file,
					"rank"       => 0,
					"isActive"   => 1,
					"createdAt"  =>date("Y-m-d H:i:s"),
					"product_id" =>$id
				)
			);
		}else{
			echo " işlem başarısız";
		}

	}

	public function refresh_image_list($id){
		$viewData = new stdClass();

		/** View e gönderilecek değişkenlerin set edilmesi */
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder= "image";

		$viewData->item_images = $this->product_image_model->get_all(
			array(
				"product_id" => $id
			)
		);


		$render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v",$viewData,true);
		echo $render_html;
	}

	public function isCoverSetter($id, $parent_id){

		if($id && $parent_id){
			$isCover = ($this->input->post("data") === "true") ? 1 : 0;
			//true-false bilgisi buraya custom.js ten gelir.custom.js te bu bilgi isActive sınıfına bağlı değişiklik eventi ile alınır ve prop ile true-false değer alınıp jQuery nin post metoduyla gönderilir.


			//kapak yapılmak istenen kayıt
			$this->product_image_model->update(
				array(
					"id"         => $id,
					"product_id" => $parent_id
				),
				array(
					"isCover" => $isCover
				)
			);

            //kapak yapılmayan diğer kayıtlar
			$this->product_image_model->update(
				array(
					"id!="       => $id,
					"product_id" => $parent_id
				),
				array(
					"isCover" => 0
				)
			);
			$viewData = new stdClass();

			/** View e gönderilecek değişkenlerin set edilmesi */
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder= "image";

			$viewData->item_images = $this->product_image_model->get_all(
				array(
					"product_id" => $parent_id
				),"rank ASC"
			);


			$render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v",$viewData,true);
			echo $render_html;
		}



	}

	public function imageIsActiveSetter($id){

		if($id){
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			//true-false bilgisi buraya custom.js ten gelir.custom.js te bu bilgi isActive sınıfına bağlı değişiklik eventi ile alınır ve prop ile true-false değer alınıp jQuery nin post metoduyla gönderilir.

			$this->product_image_model->update(
				array(
					"id"  => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}


	}



}



?>