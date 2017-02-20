<?php

class ResizeHelper
{
    /**
     * Resize image
     * @static
     * @param $fullPath
     * @param $width
     * @param $height
     * @param $top bool
     * @param $resize bool
     * @return mixed
     */
    public static function resize($fullPath, $width, $height, $top = false, $resize = false)
    {
        if (!$fullPath) {
            return $fullPath;
        }

        $parts = explode('/', $fullPath);
        $filename = array_pop($parts);
        $path = implode('/', $parts);

        $fullPath = Yii::getPathOfAlias('webroot') . $path;
        $salt = hash_file('md5', $fullPath . DS . $filename);

        $resizeFilename = $salt . '_' . $width . '_' . $height . '_' . $filename;

        $ih = new CImageHandler();

        if(!file_exists($fullPath . DS . $resizeFilename)) {
            $ih
                ->load($fullPath . DS . $filename);

            if(!$width || !$height || $resize) {
                $ih->resize($width, $height);
            } else {
                $ih->adaptiveThumb($width, $height, $top);
            }

            $ih->save($fullPath . DS . $resizeFilename, false, 95);
        }

        return $path . DS . $resizeFilename;

    }
}
