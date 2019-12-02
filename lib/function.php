<?php 
	function postInput($string)
	{
		return isset($_POST[$string]) ? $_POST[$string] : '';
	}
	function base_url()
	{
		return $url = "http://127.0.0.1/shop/";
	}
	function public_admin()
	{
		return base_url() . "public/admin/";
	}
	function public_fontend()
	{
		return base_url() . "public/fontend/";
	}
	function modules($url)
	{
		return base_url() . "admin/modules/" .$url;
	}


	function slug_url($str)
		{
			//Kiểm tra xem dữ liệu truyền vào có phải là một chuỗi hay không
			if( is_string( $str ) ){
				// Chuyển đổi toàn bộ chuỗi sang chữ thường
				$str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8"); 
				//Tạo mảng chứa key và chuỗi regex cần so sánh
				$unicode = [
					'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
					'd' => 'đ',
					'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
					'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
					'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
					'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
					'i' => 'í|ì|ỉ|ĩ|ị',
					'-'	=> '\+|\*|\/|\&|\!| |\^|\%|\$|\#|\@',
				];
		 
				foreach ( $unicode as $key => $value )
				{
					//So sánh và thay thế bằng hàm preg_replace
					
					$str = preg_replace("/($value)/", $key, $str);
				}
				//Trả về kết quả
				return $str;
			} 
			//Nếu Dữ liệu không phải kiểu string thì trả về null
			return null;
		}
	function format_number($number)
	{
		$number = (int)$number;
		return $number = number_format($number,"0",",",".") ." đ";
	}
	function format_priceSale($price,$sale)
	{
		$price = (int)$price;
		$sale = (int)$sale;
		$price = $price*(100 - $sale)/100;
	    return 	format_number($price);
	}
	function check($a)
	{
		echo "<pre>";
		var_dump($a);
		echo "</pre>";
		exit();
	}

 ?>