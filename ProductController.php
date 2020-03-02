
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ProductModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
		  $this->load->library('cart');
	}
 

	public function index()
	{	$this->load->view('index');
	}

	public function viewProduct($produceCode)
    {	$data['view_data']= $this->ProductModel->drilldown($produceCode);
		$this->load->view('ProductView', $data);
    }

	public function listProducts() 
	{	$data['product_info']=$this->ProductModel->get_all_products();
		$this->load->view('ProductListView',$data);
	}

	public function editProduct($produceCode)
    {	$data['edit_data']= $this->ProductModel->drilldown($produceCode);
		$this->load->view('updateProductView', $data);
    }

	public function deleteProduct($produceCode)
    {	$deletedRows = $this->ProductModel->deleteProductModel($produceCode);
		if ($deletedRows > 0)
			$data['message'] = "$deletedRows author has been deleted";
		else
			$data['message'] = "There was an error deleting the author with an ID of $produceCode";
		$this->load->view('displayMessageView',$data);
    }

    public function updateProduct($produceCode)
    {	$pathToFile = $this->uploadAndResizeFile();
		$this->createThumbnail($pathToFile);

		//set validation rules
		$this->form_validation->set_rules('produceCode', 'Produce Code', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('productLine', 'Product Line', 'required');	
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('quantityInStock', 'Quantity In Stock', 'required');
		$this->form_validation->set_rules('bulkBuyPrice', 'Bulk Buy Price', 'required');	
		$this->form_validation->set_rules('bulkSalePrice', 'Bulk Sale Price', 'required');
	
		//get values from post
		$produceCode = $this->input->post('produceCode');
		$aProduct['description'] = $this->input->post('description');
$aProduct['productLine'] = $this->input->post('productLine');
$aProduct['supplier'] = $this->input->post('suppiler');
$aProduct['quantityInLine'] = $this->input->post('quantityInLine');
$aProduct['bulkBuyPrice'] = $this->input->post('bulkBuyPrice');
$aProduct['bulkSalePrice'] = $this->input->post('bulkSalePrice');
		$aProduct['photo'] = $_FILES['userfile']['name'];

		//check if the form has passed validation
		if (!$this->form_validation->run()){
			$this->load->view('updateProductView', $aProduct);
			return;
		}

		
		//check if update is successful
		if ($this->ProductModel->updateProductModel($aProduct, $produceCode)) {
			redirect('ProductController/listProducts');
		}
		else {
			$data['message']="Uh oh ... problem on update";
		}
    }

	public function handleInsert(){
		if ($this->input->post('submitInsert')){

			$pathToFile = $this->uploadAndResizeFile();
			$this->createThumbnail($pathToFile);
		
			//set validation rules
			$this->form_validation->set_rules('produceCode', 'Produce Code', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('productLine', 'Product Line', 'required');	
			$this->form_validation->set_rules('supplier', 'Supplier', 'required');
			$this->form_validation->set_rules('quantityInStock', 'Quantity In Stock', 'required');
			$this->form_validation->set_rules('bulkBuyPrice', 'Bulk Buy Price', 'required');	
			$this->form_validation->set_rules('bulkSalePrice', 'Bulk Sale Price', 'required');

			//get values from post
			$aProduct['produceCode'] = $this->input->post('produceCode');
			$aProduct['description'] = $this->input->post('description');
			$aProduct['productLine'] = $this->input->post('productLine');
			$aProduct['supplier'] = $this->input->post('supplier');
			$aProduct['quantityInStock'] = $this->input->post('quantityInStock');
			$aProduct['bulkBuyPrice'] = $this->input->post('bulkBuyPrice');
			$aProduct['bulkSalePrice'] = $this->input->post('bulkSalePrice');
			$aProduct['photo'] = $_FILES['userfile']['name'];
			
			//check if the form has passed validation
			if (!$this->form_validation->run()){
				//validation has failed, load the form again
				$this->load->view('insertProductView', $aProduct);
				return;
			}

			//check if insert is successful
			if ($this->ProductModel->insertProductModel($aProduct)) {
				$data['message']="The insert has been successful";
			}
			else {
				$data['message']="Uh oh ... problem on insert";
			}
			
			//load the view to display the message
			$this->load->view('displayMessageView', $data);
			
			return;
		}
		$aProduct['produceCode'] = "";
		$aProduct['description'] = "";
		$aProduct['productLine'] = "";
		$aProduct['suppiler'] = "";
		$aProduct['quantityInStock'] = "";
		$aProduct['bulkBuyPrice'] = "";
		$aProduct['bulkSalePrice'] = "";
		$aProduct['photo'] = "";

		//load the form
		$this->load->view('insertProductView', $aProduct);
	}

	function uploadAndResizeFile()
	{	//set config options for thumbnail creation
		$config['upload_path']='./assets/images/full/';
		$config['allowed_types']='gif|jpg|png';
		$config['max_size']='100';
		$config['max_width']='1024';
		$config['max_height']='768';
		
		$this->load->library('upload',$config);
		if (!$this->upload->do_upload())
			echo $this->upload->display_errors();
		else
			echo 'upload done<br>';	
	
		$upload_data = $this->upload->data();
		$path = $upload_data['full_path'];
		
		$config['source_image']=$path;
		$config['maintain_ratio']='FALSE';
		$config['width']='180';
		$config['height']='200';

		$this->load->library('image_lib',$config);
		if (!$this->image_lib->resize())
			echo $this->image_lib->display_errors();
		else
			echo 'image resized<br>';
			
		$this->image_lib->clear();
		return $path;
	}
	
	function createThumbnail($path)
	{	//set config options for thumbnail creation
		$config['source_image']=$path;
		$config['new_image']='./assets/images/thumbs/';
		$config['maintain_ratio']='FALSE';
		$config['width']='42';
		$config['height']='42';
		
		//load library to do the resizing and thumbnail creation
		$this->image_lib->initialize($config);
		
		//call function resize in the image library to physiclly create the thumbnail
		if (!$this->image_lib->resize())
			echo $this->image_lib->display_errors();
		else
			echo 'thumbnail created<br>';	
	}
	

		public function handleSearch()

		{
		
		$this->form_validation->set_rules('Search', 'Search Term', 'required');
		
		if ($this->form_validation->run()){
				//validation has failed, load the form again
				$description = $this->input->post('Search');
				$data['Search'] = "";
				$data['product_info']=$this->ProductModel->get_search_products($description);
				$this->load->view('ProductListView',$data);
				return;
			}
			else
			{
				$data['product_info']=$this->ProductModel->get_all_products();
				$data['Search'] = "";
				$this->load->view('ProductListView',$data);
				return;
			}
		}
	}


	