<?php
/**
 * Created by JetBrains PhpStorm.
 * User: imagine
 * Date: 2013/9/17
 * Time: 下午 1:55
 * To change this template use File | Settings | File Templates.
 */

use \Fuel\Core\File;
use Fuel\Core\Input;

/**
 * PHPTool系統品質分析工具
 * Class Controller_phptool
 */
class Controller_phptool extends Controller
{

    /**
     * @var string is PHPTool Type
     * (PHPLOC,PHPCPD,PHPMD)
     */
    public static $type;

    /**
     * @var string is ProjectName
     */
    public static $source;

    /**
     * @var string is Project Xml Path
     */
    public static $xmlPath;

    /**
     * @var array is PHPTool List in View
     */
    public static $phptool =
        array(
            'phploc'=>'PHPLOC',
            'phpcpd'=>'PHPCPD',
            'phpmd'=>'PHPMD'
                );


    /**
     * 建構子
     * 取得網址變數與設定xml路徑
     */
    public function before()
    {
        parent::before();

        static::$type = Uri::segment(2);
        static::$source = Uri::segment(3);
        // 設定Xml路徑
        static::$xmlPath = DOCROOT.'assets/phptool/xml/';
    }

    /**
     * PHPTool頁面首頁
     * 同一頁面包所有的分析工具，依照網址判斷工具名與專案名
     * @return void
     */
    public function action_index()
    {
        //設定給View顯示於頁面的列表
        $data['phptool']['list'] = static::$phptool;

        // 顯示搜尋結果xml底下的專案目錄（不顯示檔案）
        $xmlDir = File::read_dir(static::$xmlPath, 1, array('!^' => 'file',));
        $data['xmlDir'] = $xmlDir;

        // 已選取專案才讀取xml資料
        $data['phptool']['type'] = static::$type;
        $data['phptool']['source'] = static::$source;

        // 依選取的項目載入
        if(static::$source){
            $xmlfile = simplexml_load_file(static::$xmlPath.static::$source.'/'.static::$type.'.xml');
            switch(static::$type){
                case 'phploc';
                    $data['phptool']['xmlfile'] = $xmlfile;
                    break;
                case 'phpcpd';
                    $data['phptool']['xmlfile'] = $xmlfile->duplication;
                    break;
                case 'phpmd';
                    $data['phptool']['xmlfile'] = $xmlfile->file;
                    break;
            }
        }

        return View::forge('phptool/index', $data);
    }


    /**
     * PHPMD分析工具（整合全部專案）
     * 載入全部專案的XML分析結果檔，再進行運算
     * @return void
     */
    public function action_phpmd()
    {
        $data['phptool']['list'] = static::$phptool;

        // 顯示搜尋結果xml底下的專案目錄（不顯示檔案）
        $xmlDir = File::read_dir(static::$xmlPath, 1, array('!^' => 'file',));
        $data['xmlDir'] = $xmlDir;

        // 已選取專案才讀取xml資料
        $data['phptool']['type'] = static::$type;

        // 開始計算(依照使用者出現次數，出現一次加一，因來源檔出現一次只會顯示一行錯誤）
        $data["sum"] = 0;
        foreach ($xmlDir as $key => $value) {

            $xmlfile = simplexml_load_file(static::$xmlPath.$key.'phpmd.xml');
            $count = 0;
            foreach($xmlfile->file as $item){
                $count++;
                foreach($item->violation as $violation){
                    //統計使用者
                    $author = strval($violation['author']);
                    $gitauth[$author] = (! isset($gitauth[$author])) ? 1 : $gitauth[
                            $author
                        ] + 1;

                    $data["sum"]++;
                }
            }
        }

        // 將結果插入$data給前台使用
        $data["gitauth"] = array();
        Arr::insert_assoc($data["gitauth"],$gitauth,0);

        return View::forge('phptool/phpmd', $data);
    }


}
