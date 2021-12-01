<?php
    class CategoryController extends BaseController
    {
        private $categoryModel;
        public function __construct()
        {
            $this->loadModel('categorymodel');
            $this->categoryModel = new CategoryModel;
        }

        public function delete(){

            if (!Func::isRoleAdmin())
            {
                return $this->view('404');
            } 

            $id = (isset($_GET['id']) ? intval($_GET['id']) : 0);

            $category = $this->categoryModel->getCategoryById($id);

            if ($category == null)
            {
                return $this->view('404');
            }

            if (!isset($_POST['confirmDeleteCategory']))
            {
                $data = [
                    'title' => 'Xóa danh mục ' . $category['name'],
                    'category' => $category
                ];
                return $this->view('category.delete', $data);
            }
          
            $this->categoryModel->removeCategory($id);

            return header('Location: ' . ROUTES['panel_category']);
            
        }

        public function fix(){

            if (!Func::isRoleAdmin())
            {
                return $this->view('404');
            } 

            $id = (isset($_GET['id']) ? intval($_GET['id']) : 0);

            $category = $this->categoryModel->getCategoryById($id);

            if ($category == null)
            {
                return $this->view('404');
            }

            if (!isset($_POST['confirmFixCategory'])) 
            {
                $data = [
                    'title' => 'Sửa danh mục',
                    'category'=>$category
                ];
       
                return $this->view('category.fix',$data);
            }
            if (isset($_POST['confirmFixCategory'])) 
            {
                $name = htmlspecialchars($_POST['category_name']);

                $des = htmlspecialchars($_POST['category_des']);

                $category_fix = [
                    'id' => $id,
                    'name' => $name,
                    'des' => $des
                ];
                
                $this->categoryModel->fixCategory($category_fix);

            }

            return header('Location: ' . ROUTES['panel_category']);

        }

        public function create()
        {
            if (!Func::isRoleAdmin())
            {
                return $this->view('404');
            } 

            if (isset($_POST['confirmCreateCategory'])) {
                $name = htmlspecialchars($_POST['category_name']);
                $des = htmlspecialchars($_POST['category_des']);

                $category_add =[
                    'name'=> $name,
                    'des'=>$des
                ];

                $this->categoryModel->addCategory($category_add);
            }
            if (!isset($_POST['confirmCreateCategory'])) {

                $data=[
                    'title' => 'Tạo danh mục'
                ];            
    
                return $this->view('category.create',$data);
               
            }

            return header('Location: ' . ROUTES['panel_category']);

        }
    }
?>