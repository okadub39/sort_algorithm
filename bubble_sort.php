<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>バブルソート</title>
</head>
<body>
	<main>
		<h1>バブルソート</h1>
		<a href="index.php">目次に戻る</a>
		<article>
			<p>
				全ての要素に関して、隣接する要素と比較し順序が逆であれば入れ替える。これを要素数-1回繰り返すことでソートを行なう。なおこの繰り返しは、入れ替えが起こらなくなった時点で（それ以降は何度繰り返しても変化が起こらなくなるので）中断することができる。
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
	$data = bubble_sort($arr);
	$i = 1;
	foreach ($data as $key => $value){
		echo $i.": ".$value."<br />";
		$i++;
	}			 
}

function bubble_sort($array)
{
    for($i = 0; $i < count($array); $i++)
    {
        for($n = 1; $n < count($array); $n++)
        {
            if($array[$n-1] > $array[$n])
            {
                $temp = $array[$n];
                $array[$n] = $array[$n-1];
                $array[$n-1] = $temp;
            }
        }
    }
    return $array;
}


