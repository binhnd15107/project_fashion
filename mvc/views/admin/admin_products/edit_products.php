<div class="container-fluid">
<?php $bien_phantrang=isset($data['bien'])? $data['bien']:1 ;

?>
    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <a class="btn btn-info" href="http://localhost/huong_doi_tuong/du_an/admin/view_products">Danh sach sản phẩm</a>
                <h2 style="text-align: center;">Sửa Sản Phẩm</h2>
                <div>
                    <span style=" color:red">
                        <?php if (isset($_SESSION['a'])) { ?>
                            <?php echo $_SESSION['a'];
                            unset($_SESSION['a']); ?>
                        <?php } ?>
                    </span>
                </div>
                <?php if (isset($data['finbyid'])) {
                    $retunrr = $data['finbyid'];
                    extract($retunrr);
                ?>

                <?php } ?>

                <form action="admin/update_products" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="bien_phantrang" value="<?=$bien_phantrang?>">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">tên</label>
                        <input type="text" value="<?= $ten_sp ?>" name="ten_sp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">mã</label>
                        <input type="text" value="<?= $ma_sp ?>" name="ma_sp" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">số lượng</label>
                        <input type="number" value="<?= $so_luong ?>" name="so_luong" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">giá</label>
                        <input type="number" value="<?= $gia ?>" name="gia" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ảnh</label>
                        <img style="width:200px;height:250px" src="<?= $img ?>" alt="">
                        <!-- <input type="file" name="img" class="form-control" id="exampleInputPassword1"> -->
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Danh Mục</label>
                        <select style="border-radius: 10px;padding:10px" name="id_danh_muc" id="">
                            <?php

                            if (isset($data['Allcategory'])) {
                                $row = $data['Allcategory'];
                                foreach ($row as $value) {
                                    extract($value); ?>
                                    <option value="<?= $id ?>"><?= $ten_danh_muc ?></option>
                            <?php  }
                            } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mô Tả</label>
                        <textarea style="border-radius: 10px;" value="<?= $mieu_ta ?>" name="mo_ta" id="" cols="60" rows="5"><?= $mieu_ta ?></textarea>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php if (isset($data['insert_products'])) {
                    if ($data['insert_products'] == true) { ?>
                        <?php echo 'thêm thành công'; ?>
                <?php }
                } ?>



            </div>
        </div>
    </div>

</div>