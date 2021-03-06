<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>挿入ソート</title>
</head>
<body>
	<main>
		<h1>挿入ソート</h1>
		<a href="index.php">目次に戻る</a>
		<article>
			<p>
				挿入ソート（インサーションソート）は、ソートのアルゴリズムの一つ。整列してある配列に追加要素を適切な場所に挿入すること。平均計算時間・最悪計算時間がともにO(n2)と遅いが、アルゴリズムが単純で実装が容易なため、しばしば用いられる。安定な内部ソート。基本挿入法ともいう。in-placeアルゴリズムであり、オンラインアルゴリズムである。
			</p>
			<p>
				下記のテキストフィールドに数値を入れてください。「ソートする」ボタンをクリックすることで昇順に並べ替えできます。
			</p>
		</article>
		<section>
			<form action="insertion_sort.php" method="post">
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
			<form action="insertion_sort.php" method="post">
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
	$data = insertionSort($arr);
	$time = substr(microtime(true) - $time_start,0,5);	
	echo "処理時間:{$time}秒<br />";
	$i = 1;
	foreach ($data as $key => $value){
		echo $i.": ".$value."<br />";
		$i++;
	}			 
}
function insertionSort(&$list) {
	$listCount = count($list);
	for($sortedCount = 1; $sortedCount < $listCount; $sortedCount++ ) {
		$tmp = $list[$sortedCount];
		for($index= $sortedCount; $index >= 1 && $list[$index - 1] > $tmp; $index--) {
			$list[$index] = $list[$index - 1];
		}
		$indexMinusOne = $index;
		$list[$indexMinusOne] = $tmp;
	}
	return $list;
}
?>
</body>
</html>