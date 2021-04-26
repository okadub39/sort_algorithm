<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>クイックソート</title>
</head>
<body>
	<main>
		<h1>クイックソート</h1>
		<a href="index.php">目次に戻る</a>
		<article>
			<p>
				n個のデータをソートする際の最良計算量および平均計算量はO{\displaystyle (n\log n)}(n\log n)である。他のソート法と比べて、一般的に最も高速だといわれているが対象のデータの並びやデータの数によっては必ずしも速いわけではなく、最悪の計算量はO{\displaystyle (n^{2})}(n^{2})である。また数々の変種がある。 安定ソートではない。。
			</p>
			<p>
				下記のテキストフィールドに数値を入れてください。「ソートする」ボタンをクリックすることで昇順に並べ替えできます。
			</p>
		</article>
		<section>
			<form action="quick_sort.php" method="post">
				<li>1: <input type="text" name="01" value="<?php echo (int)$_POST['01']; ?>"/></li>
				<li>2: <input type="text" name="02" value="<?php echo (int)$_POST['02']; ?>"/></li>
				<li>3: <input type="text" name="03" value="<?php echo (int)$_POST['03']; ?>"/></li>
				<li>4: <input type="text" name="04" value="<?php echo (int)$_POST['04']; ?>"/></li>
				<li>5: <input type="text" name="05" value="<?php echo (int)$_POST['05']; ?>"/></li>
				<li>6: <input type="text" name="06" value="<?php echo (int)$_POST['06']; ?>"/></li>
				<li>7: <input type="text" name="07" value="<?php echo (int)$_POST['07']; ?>"/></li>
				<li>8: <input type="text" name="08" value="<?php echo (int)$_POST['08']; ?>"/></li>
				<li>9: <input type="text" name="09" value="<?php echo (int)$_POST['09']; ?>"/></li>
			 	<input type="submit" value="ソートする"/>
			</form>
			<form action="quick_sort.php" method="post">
				<input type="hidden" name="01" value=""/>
				<input type="hidden" name="02" value=""/>
				<input type="hidden" name="03" value=""/>
				<input type="hidden" name="04" value=""/>
				<input type="hidden" name="05" value=""/>
				<input type="hidden" name="06" value=""/>
				<input type="hidden" name="07" value=""/>
				<input type="hidden" name="08" value=""/>
				<input type="hidden" name="09" value=""/>
				<input type="hidden" name="setnull" value="true"/>
				<input type="submit" value="クリア"/>
			</form>
		</section>

<?php
if($_POST["setnull"] == "true"){
	unset($_POST);
}
if(empty($_POST)){
} else {
	$arr   = array();
	foreach ($_POST as $key => $value){
		$arr[] = (int)$value;
	}
	$arrCount   = count($arr);
	$time_start = microtime(true);
	$data = quickSort($arr,0, $arrCount-1);
	$time = substr(microtime(true) - $time_start,0,5);	
	echo "処理時間:{$time}秒<br />";
	$i = 1;
	foreach ($data as $key => $value){
		echo $i.": ".$value."<br />";
		$i++;
	}			 
}
function quickSort(&$list, $first, $last) {
    $firstPointer = $first;
    $lastPointer  = $last;
    $centerValue  = $list[intVal(($firstPointer + $lastPointer) / 2)];
    do {
        while ($list[$firstPointer] < $centerValue) {
            $firstPointer++;
        }
        while ($list[$lastPointer] > $centerValue) {
            $lastPointer--;
        }
        if ($firstPointer <= $lastPointer) {
            $tmp                 = $list[$lastPointer];
            $list[$lastPointer]  = $list[$firstPointer];
            $list[$firstPointer] = $tmp;
            $firstPointer++;
            $lastPointer--;
        }
    } while ($firstPointer <= $lastPointer);
    if ($first < $lastPointer) {
        quickSort($list, $first, $lastPointer);
    }
    if ($firstPointer < $last) {
        //右側が比較可能時
        quickSort($list, $firstPointer, $last);
    }
	return $list;
}
?>
</body>
</html>