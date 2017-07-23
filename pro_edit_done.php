<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>商品修正完了</title>
  </head>
<body>

<?php

try
{

$pro_code=$_POST['code'];
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];

$pro_code=htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

$dsn='mysql:dbname=shop;host=localhost;charset=utf8'; //DB接続
$user='root';
$password='123456';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='UPDATE mst_product SET name=?,price=? WHERE code=?'; //レコード更新
$stmt=$dbh->prepare($sql);
$data[]=$pro_name;
$data[]=$pro_price;
$data[]=$pro_code;
$stmt->execute($data);

$dbh=null;

print '修正しました。<br>';

}
catch (Exception $e)
{
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>

<a href="pro_list.php"> 戻る </a>

</body>
</html>