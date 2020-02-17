<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Edit Application Setting',
            'Create Grievance Master Data',
            'Edit Grievance Master Data',
            'Delete Grievance Master Data',
            'Create Bulletin Board',
            'Edit Bulletin Board',
            'Delete Bulletin Board',
            'Create Manual Grievance',
            'Edit Grievance',
            'Process Grievance',
            'Comment Grievance',
            'Create Reports',
        ];

        foreach($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
