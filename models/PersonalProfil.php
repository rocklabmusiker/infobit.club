<?php 


class PersonalProfil
{


	public static function bildUpload($filename, $extension, $user_id){


		
		$upload_folder = 'template/images/'; //Das Upload-Verzeichnis
		$error = 0;
		
		 
		//Überprüfung der Dateiendung
		$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
		if(!in_array($extension, $allowed_extensions)) {
		 echo '<div class="error_true alert alert-danger text-center d-inline-block rounded-0" role="alert">Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt</div>';
		$error += 1;
		}

		
		 
		//Überprüfung der Dateigröße
		$max_size = 500*1024; //500 KB
		if($_FILES['datei']['size'] > $max_size) {
		 echo '<div class="error_true alert alert-danger text-center d-inline-block rounded-0" role="alert">Bitte keine Dateien größer 500kb hochladen</div>';
		 $error += 1;
		}

		
		 
		//Überprüfung dass das Bild keine Fehler enthält
		if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
		 $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
		 $detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
		 if(!in_array($detected_type, $allowed_types)) {
		 echo '<div class="error_true alert alert-danger text-center d-inline-block rounded-0" role="alert" style="top:132px;">Nur der Upload von Bilddateien ist gestattet</div>';
		 $error += 1;
		 }
		}

		
		 
		//Pfad zum Upload
		$new_path = $upload_folder.$filename.'.'.$extension;
		 
		//Neuer Dateiname falls die Datei bereits existiert
		if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
		 $id = 1;
		 do {
		 $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
		 $id++;
		 } while(file_exists($new_path));
		}
		
		if($error == 0) {
			//Alles okay, verschiebe Datei an neuen Pfad
			move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
			// echo 'Bild erfolgreich hochgeladen: <a href="'.$new_path.'">'.$new_path.'</a>';
		

			// bekomme alter Link vom user und lösche bild aus der Verzeichnis
			$db = Db::getConnection();
			$sql_link_user_foto_alt = "SELECT user_foto FROM user WHERE user_id = :user_id";
			if($result = $db->prepare($sql_link_user_foto_alt)){
				$result->bindParam(':user_id', $user_id);
				$result->execute();

				$link = $result->fetch();
					// delete old file
				unlink('template/images/'.$link['user_foto']);
			}

			// speichern neuer Foto Link 
			$file_name = $_FILES['datei']['name'];
			$sql = "UPDATE user SET user_foto = :file_name WHERE user_id = :user_id";
			if($result = $db->prepare($sql)){
				$result->bindParam(':file_name', $file_name);
				$result->bindParam(':user_id', $user_id);

				$result->execute();

				if($result->rowCount() > 0){		
					return true;
				} 
				
			}

		}

	}



	public static function changePassword($user_id, $password_new_1){


		$user_id = trim(stripcslashes(htmlspecialchars($user_id)));
		$password_new_1 = trim(stripcslashes(htmlspecialchars($password_new_1)));

		$user_password = password_hash( $password_new_1, PASSWORD_DEFAULT);
		
		$db = Db::getConnection();
		$sql = "UPDATE user SET user_password = :user_password WHERE user_id = :user_id";

		if($result = $db->prepare($sql)) {
			$result->bindParam(':user_id', $user_id);
			$result->bindParam(':user_password', $user_password);
			
			$result->execute();

			if($result->rowCount() > 0){		
				return true;
			} 
		}

	}


}








