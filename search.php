<center>
    <?php
    require_once('./components/header.php');
    require_once('./components/menu.php');

    require_once('./libs/connect.php');

    // get data from db
    $conn = getDB();
    $sql = "SELECT * FROM found_item";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
</center>

<div class="container">
    <center>
        <h3>ค้นหาของหาย</h3>
    </center>

    <div class="row">
        <?php
        foreach ($data as $item) {
            echo "<div class='col-md-3'>";
            echo "<div class='card' style='width: 18rem;'>";
            echo "<img src='storage/uploads/" . $item['image'] . "' class='card-img-top' alt='...'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $item['name'] . "</h5>";
            echo "<p class='card-text'>" . $item['description'] . "<br>";
            echo "<b>วันที่พบ </b>:" . $item['founddate']  . "<br>";
            echo "<b>สถานที่พบ</b>: " . $item['place'] . "<br></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>



<center>
    <?php
    require_once('./components/footer.php');
    ?>
</center>