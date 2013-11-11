#!/bin/sh
# 輸出輸出php分析文件
title="程式碼分析工具產生報表, 再利用網頁顯示解析"
# 執行指令 bash phptool-sub.sh
# 參數 $1 = path 指定輸出路徑(控制端使用) 
# 2013-10-25 Imagine

# output name=phploc.xml , phpcpd.xml , phpmd.xml
# 請放置在=專案名稱/phptool/phptool-sub.sh

# 預設輸出目錄
defOutputFolder=$PWD

# 預設要分析的檔案
defPath=../fuel/app/classes


###############################################################


OutputFile() {
	# PHPLOC
	echo "STEP1 開始分析PHPLOC..."
	test -e $defOutputFolder/phploc.xml && rm $defOutputFolder/phploc.xml
	
	phploc --log-xml $defOutputFolder/phploc.xml $defPath -q

	# PHPCPD
	echo "STEP2 開始分析PHPCPD..."
	test -e $defOutputFolder/phpcpd.xml  && rm $defOutputFolder/phpcpd.xml
	
	#不讓phpcpd display 內容
	outphpcpd=`phpcpd --quiet --log-pmd $defOutputFolder/phpcpd.xml $defPath`


	# PHPMD
	echo "STEP3 開始分析PHPMD...."
	test -e $defOutputFolder/phpmd.xml && rm $defOutputFolder/phpmd.xml
	
	#phpmd $defPath xml codesize,unusedcode,naming >> $defOutputFolder/phpmd.xml
	#指令範例 phpmd fuel/app/classes xml codesize,unusedcode,naming >> phpmd.xml
	#phpmd+git
	outphpmd > $defOutputFolder/phpmd.xml	
}

###############################################################
outphpmd() {

	count=`expr 0`
	
	echo '<?xml version="1.0" encoding="UTF-8" ?>'

	filetime=`date '+%Y-%m-%dT%H:%M:%S+08:00'`
	echo '<pmd version="1.5.0" timestamp="'$filetime'">'

	# 先取得資料行數 用來比對 最後一筆
	countmax=`phpmd $defPath text codesize,unusedcode,naming | wc -l`
	countnosp=`expr $countmax - 1`

	phpmd $defPath text codesize,unusedcode,naming |while read line
	do 
	 
		# 先將第一串字串取出 filename:fileline
		text=`echo $line|awk '{print $1}' `

		# 判斷不可為空字串(第一行可能為空白)
		if [ -n "$line" ]; then 
			# 再依照分割符號 : 切割為$1跟$2
			
			count=`expr $count + 1`
		
			filename=`echo $text|awk -F ":" '{print $1}' `
			fileline=`echo $text|awk -F ":" '{print $2}' `

			# 取得第一段的字串長度，再從第一段長度的尾端開始擷取為第二段
			len=${#text}
			errmsg=${line:$len}
			
			# Test Echo
			# echo "$fileline,$filename" 

			# 加上xml尾端標籤
			if [ "$filename" != "$tmp" -a "$count" -gt 1 ]; then	
				echo '  </file>'
			fi

			# 加上xml開頭標籤
			if [ "$filename" != "$tmp" ]; then
				echo '  <file name="'$filename'">'
			fi
			
				
			# 進行 Git指令取得 作者名稱
			fileauthor=`git blame -L $fileline,$fileline --line-porcelain $filename |
			sed -n 's/^author //p'`


			
			echo '    <violation beginline="'$fileline'" author="'$fileauthor'">'
			echo '      '$errmsg
			echo '    </violation>'
			
			
			tmp=$filename
			
		fi

	done
	
	if [ "$countnosp" != 0 ]; then
		echo '  </file>'
	fi

	echo "</pmd>"


}

###############################################################


if  [  "$1" ]; then
	defOutputFolder=$1
	OutputFile
else
	echo ""
	echo $title
	read -p "確定要執行(y/n)？" result
	case "$result" in
	y)	
	OutputFile $defOutputFolder
	echo "分析程序結束，請開啟 host/phptool 查詢報表"
	;;
	esac
fi