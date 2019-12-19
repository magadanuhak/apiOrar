<?php


namespace App\Forms;


use App\Http\Requests\StoreCityRequest;
use MeraxForms\Components\Input;
use MeraxForms\Components\Select;
use MeraxForms\Form;

class testForm extends Form
{
    public function init(){
        $this
            ->setTitle(__('modules.cities.title'))
            ->setDescription('')
            ->addComponents(
                Input::create('name'),
                Select::create('country_id')
                    ->setTitle(__('modules.cities.fields.country.title'))
                    ->setDescription(__('modules.regions.fields.country.description'))
                    ->setChildren(['region_id']),
                Select::create('region_id')
                    ->setTitle(__('modules.cities.fields.region.title'))
                    ->setDescription(__('modules.cities.fields.region.description'))
            )->setRulesFromRequest(StoreCityRequest::class);

    }

}