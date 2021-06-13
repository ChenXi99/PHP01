<html>
<head>
<title>LOGO CONTEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="sample.css">

</head>
<body>
    <h1>~ MC T-shirt Logo Contest ~</h1>
    
    <div class="logos">
        <label for="logo1"><img src="./img/mc1.jpg" alt=""></label>
        <label for="logo2"><img src="./img/mc2.jpg" alt=""></label>
        <label for="logo3"><img src="./img/mc3.jpg" alt=""></label>
        <label for="logo4"><img src="./img/mc4.jpg" alt=""></label>
    </div>

<form name="form" method="post" action="kadai_chen.php">
    <div class="form1">
        <p>Name: <input type="text" name="name" required></p>
        <p>Email: <input type="email" name="mail" required></p>
    </div>

    <div class="form2">
<?php
$subject=array('','①','②','③','④');
for($i=1; $i<count($subject); $i++){
echo "<input type='radio' id='logo".$i."' name='options' class='options' value='$i'>{$subject[$i]}<br>\n";
}
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
?>

<br>
<input type="submit" name="submit" value="Submit" class="submit">
</div>
</form>

<table>

<?php
$name = $_POST['name'];
$mail = $_POST['mail'];

//日時を取得
$time = date("Y-m-d H:i");

//データを変数にまとめる
$str = $time.' / '.$name.' / '.$mail.' / ';

//データ書き込み
$data=file('data/answer.txt');

	$fp=fopen('data/answer.txt','a');

    if(isset($_POST['submit'])){
        fwrite($fp,$str.$_POST['options'].",");
    }
	fclose($fp);


//データ出力
echo "<hr>";
$textCnt  = "data/answer.txt";
$contents = file_get_contents($textCnt);
$votesFrom = explode(',', $contents);
$opt1 = 0;
$opt2 = 0;
$opt3 = 0;
$opt4 = 0;

foreach($votesFrom as $field) {
    echo substr($field, 0, -1);
    echo substr($field, -1)."<br />";
    $count = substr($field, -1);

if($count==1){
	$opt1++;
}elseif($count==2){
	$opt2++;
}elseif($count==3){
	$opt3++;
}elseif($count==4){
	$opt4++;
}
}

for($i=1; $i<count($subject); $i++){
	echo "<tr>";
	echo "<td>{$subject[$i]}</td>";
	echo "<td><table><tr>";
	$wd=${"opt" . $i}*20;
	echo "<td width='$wd' bgcolor='#ff0000'> </td>";
	echo "<td>".${"opt" . $i}." 票</td>";
	echo "</tr></table></td>";
	echo "</tr>\n";
}
?>

</table>
</body>
</html>