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
use Fuel\Core\PhpErrorException;

/**
 * PHPTool系統品質分析工具
 * Class Controller_phptool
 */
class Controller_phptool extends Controller
{

    /**
     * @var Array is PHPTool Group
     * [use]=使用者選擇的phptool(ex：phploc)
     * [source]=使用者選擇的專案xml File
     */
    public static $phptool = array();


    /**
     * @var string is Project Xml Path
     */
    public static $xmlPath;

    /**
     * @var Array is LoadDir
     */
    public static $xmlDir;


    /**
     * 建構子
     * 取得網址變數與設定xml路徑
     */
    public function before()
    {
        parent::before();

        static::$phptool = array(
            "source" => Uri::segment(3),
            "use"    => Uri::segment(2)
        );

        // 設定Xml路徑
        static::$xmlPath = realpath(DOCROOT.'/../phptool').DIRECTORY_SEPARATOR;
        static::$xmlDir  = File::read_dir(static::$xmlPath, 1, array('!^' => 'file',));
    }


    /**
     * PHPTool頁面首頁
     * 同一頁面包所有的分析工具，依照網址判斷工具名與專案名
     *
     * @return void
     */
    public function action_index()
    {
        $view = ViewModel::forge('phptool/index');

        $loadFile = static::$xmlPath.implode("/", static::$phptool).'.xml';

        // 依選取的項目載入
        if (static::$phptool["source"]) {
            if (file_exists($loadFile)) {
                try {
                    $xmlfile = simplexml_load_file($loadFile);
                    $view->set("xmlfile", $xmlfile)->auto_filter(false);
                } catch (PhpErrorException $ex) {
                    $view->set(
                        "message",
                        $ex->getMessage()
                    );
                }
            } else {
                $view->set(
                    "message",
                    '哦哦！'.$loadFile.'xml 不存在！
                                   <br/>您可能尚未從伺服器執行執行分析結果。'
                )->auto_filter(false);
            }
        }

        return Response::forge($view);
    }


    /**
     * PHPMD分析工具（整合全部專案）
     * 載入全部專案的XML分析結果檔，再進行運算
     *
     * @return void
     */
    public function action_phpmd()
    {
        //共用index的ViewModel
        $view = ViewModel::forge('phptool/index', 'view', null, 'phptool/phpmd');


        // 開始計算(依照使用者出現次數，出現一次加一，因來源檔出現一次只會顯示一行錯誤）
        $total   = 0;
        $gitauth = array();
        foreach (static::$xmlDir as $key => $value) {
            $source = static::$xmlPath.$key.'phpmd.xml';
            if (file_exists($source)) {
                try {
                    $xmlfile = simplexml_load_file($source);
                    $count   = 0;
                    foreach ($xmlfile->file as $item) {
                        $count ++;
                        foreach ($item->violation as $violation) {
                            //統計使用者
                            $author           = strval($violation['author']);
                            $gitauth[$author] = (! isset($gitauth[$author])) ? 1 : $gitauth[$author] + 1;

                            $total ++;
                        }
                    }
                } catch (PhpErrorException $ex) {
                    $view->set(
                        "message",
                        $ex->getMessage()
                    );
                }
            }
        }

        $view->set("total", $total);
        $view->set("gitauth", $gitauth);
        if ($total == 0) {
            $view->set("message", '哦哦！目前沒有任何PHPMD的分析結果。')->auto_filter(false);
        }

        return Response::forge($view);
    }


}
