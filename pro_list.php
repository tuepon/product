<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
  </head>
<body>

<?php

try
{

$dsn='mysql:dbname=shop;host=localhost;charset=utf8'; //DB接続コピペ
$user='root';
$password='123456';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,name,price FROM mst_product WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null; //DB切断

print '商品一覧<br><br>';

print '<form method="post" action="pro_branch.php">';
while(true)
{
    $rec=$stmt->fetch(PDO::FETCH_ASSOC); //データ取得
    if($rec==false)
    {
        break;
    }
    print '<input type="radio" name="procode" value="'.$rec['code'].'">';
    print $rec['name'].'---';
    print $rec['price'].'円';
    print '<br>';
}
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '</form>';
}
catch (Exception $e)
{
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>
</body>
</html>