<?php

class Image
{
    const MAX_WIDTH = 320;
    const MAX_HEIGHT = 240;

    public static function saveResizeImage() {
        list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
        $width = self::MAX_WIDTH;
        $height = self::MAX_HEIGHT;

        $ratio = $w / $h;

        if ($width / $height > $ratio) {
            $newWidth = $height * $ratio;
            $newHeight = $height;
        } else {
            $newHeight = $width / $ratio;
            $newWidth = $width;
        }

        $imageName = time().$_FILES['image']['name'];
        $path = APP_ROOT.'/images/'.$imageName;
        $imgString = file_get_contents($_FILES['image']['tmp_name']);

        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newWidth, $newHeight, $w, $h);

        switch ($_FILES['image']['type']) {
            case 'image/jpeg':
                imagejpeg($tmp, $path, 100);
                break;
            case 'image/png':
                imagepng($tmp, $path, 0);
                break;
            case 'image/gif':
                imagegif($tmp, $path);
                break;
            default:
                return false;
                break;
        }

        return $imageName;
    }
}