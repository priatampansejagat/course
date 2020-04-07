<?php


class GlobalFunction{
	var $CI;
	public function __construct()
	{
		$this->CI =& get_instance();
		// $this->load->library(['MySession']);

	}

	public function isLogedIn($key){
		// LOGIN STATUS FUNCTION======================================
		if ($this->CI->mysession->checkData($key) == false || $this->CI->mysession->loginStatus($key) == false) {
			redirect(base_url().'login','refresh');
		}
	}

	public function saveImg($dir='./', $imgUpload){ //imgUpload adalah name pada form
		$nameImage=date('Ymdhisa');
		$target_dir = $dir;
		$target_file = $target_dir . basename($_FILES[$imgUpload]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		// if(isset($_POST["submit"])) {
		//     $check = getimagesize($_FILES[$imgUpload]["tmp_name"]);
		//     if($check !== false) {
		//         echo "File is an image - " . $check["mime"] . ".";
		//         $uploadOk = 1;
		//     } else {
		//         echo "File is not an image.";
		//         $uploadOk = 0;
		//     }
		// }
		// Check if file already exists

		// if (file_exists($target_file)) {
		//     echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }

		// Check file size
		if ($_FILES[$imgUpload]["size"] > 1000000) { //1MB
			return [false, '1'];
		    // echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			return [false, '2'];
		    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			return [false, '3'];
		    // echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			$target_file = $target_dir.$nameImage.'.'.$imageFileType;
		    if (move_uploaded_file($_FILES[$imgUpload]["tmp_name"], $target_file)) {
		    	return [true,$target_file];
		        // echo "The file ". basename( $_FILES[$imgUpload]["name"]). " has been uploaded.";
		    } else {
		        return [false, '4'];
		        // echo "Sorry, there was an error uploading your file.";
		    }
		}
	}


	public function getBasicData(){

		$data=[];
		// get data user data
		$selfusername 	=	$this->CI->mysession->loginGetData('username');	
		$dataUser = $this->CI->BasicQuery->selectAll('user',array('username' => $this->CI->mysession->loginGetData('username')));
		$data['user'] = $dataUser;

		// get menu
		$condMenu = array( 'id_role' => 'fdd38312da2d5ddc4b90a49aaa2bcf52d586572db5ce37cb2630799476aa13e4' );
		$resultMenu = $this->CI->BasicQuery->selectAllResult('menu',$condMenu);

		foreach ($resultMenu as $key => $value) {
			
			$data['menu'][$value['id']]=$value;

			// selecting submenu
			$condSubMenu = array('id_menu' => $value['id']);
			$resultSubMenu = $this->CI->BasicQuery->selectAllResult('submenu',$condSubMenu);

			$data['menu'][$value['id']]['submenu'] = $resultSubMenu;

		}

		return $data;
	}


}
	

?>