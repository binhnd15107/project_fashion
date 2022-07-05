<div class="container-fluid">

    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <a class="btn btn-info" href="admin/view_products">Danh sach sản phẩm</a>
                <div>
                    <span style=" color:red">
                        <?php if (isset($_SESSION['a'])) { ?>
                            <?php echo $_SESSION['a'];
                            unset($_SESSION['a']); ?>
                        <?php } ?>
                    </span>
                </div>

                <form action="admin/store" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">tên</label>
                        <input type="text" name="ten_sp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">mã</label>
                        <input type="text" name="ma_sp" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">số lượng</label>
                        <input type="number" name="so_luong" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">giá</label>
                        <input type="number" name="gia" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ảnh</label>
                        <input type="file" name="img" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ảnh Mô Tả</label>
                        <input type="file" name="imgs[]" multiple='multiple' class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Danh Mục</label>
                        <select style="border-radius: 10px;padding:10px" name="id_danh_muc" id="">
                            <?php

                            if (isset($data['Allcategory'])) {
                                $row = $data['Allcategory'];
                                foreach ($row as $value) {
                                    extract($value); ?>
                                    <option value="<?=$id?>"><?= $ten_danh_muc ?></option>
                            <?php  }
                            } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mô Tả</label>
                        <textarea style="border-radius: 10px;" name="mo_ta" id="" cols="60" rows="5"></textarea>

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