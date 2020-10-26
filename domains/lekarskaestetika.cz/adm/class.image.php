<?php

/**
 * Class IMAGE
 * Initialize
 *    $IMAGE = new IMAGE($image); //$image = $file from $FILE->files (class.files.php) or path to image
 * Save image
 *    $IMAGE->save($path = "", $name = false); //save image to path. If name = false, then will use default name. If setting name extension will be added automaticly
 * Resize image
 *    $IMAGE->resize($new_width, $new_height = 0, $aspect_ratio = "width"); //aspect_ratio width or height. If false aspect ratio won't be used
 * Basic operations
 *    $IMAGE->size(); //return image size [$width, $height]
 *    $IMAGE->width(); //return image width
 *    $IMAGE->height(); //return image height
 *    $IMAGE->destroy(); //destroy image resource to free up memory
 *    $IMAGE->show(); //show image in web browser (debugging)
 *
 * @author Martin Petričko
 */
class IMAGE
{
	public $image;
	public $image_r;

	//------------------------------------------------------------------------------------------------------------------

	/**
	 * IMAGE constructor
	 *
	 * @param string|array $image Image from $IMAGES->images (class.images.php)
	 */
	public function __construct($image, $image_path)
	{
		$this->image["name"] = explode("/", $image);
		$this->image["name"] = end($this->image["name"]);
		$this->image["extension"] = explode(".", $this->image["name"]);
		$this->image["extension"] = end($this->image["extension"]);
		$this->image["tmp_name"] = $image_path;

		if ($this->image['extension'] == "jpeg" || $this->image['extension'] == "jpg") {
			$this->image_r = imagecreatefromjpeg($this->image['tmp_name']);
		} else if ($this->image['extension'] == "png") {
			$this->image_r = imagecreatefrompng($this->image['tmp_name']);
			imagealphablending($this->image_r, false);
			imagesavealpha($this->image_r, true);
		}
	}

	//------------------------------------------------------------------------------------------------------------------

	/**
	 * Save image
	 *
	 * @param string      $path Upload path.
	 * @param string|bool $name Change image name on upload. Default "false".
	 */
	public function save($path = "", $name = false)
	{
		if (!$name) {
			$path = $path . $this->image['name'];
		} else {
			$path = $path . $name . "." . $this->image['extension'];
		}

		if ($this->image['extension'] == "jpeg" || $this->image['extension'] == "jpg") {
			imagejpeg($this->image_r, $path);
		} else if ($this->image['extension'] == "png") {
			imagepng($this->image_r, $path);
		}

		imagedestroy($this->image_r);
	}

	/**
	 * Resize image
	 *
	 * @param int         $new_width    New image width (px).
	 * @param int         $new_height   New image height (px).
	 * @param string|bool $aspect_ratio Keep aspect ratio "width"/"height"/false.
	 */
	public function resize($new_width, $new_height = 0, $aspect_ratio = "width")
	{
		if ($aspect_ratio != false) {
			if ($aspect_ratio == "width") {
				$new_height = (float)$new_width * ((float)$this->size()['height'] / (float)$this->size()['width']);
			}
			if ($aspect_ratio == "height") {
				$new_width = (float)$new_height * ((float)$this->size()['width'] / (float)$this->size()['height']);
			}
		}

		$resized_image = imagecreatetruecolor($new_width, $new_height);
		imagesavealpha($resized_image, true);

		$trans_bg = imagecolorallocatealpha($resized_image, 0, 0, 0, 127);
		imagefill($resized_image, 0, 0, $trans_bg);

		imagecopyresampled($resized_image, $this->image_r, 0, 0, 0, 0, $new_width, $new_height, $this->size()['width'], $this->size()['height']);

		$this->image_r = $resized_image;

		imagealphablending($this->image_r, false);
		imagesavealpha($this->image_r, true);
	}

	//--Basic operations------------------------------------------------------------------------------------------------

	/**
	 * Get image size (array)
	 *
	 * @return array
	 */
	public function size()
	{
		$width = imagesx($this->image_r);
		$height = imagesy($this->image_r);

		return ["width" => $width, "height" => $height];
	}

	/**
	 * Get image width
	 *
	 * @return false|int
	 */
	public function width()
	{
		return imagesx($this->image_r);
	}

	/**
	 * Get image height
	 *
	 * @return false|int
	 */
	public function height()
	{
		return imagesy($this->image_r);
	}

	/**
	 * Destroy image resource
	 */
	public function destroy()
	{
		imagedestroy($this->image_r);
	}

	/**
	 * Show image (debugging)
	 */
	public function show()
	{
		header("Content-type: image/png");
		imagepng($this->image_r);
	}
}

