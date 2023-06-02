<?php

namespace app\components;

use yii\helpers\Html;

class GHtml extends Html {

    public static function enumDropDownList($model, $attribute, $htmlOptions = array()) {
        
        return Html::activeDropDownList($model, $attribute, self::enumItem($model, $attribute), $htmlOptions);
    }

    public static function enumItem($model, $attribute) {
        preg_match('/\((.*)\)/', $model->tableSchema->columns[$attribute]->dbType, $matches);
        
        foreach (explode("','", $matches[1]) as $value) {
            $value = str_replace("'", null, $value);
            $values[$value] =  $value;
        }
        
        return $values;
    }

}
