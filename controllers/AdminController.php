<?php
require_once './models/AdminModel.php';
class AdminController
{
    public $AdminModel;
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
    }
    public function checkUser()
    {
        if ($_SESSION['admin'] == null) {
            header('location: ?action=home');
            return;
        }
    }
    public function thongke()
    {
        include "./views/admin/thongke.php";
    }
    public function quan_ly_nguoi_dung()
    {
        $users = $this->AdminModel->getAllUser();
        include "./views/admin/users.php";
    }
    public function loadLocationData()
    {
        $json_file = 'includes/json/data.json';
        if (file_exists($json_file)) {
            $json_data = file_get_contents($json_file);
            return json_decode($json_data, true);
        } else {
            die("File dữ liệu không tồn tại.");
        }
    }

    public function chinh_sua_nguoi_dung()
    {
        $id = $_GET['id'];
        $user = $this->AdminModel->chinh_sua_nguoi_dung($id);

        $data = $this->loadLocationData();

        $city_id = htmlspecialchars($user['city']);
        $district_id = htmlspecialchars($user['district']);
        $commune_id = htmlspecialchars($user['commune']);

        $city_name = $this->getCityNameById($city_id, $data);
        $district_name = $this->getDistrictNameById($city_id, $district_id, $data);
        $commune_name = $this->getCommuneNameById($city_id, $district_id, $commune_id, $data);

        include "./views/admin/edit_user.php";
    }

    public function getCityNameById($id, $data)
    {
        foreach ($data as $city) {
            if ($city['Id'] == $id) {
                return $city['Name'];
            }
        }
        return null;
    }
    public function getDistrictNameById($cityId, $districtId, $data)
    {
        foreach ($data as $city) {
            if ($city['Id'] == $cityId) {
                foreach ($city['Districts'] as $district) {
                    if ($district['Id'] == $districtId) {
                        return $district['Name'];
                    }
                }
            }
        }
        return null;
    }
    public function getCommuneNameById($cityId, $districtId, $communeId, $data)
    {
        foreach ($data as $city) {
            if ($city['Id'] == $cityId) {
                foreach ($city['Districts'] as $district) {
                    if ($district['Id'] == $districtId) {
                        foreach ($district['Wards'] as $commune) {
                            if ($commune['Id'] == $communeId) {
                                return $commune['Name'];
                            }
                        }
                    }
                }
            }
        }
        return null;
    }
    public function quan_ly_danh_muc()
    {
        $categories = $this->AdminModel->getAllCategories();
        include "./views/admin/categories.php";
    }
    public function nhanh_con_categories()
    {
        $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : null;
        $categories = $this->AdminModel->getCategoriesById($id);
        $categorie['id'] = $_GET['id'];
        $sub_categories = $this->AdminModel->getSubCategoriesByParentCategoryId($id);
        include "./views/admin/sub_categories.php";
    }
    public function nhanh_con_con_categories()
    {
        $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : null;
        $category = $_GET['category'];
        $categorie = $this->AdminModel->getCategoriesById($category);
        $sub_category =
            $this->AdminModel->getSubCategoriesById($id);
        $sub_sub_categories = $this->AdminModel->getSubSubCategoriesByParentSubcategoryId($id);
        include "./views/admin/sub_sub_categories.php";
    }
    public function products()
    {
        $products = $this->AdminModel->getAllProduct();
        include "./views/admin/products.php";
    }
    public function add_product()
    {
        include "./views/admin/add_product.php";
    }
}
