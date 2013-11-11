<?php
/**
 * Created by JetBrains PhpStorm.
 * User: imagine
 * Date: 2013/9/17
 * Time: 下午 1:55
 */

use Fuel\Core\File;

class View_phptool_index extends ViewModel
{
    public function view()
    {
        //顯示的分析工具列表
        $this->toolList = array(
            'phploc' => 'PHPLOC',
            'phpcpd' => 'PHPCPD',
            'phpmd'  => 'PHPMD'
        );

        //使用者選取的PHPTool(工具,來源專案)
        $this->phptool = Controller_phptool::$phptool;

        // 顯示搜尋結果xml底下的專案目錄（不顯示檔案）
        $this->xmlDir = Controller_phptool::$xmlDir;
    }
}
