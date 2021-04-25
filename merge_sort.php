<!doctype html>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>マージソート</title>
</head>
<body>
	<main>
		<h1>マージソート</h1>
		<a href="index.php">目次に戻る</a>
		<article>
			<p>
				マージソートは、ソートのアルゴリズムで、既に整列してある複数個の列を1個の列にマージする際に、小さいものから先に新しい列に並べれば、新しい列も整列されている、というボトムアップの分割統治法による。大きい列を多数の列に分割し、そのそれぞれをマージする作業は並列化できる。
			</p>
			<p>
				下記のテキストフィールドに数値を入れてください。「ソートする」ボタンをクリックすることで昇順に並べ替えできます。
			</p>
		</article>
		<section>
			<form action="bubble_sort.php" method="post">
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
			<form action="bubble_sort.php" method="post">
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
	$arrCount = count($arr);
	$time_start = microtime(true);
	$data = mergeSort($arr,0, $arrCount-1);
	$time = substr(microtime(true) - $time_start,0,5);
	echo "処理時間:{$time}秒<b<br />";
	$i = 1;
	foreach ($data as $key => $value){
		echo $i.": ".$value."<br />";
		$i++;
	}			 
}

function mergeSort(&$list, $first, $last) {
    if ($first < $last) {
        $center = intval(($first + $last) / 2);
        $p      = 0;
        $j      = 0;
        $k      = $first;
        $tmp    = null;
        mergeSort($list, $first, $center);
        mergeSort($list, $center + 1, $last);
        for ($i = $first; $i <= $center; $i++) {
            $tmp[$p++] = $list[$i];
        }
        while ($i <= $last && $j < $p) {
            if ($tmp[$j] <= $list[$i]) {
                $list[$k] =  $tmp[$j];
                $k++;
                $j++;
            } else {
                $list[$k] = $list[$i];
                $k++;
                $i++;
            }
        }
        while ($j < $p) {
            $list[$k++] = $tmp[$j++];
        }
    }
}
?>
</body>
</html>