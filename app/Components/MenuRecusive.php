<?php 

namespace App\Components;
use App\Models\MenuModel;

class MenuRecusive  
{
	private $html;
	
	function __construct()
	{	
		$this->html = '';
	}

	public function MenuRecusiveAdd($parent_id = 0,$subMark = '') {
		$data = MenuModel::where('parent_id',$parent_id)->get();
		foreach ($data as $dataItem) {
			$this->html .= '<option value="'.$dataItem->id.'">'.$subMark.$dataItem->name.'</option>';
			$this->MenuRecusiveAdd($dataItem->id,$subMark.'--');
		}

		return $this->html;
	}


	public function MenuRecusiveEdit($parentIdEdit,$parent_id = 0,$subMark = '') {
		$data = MenuModel::where('parent_id',$parent_id)->get();
		foreach ($data as $dataItem) {
			if ($parentIdEdit == $dataItem->id) {
			$this->html .= '<option selected value="'.$dataItem->id.'">'.$subMark.$dataItem->name.'</option>';

			}else{
				$this->html .= '<option value="'.$dataItem->id.'">'.$subMark.$dataItem->name.'</option>';
			}
			$this->MenuRecusiveEdit($parentIdEdit,$dataItem->id,$subMark.'--');
		}

		return $this->html;
	}
}