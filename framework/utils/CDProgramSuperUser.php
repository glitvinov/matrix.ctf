<?php

class Usres extends CActiveRecord
{
    /* @var $model Users */
    public static function showAttribute($model, $attr = null)
    {
        $text = '';
        if ($attr == 'lvlup'){
            if(Users::myRole() == "Neo"){
                $text = '<div class="form-group">';
                $text .= '<div class="col-sm-10" name="title-'.$attr.'"><a href="index.php?r=neo/setManager&id='.$model->id.'">
                    <input type="button" value="Up User level" class="btn btn-warning btn-large" style="color: black">
                    </a>
                    </div>';
                $text .= '</div>';
                return $text;
            }else{
                return '';
            }
        }
        if(Users::myId() == $model->id or Users::myRole() == "Manager" or Users::myRole() == "Neo") {
            if (!empty($attr)) {
                $text = '<div class="form-group">';
                $text .= '<div class="col-sm-4" name="title-'.$attr.'"><h3 style="margin: 0px; text-decoration: underline;">' . $model->getAttributeLabel($attr) . ':</h3></div>';
                $text .= '<div class="col-sm-6" name="'.$attr.'"><h3 style="margin: 0px;">' . $model->getAttribute($attr) . '</h3></div>';
                $text .= '</div>';
            }
        }
        return $text;
    }


}




