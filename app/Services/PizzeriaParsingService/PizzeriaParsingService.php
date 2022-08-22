<?php

namespace App\Services\PizzeriaParsingService;

use App\Services\PizzeriaParsingService\Contracts\PizzeriaParsingServiceContract;
use DiDom\Document;
use DiDom\Query;
use Illuminate\Support\Facades\Storage;

class PizzeriaParsingService implements PizzeriaParsingServiceContract
{
    /**
     * @param string $pizzeria
     * @return string[]
     */
    public function getPizzeriaPrices(string $pizzeria): array
    {
        $model=new Document('https://dominos.ua/uk/odessa/Pizza/',true);
        $find=$model->find('script', Query::TYPE_CSS);
        foreach ($find as $element)
        {
           if (str_contains($element->html(),'window.app_props = JSON.parse'))
             $str=$element->html();
        }
        //dump($str);
        
        $file=storage_path('app/study2.php');
        $a=file_get_contents($file);
        dd($a);



        return ['Pizzeria'=>$pizzeria];
    }
}
