<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>シェルソート</title>
</head>
<body>
	<main>
		<h1>シェルソート</h1>
		<a href="index.php">目次に戻る</a>
		<article>
			<p>
				シェルソート（改良挿入ソート、英語: Shellsort, Shell sort, Shell's method）は、in-placeな比較ソートのアルゴリズムの一種である。シェルソートは、交換によるソート（バブルソート）あるいは挿入によるソート（挿入ソート）の一般化と見なすことができる[2]。ソートの方法は、まず、間隔の離れた要素の組に対してソートを行い、だんだんと比較する要素間の間隔を小さくしながらソートを繰り返す、というものである。離れた場所の要素からソートを始めることで、単純に近くの要素を比較する場合よりも速く、要素を所定の位置に移動させることができる。ただし、安定ソートではない。
			</p>
			<p>
				下記のテキストフィールドに数値を入れてください。「ソートする」ボタンをクリックすることで昇順に並べ替えできます。
			</p>
		</article>
		<section>
			<form action="shell_sort.php" method="post">
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
			<form action="shell_sort.php" method="post">
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
	$data = shellSort($arr);
	$time = substr(microtime(true) - $time_start,0,5);	
	echo "処理時間:{$time}秒<br />";
	$i = 1;
	foreach ($data as $key => $value){
		echo $i.": ".$value."<br />";
		$i++;
	}			 
}
function shellSort(&$list) {
	$listCount = count($list);
	$step = 1;
	for($step_tmp = 1; $step_tmp < $listCount / 9; $step_tmp = $step_tmp * 3 + 1 ){
		$step = $step_tmp;
	}
	while($step > 0 ){
		for($index = $step; $index < $listCount; $index++ ){
			$tmp = $list[$index];
			for($j = $index - $step; $j >= 0 && $list[$j] > $tmp; $j = $j - $step ){
				$list[$j + $step ] = $list[$j];
			}
			$list[$j + $step] = $tmp;
		}
		$step = (int) ($step / 3);
	}
	return $list;
}
?>
</body>
</html>