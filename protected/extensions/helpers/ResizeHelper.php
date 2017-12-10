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
    public static function resize($fullPath, $width, $height = false, $top = false, $resize = false, $force = false)
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

        if(!file_exists($fullPath . DS . $resizeFilename) || $force) {
            $ih
                ->load($fullPath . DS . $filename);

            if(!$width || !$height || $resize) {
                $ih->resize($width, $height);
            } else {
                $ih->adaptiveThumb($width, $height, $top);
            }

            $ih->save($fullPath . DS . $resizeFilename, false, 85);
        }

        return $path . DS . $resizeFilename;
    }

    /**
     * Resize image
     * @static
     * @param $fullPath
     * @param $width
     * @param $height
     * @param $resize
     * @param $top
     * @return mixed
     */
    public static function resizeToCache($fullPath, $width, $height, $resize = true, $top = false)
    {
        $parts = explode('/', $fullPath);
        $filename = array_pop($parts);
        $path = implode('/', $parts);
        $fullPath = Yii::getPathOfAlias('webroot') . $path;

        if (!is_file($fullPath . DS . $filename)) {
            return '/images/no-photo.png';
        }

        $salt = hash_file('md5', $fullPath . DS . $filename);

        $resizeFilename = $salt . '_' . $width . '_' . $height . '_' . $filename;

        $ih = new CImageHandler();

        $saveFolder = '/images/cache';
        $savePath = Yii::getPathOfAlias('webroot') . $saveFolder;

        if(!file_exists($savePath . DS . $resizeFilename)) {
            $ih
                ->load($fullPath . DS . $filename);

            if(!$width || !$height || $resize) {
                $ih->resize($width, $height);
            } else {
                $ih->adaptiveThumb($width, $height, $top);
            }

            $ih->save($savePath . DS . $resizeFilename, false, 60);
        }

        return $saveFolder . DS . $resizeFilename;

    }
}
