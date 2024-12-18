<<?php
 include 'db.php';
 $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
 $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

 $stmt = $pdo->prepare("SELECT * FROM produits LIMIT :limit OFFSET :offset");
 $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
 $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
 $stmt->execute();

 $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

 // format json
 header('Content-Type: application/json');
 echo json_encode($products);
 ?>
