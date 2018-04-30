<?php 

	$target_dir = "uploads/";
	$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


	if (isset($_POST['submit'])) {
		
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if ($check !== false) {
				
				//echo "File is an Image - " .$check["mime"].".";
				$uploadOk = 1;
		}

		else{
			echo "File is not an image.";
			$uploadOk = 0;
		}	



	} // main if ends


	 //// valid the file and upload it to the Folder

	// file exist
	if (file_exists($target_file)) {
		echo "Sorry ! File exist.";
		$uploadOk = 0;
	}

	// too large
	if($_FILES["fileToUpload"]["size"] > 500000){

			echo "File is too large.";
			$uploadOk = 0;
	}

	// allow certain file 
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){

			echo "Sorry File type not allowed.";
			$uploadOk = 0;
	}

	// check if everything is ok then put the data

	if ($uploadOk == 0) {
			
			echo "Sorry ! your file was not uploaded.";
	}
	else{

		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)) {
				echo "The file".basename($_FILES['fileToUpload']['name'])." has been Uploaded.";
		}
		else{

				echo "Sorry ! there was an error while uploading a file.";
		}
	

	} // else ends main 



 ?>