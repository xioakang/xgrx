<?php
namespace app\common;
class Logger
{
    //创建文件夹
    private static function createdir($dir)
    {
		//if(!is_dir($dir))return false;
		if(file_exists($dir))return true;
		$dir	= str_replace("\\","/",$dir);
		substr($dir,-1)=="/"?$dir=substr($dir,0,-1):"";
		$dir_arr	= explode("/",$dir);
		$str = '';
		foreach($dir_arr as $k=>$a){
			$str	= $str.$a."/";
			if(!$str)continue;
			//echo $str."<br>";
			if(!file_exists($str))mkdir($str,0755);
		}
		return true;
	}

    # 获取应用根目录
    public function app_path()
    {
        # 这里是判断命令行执行，还是浏览器执行
        if ('cli' == PHP_SAPI) {
            $scriptName = realpath($_SERVER['argv'][0]);
        } else {
            # 获取文件的绝对路径
            $scriptName = $_SERVER['SCRIPT_FILENAME'];
        }
        # dirname是获取目录，reapath返回绝对路径
        $path = realpath(dirname($scriptName));
        # 检测是不是文件
        if (!is_file($path . DIRECTORY_SEPARATOR . 'think')) {
            $path = dirname($path);
        }
        return $path . DIRECTORY_SEPARATOR;
    }

	//设置文件名称
	private static function log( $filepath, $line )
	{
		self::createdir(dirname($filepath));
		$line = date("Y-m-d H:i:s").'=>'.$line;
		file_put_contents($filepath, $line."\n", FILE_APPEND);
	}
	/**
	 * 纪录错误日志
	 */
	public static function errorLog( $content , $type='log', $filename='open' ){

		$filepath = self::app_path(). '/log/' . $filename . date('/Y/m/d/') . $type . '.txt';
		self::log( $filepath , $content  );
	}
	/**
	 * 纪录错误日志
	 * 按月分组
	 */
	private static function saveLog( $categore , $content ){
		$filepath = self::app_path(). "/log/{$categore}/" . date('Ym/d') . '.txt';
		self::log( $filepath , $content  );
	}
    /**
	 * 日志记法
	 * 0: file
	 * 1... 内容自动以\t分隔, 数组自动var_export($c,true)转换成串
	 */
	public static function dayLog(){
    	//1 获取第一个参数作为文件名
        $params = func_get_args();
        $filePath = $params[0];
		if( !$filePath ){
			return false;
		}
        unset($params[0]);
		if(empty($params)){
			return false;
		}

		//2 将参数重组
		$ps = [];
		foreach($params as $param){
			if( is_array($param) || is_object($param) ){
				$param = var_export($param, true);
			}
			$ps[] = $param;
		}

        $content = implode("\t:\t", $ps);
        static::saveLog($filePath, $content);
		return true;
	}

	/*示例*/
    public function  index(){
//  调用   use app\common\Logger;
        $getData = '123456789';
        Logger::dayLog('cjtback/notify', $getData);
    }
}
