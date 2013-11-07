# 輸出輸出php分析文件
title="程式碼分析工具產生報表, 再利用網頁顯示解析"
# 執行指令 bash phptool.sh
# 參數 $1 = -d 刪除原專案並從Git下載 
# 2013-10-25 Imagine

# 加上PHPTool程式路徑
PATH=$PATH:$PWD/bin

# 預設輸出xml目錄
defOutputFolder=`pwd`"/phptool"

# 子專案原始碼 存放路徑
defSubPath=`pwd`"/phptool"

# 需要執行的專案路徑
project=(
		"git@link1 coconut"
		"git@link2 matrix"
		"git@link3 shaddock"
	  )
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
		
		 for ((i=0; i < ${#project[@]} ; i = i +1)) do
		 	echo ""
			echo ""
		 	echo "∎∎∎∎∎∎∎∎∎∎∎∎∎∎∎ 專案名稱" ${project[$i]} "∎∎∎∎∎∎∎∎∎∎∎∎∎∎∎"
		 	# Download for Git
		 	downloadlink=`echo ${project[$i]}|awk '{print $1}' `
		 	downloaddir=`echo ${project[$i]}|awk '{print $2}' `

		 	if [ "$pram1" = "-d" ]; then
			 	cd $defSubPath
			 	test -e $downloaddir  && rm -rf $downloaddir
			 	git clone $downloadlink $downloaddir
		 	fi

		 	# 測試 輸出xml 專案結果的路徑 如果沒有就建立
		 	test -e $defOutputFolder/$downloaddir && echo "path check ok" || mkdir $defOutputFolder/$downloaddir
			cd $defSubPath/$downloaddir

			echo "執行指令:$ "bash phptool.sh $defOutputFolder/$downloaddir
			#bash phptool.sh $defOutputFolder/${project[$i]}
			test -e phptool-sub.sh && bash phptool-sub.sh $defOutputFolder/$downloaddir || echo "=> Error : 請在$downloaddir專案建立phptool.sh指令檔案"
			cd
		done
		;;

esac
###############################################################




