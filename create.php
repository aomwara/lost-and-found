<center>
    <?php
    require_once('./components/header.php');
    require_once('./components/menu.php');

    require_once('./libs/connect.php');

    //save data to database
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $founddate = $_POST['founddate'];
        $place = $_POST['place'];
        $image = $_FILES['image'];
        //random img name
        $img_name = rand(111111, 999999) . "_" . $image['name'];

        $conn = getDB();
        $sql = "INSERT INTO found_item (name, description, founddate, place, image) VALUES ('$name', '$description', '$founddate', '$place', '$img_name')";
        error_reporting(0);
        //keep image to storage
        $target_dir = "storage/uploads/";
        $target_file = $target_dir . basename($img_name);

        //insert to db with pdo
        if ($conn->exec($sql)) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            echo "<div class='alert alert-success'>บันทึกข้อมูลสำเร็จ</div>";
        } else {
            echo "<div class='alert alert-danger'>บันทึกไม่สำเร็จ</div>";
        }
    }

    ?>
</center>

<div class="container">

    <center>
        <h3>เพิ่มรายการของหาย</h3>
    </center>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- form found -->
                <div class="form-group">
                    <label for="name">ชื่อสิ่งของ</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อสิ่งของ">
                </div>

                <div class="form-group">
                    <label for="description">ลักษณะของสิ่งของ</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="founddate">วันที่พบ</label>
                    <input type="date" class="form-control" id="founddate" name="founddate">
                </div>

                <div class="form-group">
                    <label for="place">สถานที่พบ</label>
                    <input type="text" class="form-control" id="place" name="place" placeholder="สถานที่พบ">
                </div>

                <div class="form-group">
                    <label for="image">รูปภาพ</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                <!-- submit button -->
                <button type="submit" class="btn btn-block btn-primary">บันทึก</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>

</div>


<center>
    <?php
    require_once('./components/footer.php');
    ?>
</center>