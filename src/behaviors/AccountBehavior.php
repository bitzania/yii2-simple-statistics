<?php

namespace bitzania\statistic\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use bitzania\statistic\models\Account;
/**
 * Class DiscountBehavior
 * @package \yz\shoppingcart
 */
class AccountBehavior extends Behavior
{
    public $attribute = "balance";

    public function init(){
        parent::init();
    }

    public function events()
    {
        return [
            // ActiveRecord::EVENT_AFTER_INSERT => 'beforeSave',
            // ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeSave',
            ActiveRecord::EVENT_AFTER_FIND  => 'afterFind',
            // ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
        ];
    }

    // public function getImages() {
    //     return Image::find()->where([
    //         'ref_type' => $this->owner->tableName(), 
    //         'ref_id'=>$this->owner->primaryKey, 
    //         'category'=>$this->imageAttribute,
    //     ])->orderBy('position asc')->all();
    // }

    // public function afterDelete($event) {
    //     $photos = explode(',',$this->owner[$this->imageAttribute]);
    //     foreach ($photos as $photo) {
    //         if (empty($photo)) continue;
    //         $img = Image::findOne([
    //             'filename'=>$photo
    //         ]);

    //         if (!$img) continue;
    //         $img->delete();
    //     }
    // }

    // public function deleteImage($img) {
    //     @unlink($fullpath);
    // }

    // public function beforeSave($event){
    //     $photos = explode(',',$this->owner[$this->imageAttribute]);

    //     SiteHelper::trace("before save image ");
    //     SiteHelper::trace($photos);
    //     Image::updateAll(
    //         [
    //             'ref_type' => null, 
    //             'ref_id'=>null, 
    //             'category'=>null,
    //         ],
    //         [
    //             'ref_type' => $this->owner->tableName(), 
    //             'ref_id'=>$this->owner->primaryKey, 
    //             'category'=>$this->imageAttribute
    //         ]
    //     );

    //     $pos = 0;
    //     foreach ($photos as $photo) {
    //         if (empty($photo)) continue;

    //         SiteHelper::trace($photo);
    //         $img = Image::findOne([
    //             'filename'=>$photo
    //         ]);

    //         if (!$img) $img = new Image();
    //         $img->ref_type = $this->owner->tableName();
    //         $img->ref_id = $this->owner->primaryKey;
    //         $img->category = $this->imageAttribute;
    //         $img->position = $pos++;
    //         $img->filename = $photo;

    //         SiteHelper::trace($img->attributes);
    //         if (!$img->save())
    //             SiteHelper::trace("error update ");
    //     }


    //     $images = Image::findAll(['ref_id'=>null]);
    //     foreach ($images as $img) {
    //         // $img->delete();
    //     }
    // }


    public function afterFind($event){
        $a = Account::initAccount($this->owner, $this->attribute);
        $this->owner[$this->attribute] = $a->balance;
        // var_dump(ArrayHelper::toArray($this->_images, 'filename'));
    }

    public function getAccountCode() {
        return Account::generateCode($this->owner, $this->attribute);
    }

}
