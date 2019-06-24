<?php
/**
 * Created by PhpStorm.
 * User: shark
 * Date: 05.06.2019
 * Time: 22:15
 */

namespace app\models;

use yii\web\UploadedFile;
use yii\imagine\Image as Img;
use Imagine\Image\Box;


/**
 * Class ImageHelper
 * @package app\models
 */
class ImageHelper
{
    const CHMOD = 0777;
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @return string
     */
    public function generateFileName()
    {
        return date('Ymd_', time()) . \Yii::$app->security->generateRandomString(6);
    }

    public function uploadImage($model)
    {
        $uploadsPath = self::getImagePath($model);
        $extension = $this->imageFile->extension;
        $imageName = $this->generateFileName() . '.' . $extension;
        self::makeDir($uploadsPath);
        Img::thumbnail($this->imageFile->tempName, 160, 160)
            ->resize(new Box(160,160))
            ->save($uploadsPath . $imageName, ['quality' => 70]);

        return $imageName;
    }

    public function setImageFile($file)
    {
        $this->imageFile = $file;
    }

    /**
     * @param $imgPath
     */
    public static function makeDir($imgPath)
    {
        if (!is_dir($imgPath)) { //create primary upload directory
            if (!mkdir($imgPath, self::CHMOD, true) && !is_dir($imgPath)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $imgPath));
            }
        }
    }

    public static function getImagePath($model)
    {
        $modelName = strtolower((new \ReflectionClass($model))->getShortName());

        return \Yii::getAlias('@uploads') . '/' . $modelName . '/';
    }
}