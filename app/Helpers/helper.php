<?php

use App\Models\Product;
use Illuminate\Support\Facades\DB;

function prx($arr){
    echo "<pre>";
    print_r($arr);
    die();
}

if (! function_exists('single_price')) {
    function single_price($product)
    {
	    $data=Product::find($product);
		$first_price=$data->productProductVariations()->where('primary_variation',1)->first()->single_sales_price;
        return $first_price;
    }
}

function getNav(){
  $result= DB::table('categories')
            ->where(['status'=>1])
            ->where('deleted_at', NULL)
            ->get();
            $arr=[];
  foreach($result as $row){
      $arr[$row->id]['name']=$row->name;
      $arr[$row->id]['parent_id']=$row->parent_id;
      $arr[$row->id]['slug']=$row->slug;
	  $arr[$row->id]['id']=$row->id;
  }
  $str=buildTreeView($arr,0);
  return $str;
}

$html='';
function buildTreeView($arr,$parent,$level=0,$prelevel= -1){
	global $html;
	foreach($arr as $id=>$data){
		if($parent==$data['parent_id']){
			if($level>$prelevel){
				if($html==''){
					$html.='<ul>';
				}else{
					$html.='<ul>';
				}

			}
			if($level==$prelevel){
				$html.='<li>';
			}
			$url=route("suggestion.search",$data['id']);

			if($level>$prelevel){
        $html.='<li ><a class="menu2" href="'.$url.'">'.$data['name'].'</a>';
				$prelevel=$level;
			}else{
        $html.='<li ><a class="menu1" href="'.$url.'">'.$data['name'].'</a>';
      }
			$level++;
			buildTreeView($arr,$id,$level,$prelevel);
			$level--;
		}
	}
	if($level==$prelevel){
		$html.='</li></ul>';
	}
	return $html;
}



function get_sku($n = 8) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    $randomString = 'SKU-'.$randomString;

    return $randomString;
}


function generateNumericOTP($n) {
    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }
    return $result;
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array('y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second');
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

?>
