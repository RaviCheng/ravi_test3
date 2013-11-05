# 輸出輸出php分析文件
title="程式碼分析工具產生報表, 再利用網頁顯示解析"
# 執行指令 bash phptool.sh
# 2013-10-25 Imagine

# 預設輸出xml目錄
defOutputFolder=/var/www/project001/phptool/xml

# 子專案原始碼 存放路徑
defSubPath=/var/www/project001/source

# 需要執行的專案路徑
project=(
		"git@rda-gitlab.vir888.com:rda/ball_service.git ball_service"
		"https://github.com/fuel/fuel.git fuel"
	  )
# Test
# Count : echo ${#project[@]}
# Array : echo ${project[0]}

###############################################################
echo $title
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
			test -e phptool.sh && bash phptool.sh $defOutputFolder/$downloaddir || echo "=> Error : 請在$downloaddir專案建立phptool.sh指令檔案"
			cd
		done
		;;
# /var/www/blog/public/phptool/P0001
esac
###############################################################




