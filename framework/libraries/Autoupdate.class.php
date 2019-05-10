<?php
namespace framework\libraries;

class Autoupdate {
	/*
	 * 保存日志
	 */
	private $_log = false;
	
	/* 
	 * 日志保存路径
	 */
	public $logFile = 'update.log';
	
	/*
	 * 最后的错误
	 */
	private $_lastError = null;
	
	/*
	 * 当前版本
	 */
	public $currentVersion = 0;
	
	/*
	 * 最新版本
	 */
	public $latestVersion = null;
	
	/*
	 * 最新版本地址
	 */
	public $latestUpdate = null;
	
	/*
	 * 更新服务器地址（带/）
	 */
	public $updateUrl = '';
	
	/*
	 * 服务器上的版本文件名称
	 */
	public $updateIni = 'CheckUpdate.php';
	
	/*
	 * 临时下载目录
	 */
	public $tempDir = 'temp/';
	
	/*
	 * 安装完成后删除临时目录
	 */
	public $removeTempDir = true;
	
	/*
	 * 安装目录
	 */
	public $installDir = '';
	
	/**
	 * 创建新实例
	 * @param [type]  $installDir 安装路径
	 * @param boolean $log        是否启用日志
	 */
	public function __construct($installDir,$log = false) {
		ini_set('max_execution_time', 600);
		$this->_log = $log;
		$this->installDir = $installDir;
	}
	
	/* 
	 * 日志记录
	 *
	 * @param string $message 信息
	 */
	public function log($message) {
		$this->_lastError = $message;
		if ($this->_log) {
			$log = fopen($this->logFile, 'a');
			if ($log) {
				$message = date('[Y-m-d H:i:s] ').$message."\r\n";
				fputs($log, $message);
				fclose($log);
			}else {
				$this->_lastError = '无法写入日志文件!';
			}
		}
	}
	
	/*
	 * 获取错误信息
	 *
	 * @return string 最后的错误
	 */
	public function getLastError() {
		if (!is_null($this->_lastError))
			return $this->_lastError;
		else
			return '日志尚未开启！';
	}
	
	/**
	 * 删除指定路径下所有文件
	 * @param  [type] $dir 路径
	 */
	private function _removeDir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir") 
						// 是路径
						$this->_removeDir($dir."/".$object); 
					else 
						// 删除文件
						unlink($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}
}