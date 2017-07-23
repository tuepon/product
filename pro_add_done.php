<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>商品追加完了</title>
  </head>
<body>

<?php

try
{

$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou_name=$_POST['gazou_name'];

$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

$dsn='mysql:dbname=shop;host=localhost;charset=utf8'; //DB接続
$user='root';
$password='123456';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO mst_product (name,price,gazou) VALUES (?,?,?)'; //レコード追加
$stmt=$dbh->prepare($sql);
$data[]=$pro_name;
$data[]=$pro_price;
$data[]=$pro_gazou_name;
$stmt->execute($data);

$dbh=null;

print $pro_name;
print 'を追加しました。<br>';

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