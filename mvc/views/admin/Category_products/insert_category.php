<div class="container">
    <h2 style="text-align: center;">Danh mục</h2>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>TÊN DANH MỤC</td>
                <td>EDIT</td>
                <td>DELETE</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $row = $data['Allcategory'];
            foreach ($row as $value) {
                extract($value); ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $ten_danh_muc ?></td>

                    <td><a class='btn btn-danger' onclick="return window.confirm('bạn có muốn xóa không')" href="admin/delete_category/<?= $id ?>">xóa</a></td>
                    <td><a class='btn btn-primary' onclick="return window.confirm('bạn có muốn sửa không')" href="admin/edit_category/<?= $id ?>">Sửa</a></td>
                </tr>

            <?php  } ?>
        </tbody>
    </table>

    <?php if (isset($data['finbyid-category'])) {
        $row = $data['finbyid-category'];
        extract($row);
    ?>

        <h2 class='insert_category'>Sửa Danh Mục</h2>
        <form action="admin/update_category" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input style="border-radius: 10px;" type="text" value="<?=$ten_danh_muc?>" name="ten_danh_muc" size="40">
            <button style="border: none;  background: white;"><i class="far fa-paper-plane"></i></button>
            <br>
            <span style="color:red ;margin-top: 20px;">
                <?php if (isset($_SESSION['check_category'])) { ?>
                    <?php echo $_SESSION['check_category'];
                    unset($_SESSION['check_category']); ?>
                <?php } elseif (isset($data['insert'])) {
                    echo 'Sửa Thành Công!!';
                } ?>
            </span>
        </form>
    <?php } else { ?>
        <h2 class='insert_category'>Thêm Danh Mục</h2>
        <form action="admin/insert_category" method="POST">
            <input style="border-radius: 10px;" type="text" name="ten_danh_muc" size="40">
           <!-- <br> -->
           <!-- Ẩn <input type="radio" value="0" name="trang_thai">
           Hiện <input type="radio" value="1" name="trang_thai"> -->
            <button style="border: none;  background: white;"><i class="far fa-paper-plane"></i></button>
            <br>
            <span style="color:red ;margin-top: 20px;">
                <?php if (isset($_SESSION['check_category'])) { ?>
                    <?php echo $_SESSION['check_category'];
                    unset($_SESSION['check_category']); ?>
             <?php } ?>
            </span>
        </form>
    <?php } ?>
</div>