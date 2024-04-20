<?php
require_once('database_local_product.php');

$plugged_in_category_id = filter_input(INPUT_GET, 'plugged_in_category_id', FILTER_VALIDATE_INT);
if ($plugged_in_category_id == NULL || $plugged_in_category_id == FALSE) {
  $plugged_in_category_id = 1;
}

// Get name for selected category
$queryCategory = 'SELECT * FROM pluggedincategories
          WHERE pluggedinCategoryID = :plugged_in_category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':plugged_in_category_id', $plugged_in_category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['pluggedinCategoryName'];
$statement1->closeCursor();

// Get all categories
$queryAllCategories = 'SELECT * FROM pluggedincategories
             ORDER BY pluggedinCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT * FROM tech
          WHERE pluggedincategoryID = :plugged_in_category_id
          ORDER BY techID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':plugged_in_category_id', $plugged_in_category_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <title>Product Page</title>
  <link rel="stylesheet" href=product_list.css />
</head>

<!-- the body section -->
<body>
<main>
  <h1>Product List</h1>
  <aside>
    <!-- display a list of categories -->
    <h2>Categories</h2>
    <nav>
    <ul>
      <?php foreach ($categories as $category) : ?>
      <li>
        <a href="?plugged_in_category_id=<?php 
            echo $category['pluggedinCategoryID']; 
            ?>">
          <?php echo $category['pluggedinCategoryName']; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
    </nav>       
  </aside>

  <section>
    <!-- display a table of products -->
    <h2><?php echo $category_name; ?></h2>
    <table>
      <tr>
        <th>Code</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Price</th>
        <th> </th>
      </tr>
      <?php foreach ($products as $product) : ?>
      <tr>
        <td><?php echo $product['techCode']; ?></td>
        <td><?php echo $product['techName']; ?></td>
        <td><?php echo $product['description']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <td>
          <form action="delete_product.php" method="post">
            <input type="hidden" name="product_id"
              value="<?php echo $product['techCode']; ?>" />
            <input type="hidden" name="category_id"
              value="<?php echo $product['techName']; ?>" />
            <input type="submit" value="Delete" />
          </form>
        </td>
      </tr>
      <?php endforeach; ?>      
    </table>
  </section>
</main>  
<footer></footer>
</body>
</html>
