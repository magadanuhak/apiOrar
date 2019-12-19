<?php

namespace App\Http\Controllers;

use App\Forms\TestForm;
use App\Portfolio;

class FormController extends Controller
{
    public function testForm(TestForm $form){


        $form->getComponent('title')->setData(
            Portfolio::get(['id AS value', 'title AS text'])->toArray()
        );

//        $form->getComponent('id')->setData(
//            Portfolio::get(['id AS value', 'title AS text', 'country_id AS parents'])->transform(static function ($item) {
//                return [
//                    'value'   => $item->value,
//                    'text'    => $item->text,
//                    'parents' => ['country_id' => $item->parents]
//                ];
//            })->toArray()
//        );

        return $form->build();
    }
}
