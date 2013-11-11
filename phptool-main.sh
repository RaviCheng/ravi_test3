# 輸出輸出php分析文件
title="程式碼分析工具產生報表, 再利用網頁顯示解析"
# 執行指令 bash phptool.sh
# 參數 $1 = -d 刪除原專案並從Git下載 
# 依照資料夾下面的所有子專案資料夾都會執行

# 2013-10-25 Imagine

# 加上PHPTool程式路徑
PATH=$PATH:$PWD/bin

# 預設輸出xml目錄
defOutputFolder=`pwd`"/phptool"

# 子專案原始碼 存放路徑
defSubPath=`pwd`"/phptool"


# Test
# Count : echo ${#project[@]}
# Array : echo ${project[0]}

###############################################################
echo $title
echo "其他參數：刪除原專案並從Git下載（bash phptool.sh -d）"
echo ""
pram1=$1
read -p "確定要執行(y/n)？" result
	case "$result" in
	y)
		  ls $defSubPath |while read line
		  do
		 	echo ""
			echo ""
		 	
		 	# Download for Git
		 	downloaddir=`echo $line|awk '{print $1}' `

			echo "∎∎∎∎∎∎∎∎∎∎∎∎∎∎∎ 專案名稱" $downloaddir "∎∎∎∎∎∎∎∎∎∎∎∎∎∎∎"

			# 輸出xml路徑 + phptool
		 	xmlpath=$downloaddir/phptool

		 	# 測試 輸出xml 專案結果的路徑 如果沒有就建立
			test -e $defOutputFolder/$xmlpath && echo "path check ok" || mkdir $defOutputFolder/$xmlpath

		 	if [ "$pram1" = "-cp" ]; then
			 	cp -f tmptool/$downloaddir/phptool-sub.sh $defOutputFolder/$xmlpath
		 	fi

			cd $defSubPath/$xmlpath

			echo "執行指令:$ "bash phptool.sh $defOutputFolder/$xmlpath
			#bash phptool.sh $defOutputFolder/${project[$i]}
			test -e phptool-sub.sh && bash phptool-sub.sh $defOutputFolder/$xmlpath || echo "=> Error : 請在$downloaddir專案建立phptool/phptool.sh指令檔案"
			cd
		done
		;;

esac
###############################################################




