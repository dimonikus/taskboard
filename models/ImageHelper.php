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

    public function uploadImage($file, $model, $attributeName)
    {
        $modelName = (new \ReflectionClass($model))->getShortName();
        $uploadsPath = \Yii::getAlias('@uploads') . '/' . $modelName . '/';
        $extension = $this->imageFile->extension;
        $imageName = $this->generateFileName() . '.' . $extension;
        if ($this->imageFile->saveAs($uploadsPath . $imageName)) {
            Img::thumbnail($this->imageFile, 160, 160)
                ->resize(new Box(160,160))
                ->save($uploadsPath . $imageName, ['quality' => 70]);
            return $imageName;
        }
    }
}