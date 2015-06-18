<?php
	/*	验证码	*/ /*两个输出口（一个输出完整的验证码，一个只输出word以便于验证，可以与AJAX结合）*/     				/*缺少字体，不完全*/

class VerCode{
	private $db="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; //验证码选择范围
	private $word; //验证码
	private $img; //背景
	private $length = 5; //验证码个数
	private $fontsize = 20;//字体大小
	private $font = '../../bin/font/ARCENA.ttf';//字体 注意自己字体的路径 -----------------------------
	private $width = 120; //背景框宽度
	private $height = 30; //背景框高度
	private $color;

	/*生成背景*/
	private function bg(){
		$this->img = imagecreatetruecolor($this->width,$this->height);    //创建真彩图像资源
		$color = imagecolorAllocate($this->img,mt_rand(157, 255),mt_rand(157, 255),mt_rand(157, 255));   //分配一个灰色
		imagefill($this->img,0,0,$color);        // 从左上角开始填充颜色
	}

	/*生成验证码*/
	private function word(){
		for($i=0 ; $i<$this->length ; $i++){
			$this->word .= $this->db[rand(0,61)];
		};
		return $this->word;
	}


	/*这里可以再添加雪花线条什么的，玩呗！*/

	/*生成验证码插入背景中*/
	private function insert(){
			$x = $this->width / $this->length;//每个字的位置[背景图片/字体个数]
			for ($i = 0;$i < $this->length;$i++){
				$this->color= imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));//指定随机的字体颜色
				imagettftext(
					$this->img, 			//画布资源
					$this->fontsize,    	//字的大小
					mt_rand(-45, 45), 		//旋转角度
					$x * $i + mt_rand(1, 5),//x轴
					$this->height / 2 + 10, //y轴 被绘制字符串的第一个字符的基线点
					$this->color, 			//字的颜色 可以随机
					$this->font,			//怎样的字体（需有字体库）
					$this->word[$i]			//每次取出一个文字
				);
			}
		}

	/*输出做好的验证码*/
	private function showbg(){
		header('content-type:image/jpeg');   //jpg格式
		imagejpeg($this->img); //显示该背景  
		imagedestroy($this->img);//销毁句柄
	}

	/* 输出生成的文字 用于验证*/
	public function showword(){
		echo $this->word();
	}

	/*输出渲染的验证码*/
	public function show(){
		$this->bg();
		$this->word();
		$this->insert();
		$this->showbg();
	}
}
$test = new verCode();
$test->show();

?>