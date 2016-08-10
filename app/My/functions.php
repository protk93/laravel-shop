<?php
function stripUnicode($str) {

	if (empty($str))

		return false;

	$unicode = array(

		'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

		'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

		'd' => 'đ',

		'D' => 'Đ',

		'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

		'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

		'i' => 'í|ì|ỉ|ĩ|ị',

		'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

		'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

		'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

		'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

		'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

		'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

		'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

		);

	foreach ($unicode as $nonUnicode => $uni)

		$str = preg_replace("/($uni)/i", $nonUnicode, $str);

	return $str;

}

function changeTitle($str) {
	$str = trim($str);
	if (empty($str))
		return false;  
    
    //$str=trim(str); 
    $str = str_replace("'","",$str);
    $str = str_replace('"','',$str);
    $str = str_replace('/','',$str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
    // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER 
    $str = str_replace(' ','-',$str); 
    return $str; 
} 

function cate_parent($data, $parent = 0, $str ='--', $select = 0) {
	foreach ($data as $key => $value) {
		$id = $value['id'];
		$name = $value['name'];
		if($value['parent_id'] == $parent) {
			if($select!=0 && $id == $select) {
				echo "<option value ='".$id."' selected = 'selected'>$str $name</option>";
			} else {
				echo "<option value ='".$id."'>$str $name</option>";
			}
			
			cate_parent($data, $id, $str.' --',$select);
		}
	}


}

function cate_list($data, $parent = 0, $str ='--') {
        $i= 0;
	foreach ($data as $key => $value) {
            $i++;
		$id = $value['id'];
		$name = $value['name'];
                if($value['status']==1) {
                    $status ="active";
                    $action = "inactive";
                } else {
                    $status ="inactive";
                    $action = "active";
                }
                $urlDel = route('admin.cate.getDelete',$id);
                $urlEdit = route('admin.cate.getEdit',$id);
                
		if($value['parent_id'] == $parent) {
                    if($value['parent_id'] == 0) {
			echo "<tr class='odd gradeX' align=''>";
                        echo "<td >$i</td>";
                        echo "<td > $name</td>";
                        echo "<td >$status</td>";
                        echo "<td class='center'><i class='fa fa-trash-o  fa-fw'></i><a href='".$urlDel."' onclick=\"return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')\"> $action</a></td>";
                        echo '<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.$urlEdit.'">Edit</a></td>';
			echo"</tr>";
                        cate_list($data, $id, $str.' --');
                    } else {
                        echo "<tr class='odd gradeX' align=''>";
                        echo "<td >$i</td>";
                        echo "<td >$str $name</td>";
                        echo "<td >$status</td>";
                        echo "<td class='center'><i class='fa fa-trash-o  fa-fw'></i><a href='".$urlDel."' onclick=\"return xacnhanxoa('Bạn Có Chắc Muốn đổi trạng thái không!!')\"> $action</a></td>";
                        echo '<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.$urlEdit.'">Edit</a></td>';
			echo"</tr>";
                        cate_list($data, $id, $str.' --');
                    }
		}
	}


}

function deleteImage($image, $type) {
	switch ($type) {
		case "product":
	        	$size = array('upload','590x885' ,'270x350' ,'50x50','100x130');
	        break;
		case "productImage":
	        	$size = array('100x130','product_detail','590x885' );
	        break;
		default:
	    		$size = array('upload','590x885' ,'270x350' ,'50x50','100x130');
	}
        	
	foreach ($size as $value) {

		if ($value == 'upload') {
			$name = "resources/upload/".$image;	
		} else {
			$name = "resources/upload/".$value.'/'.$image;
		}
		if (File::exists($name)){
			File::delete($name);	
		}
	} 
	        	

}
function resize($image,$name,$type) {
	try 
	{
	switch ($type) {
            	case "product":
                    	$size = array(
	                        '590x885' => ['w'=>590,'h'=>885],
	                        '270x350' => ['w'=>270,'h'=>350],
	                        '100x130' => ['w'=>100,'h'=>130],
	                        '50x50' =>['w'=>50,'h'=>50]);
                    break;
            	case "productImage":
                    	$size = array('590x885' => ['w'=>590,'h'=>885],'100x130' => ['w'=>100,'h'=>130]);
                    break;
            	default:
                		$size = array('270x350' => ['w'=>270,'h'=>350],);
        	}
            $imageRealPath 	= 	$image->getRealPath();
            $img = Image::make($imageRealPath); // use this if you want facade style code
//	    	$img->resize($size, null, function($constraint) {
//	    		 $constraint->aspectRatio();// tự động điều chỉnh theo size
//	    	});
            foreach ($size as $key => $val) {
               	$path = ('resources/upload/').$key.'/'. $name;
          		$size =  $img->resize($val['w'], $val['h'])->save($path);
            } 
            return $size;
	}
	catch(Exception $e)
	{
		return false;
	}

}
?>