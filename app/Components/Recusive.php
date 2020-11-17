<?php 

namespace App\Components;

class Recusive 
{

  private $data;
  private $htmlselect = '';
  function __construct($data)
  {
    $this->data = $data;
  }

   public function categoryRecusive($parent_id,$id = 0,$text='') {
         foreach ($this->data as $value) {
           if ($value->parent == $id) {
              if (!empty($parent_id) && $parent_id == $value->id) {
                  $this->htmlselect .= "<option selected value='".$value->id."'>".$text.$value->category_name."</option>";
              } else {
                 $this->htmlselect .= "<option  value='".$value->id."'>".$text.$value->category_name."</option>";
              }
              $this->categoryRecusive($parent_id,$value->id,$text.'--');
           }
         }

         return $this->htmlselect;
    }
}


