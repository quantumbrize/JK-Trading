<?php
namespace App\Controllers\Admin;
use App\Controllers\Admin\Admin_Controller;

class User_Controller extends Admin_Controller{

    public function index(): void{
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['customer_css.php'],
                'title' => 'Customer',
                'header' => [],
                'sidebar' => ['customer'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['customer_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/customers',$data);
    }

    

    public function load_customer(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['customer_css.php'],
                'title' => 'Sales Person',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['customer_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/customers',$data);
    }

    public function load_vendor(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['vendor_css.php'],
                'title' => 'Vendor',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['vendor_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/vendors',$data);
    }
 
    public function load_staff(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['staff_css.php'],
                'title' => 'Staff',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['staff_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/staff',$data);
    }

    public function load_staff_add(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['staff_add_css.php'],
                'title' => 'New Staff',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['staff_add_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/staff_add',$data);
    }

    function load_staff_update(){
    
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['staff_single_css.php'],
                'title' => 'Staff',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['staff_single_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/staff_single',$data);

    }

    public function load_admon_profile(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['admin_profile_css.php'],
                'title' => 'Admin Profile',
                'header' => [],
                'sidebar' => ['admin_profile'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['admin_profile_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/admin_profile',$data);
    }

    public function load_messages(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['messages_css.php'],
                'title' => 'Messages',
                'header' => [],
                'sidebar' => ['messages'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['messages_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/messages',$data);
    }

    public function load_add_expart_review(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['expart_review_add_css.php'],
                'title' => 'Expart Review',
                'header' => [],
                'sidebar' => ['expart_review'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['expart_review_add_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/expart_review_add',$data);
    }

    public function load_expart_review(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['exparts_reviews_css.php'],
                'title' => 'Expart Review',
                'header' => [],
                'sidebar' => ['expart_review'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['exparts_reviews_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/exparts_reviews',$data);
    }

    public function load_review(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['reviews_css.php'],
                'title' => 'Expart Review',
                'header' => [],
                'sidebar' => ['expart_review'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['reviews_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/reviews',$data);
    }
    public function load_shop_creation(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['shop_creation_css.php'],
                'title' => 'Shop Creation',
                'header' => [],
                'sidebar' => ['shop_creation'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['shop_creation_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/shop_creation',$data);
    }

    public function load_shop_list(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['shop_list_css.php'],
                'title' => 'Shop List',
                'header' => [],
                'sidebar' => ['shop_list'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['shop_list_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/shop_list',$data);
    }
    public function load_sales_person_add(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => [],
                'title' => 'Sales Person',
                'header' => [],
                'sidebar' => ['sales_person'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['sales_person_add_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/sales_person_add',$data);
    }
    public function load_sales_person_all(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => [],
                'title' => 'Sales Person',
                'header' => [],
                'sidebar' => ['sales_person'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['sales_person_all_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/sales_person_all',$data);
    }



}

?>