<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use function League\Flysystem\get;
use App\Tags;

class UploadController extends Controller {
	
	public function uploadForm()
	{

		$options = Tags::getDropDownOptions();

		return view('Modules.uploadForm', ['options' => $options]);
	}

	public function uploadFiles()
	{
	   // dd($_POST['longitude']);

		$maxSize = 2097152; //2MB
		$user_id = \Auth::id();
		if (!$user_id){
			return 'You have to be logged in to upload!';
		}
		if (empty($_FILES['file']['type'])){
			return 'Uploading an image is mendatory!';
		}
		if ($_FILES['file']['size'] > $maxSize){
			$inMB = $maxSize / 1048576;
			return "File can't be larger then $inMB MBs";
		}
		if (!preg_match('#^image/[A-z\-]{3,6}$#', $_FILES['file']['type'])){
			$this->deleteTmp();
			return 'You can upload only images';
		}
		$copy = file_get_contents($_FILES['file']['tmp_name']);
		$path = resource_path() . DIRECTORY_SEPARATOR . 'uploads';
		if (!@is_dir($path)){
			if (!@mkdir($path)){
				$this->deleteTmp();
				return 'Acces denied!';
			}
		}
		do {
			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$fileName = uniqid(rand(), true) . '.' .  $ext;
			$photo = $path . DIRECTORY_SEPARATOR . $fileName;
		} while(file_exists($photo));
		
		file_put_contents($photo, $copy);
		$this->deleteTmp();
		
		$album_id = empty($_POST['album']) ? NULL : $_POST['album'];


		$text = empty($_POST['text']) ? NULL : $_POST['text'];
		$tag1 = empty($_POST['tag1']) ? NULL : $_POST['tag1'];
		$tag2 = empty($_POST['tag2']) ? NULL : $_POST['tag2'];
		$tag3 = empty($_POST['tag3']) ? NULL : $_POST['tag3'];
		$location = $this->getLocation($_POST['latitude'],$_POST['longitude']);
		try {
			$id = @\DB::table('posts')->insertGetId([
					'user_id' => $user_id, 
					'album_id' => $album_id,
					'text' => $text,
					'photo' => $fileName,
					'tag1' => $tag1,
					'tag2' => $tag2,
					'tag3' => $tag3,
                    'location' => $location,
			]);
		} catch (\Throwable $e) {
			return $e->getMessage();
		}
		return 'Upload successful!';
	}
	
	private function deleteTmp()
	{
		unlink( $_FILES['file']['tmp_name'] );
	}
	
	private function validateAlbumExistance ($album_id)
	{
		return @\DB::table('albums')->where('id', $album_id)->first();
	}

    public function getLocation($latitude, $longitude)
    {
        $geolocation = $_POST['latitude'].',' . $_POST['longitude'];

        $request = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&sensor=false';
        $file_contents = file_get_contents($request);
        $json_decode = json_decode($file_contents);
        if(isset($json_decode->results[0])) {
            $response = array();
            foreach($json_decode->results[0]->address_components as $addressComponet) {
                if(in_array('political', $addressComponet->types)) {
                    $response[] = $addressComponet->long_name;
                }
            }

            if(isset($response[0])){ $first  =  $response[0];  } else { $first  = 'null'; }
            if(isset($response[1])){ $second =  $response[1];  } else { $second = 'null'; }
            if(isset($response[2])){ $third  =  $response[2];  } else { $third  = 'null'; }
            if(isset($response[3])){ $fourth =  $response[3];  } else { $fourth = 'null'; }
            if(isset($response[4])){ $fifth  =  $response[4];  } else { $fifth  = 'null'; }

            if( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth != 'null' ) {
                $location = $second . ', ' . $fifth;
                $_POST['location'] = $location;
                return $location;
            }
            else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth == 'null'  ) {
                $location = $second . ', ' . $fourth;
                $_POST['location'] = $location;
                return $location;
            }
            else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth == 'null' && $fifth == 'null' ) {
                $location = $first . ', ' . $third;
                $_POST['location'] = $location;
                return $location;
            }
            else if ( $first != 'null' && $second != 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
                $location = $second;
                $_POST['location'] = $location;
                return $location;
            }
            else if ( $first != 'null' && $second == 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
                $location = $first;
                $_POST['location'] = $location;
                return $location;
            }
            else{
                $location = '';
                $_POST['location'] = $location;
                return $location;
            }
        }
    }
}