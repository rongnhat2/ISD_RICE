<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Role;
use App\User;

class admin_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $id = DB::table('users')->insertGetId([
            'name'              => 'admin',
            'email'             => 'admin@admin.com',
            'password'          => Hash::make('12345678'),
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
	    DB::table('permissions')->insert([
	        'name'              => 'admin',
	        'display_name' 			=> 'Là Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
        DB::table('permissions')->insert([
	        'name'              => 'user-list',
	        'display_name' 			=> 'Xem Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'user-add',
	        'display_name' 			=> 'Thêm Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'user-edit',
	        'display_name' 			=> 'Sửa Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'user-delete',
	        'display_name' 			=> 'Xóa Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);

	    DB::table('permissions')->insert([
	        'name'              => 'role-list',
	        'display_name' 			=> 'Xem chức vụ',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'role-add',
	        'display_name' 			=> 'Thêm chức vụ',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'role-edit',
	        'display_name' 			=> 'Sửa chức vụ',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'role-delete',
	        'display_name' 			=> 'xóa chức vụ',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);


	    DB::table('permissions')->insert([
	        'name'              => 'category-list',
	        'display_name' 			=> 'Xem Danh Mục',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'category-add',
	        'display_name' 			=> 'Thêm Danh Mục',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'category-edit',
	        'display_name' 			=> 'Sửa Danh Mục',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'category-delete',
	        'display_name' 			=> 'xóa Danh Mục',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);

	    DB::table('permissions')->insert([
	        'name'              => 'resource-list',
	        'display_name' 			=> 'Xem Nguồn Gốc',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'resource-add',
	        'display_name' 			=> 'Thêm Nguồn Gốc',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'resource-edit',
	        'display_name' 			=> 'Sửa Nguồn Gốc',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'resource-delete',
	        'display_name' 			=> 'xóa Nguồn Gốc',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);

	    DB::table('permissions')->insert([
	        'name'              => 'trademark-list',
	        'display_name' 			=> 'Xem Thương Hiệu',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'trademark-add',
	        'display_name' 			=> 'Thêm Thương Hiệu',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'trademark-edit',
	        'display_name' 			=> 'Sửa Thương Hiệu',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'trademark-delete',
	        'display_name' 			=> 'xóa Thương Hiệu',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);

	    DB::table('permissions')->insert([
	        'name'              => 'item-list',
	        'display_name' 			=> 'Xem Sản Phẩm',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'item-add',
	        'display_name' 			=> 'Thêm Sản Phẩm',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'item-edit',
	        'display_name' 			=> 'Sửa Sản Phẩm',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'item-delete',
	        'display_name' 			=> 'xóa Sản Phẩm',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);

	    DB::table('permissions')->insert([
	        'name'              => 'gallery-list',
	        'display_name' 			=> 'Xem Thư Viện Ảnh',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'gallery-add',
	        'display_name' 			=> 'Thêm Thư Viện Ảnh',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);

        DB::table('user_detail')->insertGetId([
            'user_id'              => $id,
        ]);
        $role_id = DB::table('roles')->insertGetId([
            'name'              => 'superadmin',
            'display_name'      => 'Quản Lí Cao Cấp',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_user')->insert([
            'user_id'           => $id,
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '1',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '2',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '3',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '4',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '5',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '6',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '7',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '8',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '9',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '10',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '11',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '12',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '13',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '14',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '15',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '16',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '17',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '18',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '19',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '20',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '21',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '22',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '23',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '24',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '25',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '26',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_permission')->insert([
            'permission_id'     => '27',
            'role_id'      		=> $role_id,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
    }
}
