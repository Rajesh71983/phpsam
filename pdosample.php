<?php

$connection = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

var_dump($connection);

$affectedRows = $connection->exec('INSERT INTO books (`id`, `bookname`, `bookdesc`, `created_at`, `updated_at`) VALUES (NULL, "text book", "book desc", NULL, NULL)');
echo $affectedRows;

foreach($connection->query('SELECT * FROM books') as $row) {
    echo $row['id'] . ' ' . $row['bookname'];
}

echo "<hr>";

$statement = $connection->query('SELECT * FROM books');
$rows = $statement->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($rows);

while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo $row['id'] . ' ' . $row['bookname'].'<hr>';
}

echo "PDO::FETCH_BOTH this is the default one. will provide both array and assoc <hr>";
echo "PDO::FETCH_ASSOC provide associative array <hr>";
echo "PDO::FETCH_NUM <hr>";
echo "PDO::FETCH_OBJ <hr>";

var_dump($statement->fetch(PDO::FETCH_NUM));

echo "prepared statement <hr>";
$books = $connection->prepare('Select * From books Where id > :id limit 1');

$id = 2;
$books->execute([
    ':id' => $id
]);

$results = $books->fetchAll(PDO::FETCH_OBJ);

print_r($results);


echo "<hr> Using in method";

$names = [1,2,3,4,5];
$placeholder = implode(',', array_fill(0, count($names), '?'));

$statement3 = $connection->prepare("SELECT * FROM books WHERE id IN ($placeholder)");
$statement3->execute($names);
$results3 = $statement3->fetchAll(PDO::FETCH_OBJ);

echo "<pre>";
print_r($results3);

