<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-home"></i>
            <span style="font-size: 18px;">Trang chủ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản lý danh Mục</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin/view_category">Tất cả danh mục</a>
            </div>
        </div>
        <?php
        if (isset($data['Allcategory'])) {
            $row = $data['Allcategory'];
            foreach ($row as $value) {
                extract($value); ?>
                
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="http://localhost/huong_doi_tuong/du_an/admin/select_san_pham_where_loai/<?=$id?>/<?=$pages=1?>"><?= $ten_danh_muc ?></a>
                    </div>
                </div>



        <?php  }
        } ?>


    </li>
    <hr class="sidebar-divider">
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-tshirt"></i>
            <span>Danh sách sản phẩm</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="admin/view_products">Tất Cả Sản Phẩm</a>
                <a class="collapse-item" href="admin/view_products">Top Sản Phẩm Mới</a>
                <a class="collapse-item" href="admin/select_luot_xem">Top lượt xem cao</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/huong_doi_tuong/du_an/admin/select_customer">
        <i class="fas fa-user-tie"></i>
            <span>Danh Sách Khách Hàng</span></a>
    </li>
    <hr class="sidebar-divider">
    <!-- bình luân -->
    <li class="nav-item">
        <a class="nav-link" href="admin/thong_ke_cmt">
        <i class="fas fa-mail-bulk"></i>
            <span>Phản Hồi Của Khách hàng</span></a>
    </li>
    <hr class="sidebar-divider">
    <!-- Đơn hàng -->
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/huong_doi_tuong/du_an/admin/bill_cart">
        <i class="fas fa-shopping-cart"></i>
            <span>Đơn Hàng</span></a>
    </li>

    <!-- Đơn hàng -->
  
    <!-- Divider -->
    


    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>