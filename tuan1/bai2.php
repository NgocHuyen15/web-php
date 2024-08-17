<?php  
  
$books = [];  
for ($i = 1; $i <= 100; $i++) {  
    $books[] = [  
        'id' => $i,  
        'title' => "Tensach$i",  
        'content' => "Noidung$i"  
    ];  
}  

 
$limit = 10;  


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  
$start = ($page - 1) * $limit;  

 
$currentBooks = array_slice($books, $start, $limit);  

  
$totalBooks = count($books);  
$totalPages = ceil($totalBooks / $limit);  
?>  

<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <title>Danh Sách Sách</title>  
</head>  
<body>  
    <h1>Danh Sách Sách</h1>  
    <table border="1">  
        <tr>  
            <th>STT</th>  
            <th>Tên sách</th>  
            <th>Nội dung sách</th>  
        </tr>  
        <?php foreach ($currentBooks as $book): ?>  
            <tr>  
                <td><?php echo $book['id']; ?></td>  
                <td><?php echo $book['title']; ?></td>  
                <td><?php echo $book['content']; ?></td>  
            </tr>  
        <?php endforeach; ?>  
    </table>  

    <div>  
        <?php if ($page > 1): ?>  
            <a href="?page=<?php echo $page - 1; ?>">Trang trước</a>  
        <?php endif; ?>  

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>  
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>  
        <?php endfor; ?>  

        <?php if ($page < $totalPages): ?>  
            <a href="?page=<?php echo $page + 1; ?>">Trang sau</a>  
        <?php endif; ?>  
    </div>  
</body>  
</html>