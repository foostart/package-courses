<?php namespace Database\Seeders;

use Foostart\Acl\Library\Constants\FoostartConstants;
use Foostart\Category\Helpers\FoostartSeeder;
use Foostart\Course\Models\Course;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class CourseSeeder extends FoostartSeeder
{
    private $obj_pexcel;

    public function __construct() {
        // Table name
        $this->table = 'course';
        // Prefix column
        $this->prefix_column = 'course_';
        // Pexcel object
        $this->obj_pexcel = new Course();

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create sample data
        DB::table('contexts')->insert([
            $this->prefix_context . 'name' => 'Admin course',
            $this->prefix_context . 'key' => 'abee417e2dddc5240b586d499',
            $this->prefix_context . 'ref' => 'admin/course',
            'status' => 99,
            'created_user_id' => 1,
            'updated_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $this->createSampleData();
    }

    /**
     * Create sample data for testing
     */
    private function createSampleData() {
        $isCreateSampleData =  env('DB_SAMPLE_TEST', FoostartConstants::IS_CREATE_SAMPLE_DATA);
        if ($isCreateSampleData == FoostartConstants::IS_CREATE_SAMPLE_DATA) {

            /**
             * crawler_sites
             */
            for($i = 0; $i < FoostartConstants::SAMPLE_DATA_SIZE; $i++) {
                $pexcel = [
                    $this->prefix_column . 'name' => "name_".$i,
                    'category_id' => $i,
                    $this->prefix_column . 'slug' => "slug_".$i,
                    $this->prefix_column . 'start_date' => '13/11/2021',
                    $this->prefix_column . 'end_date' => '13/12/2021',
                    $this->prefix_column . 'image' => 'address'.$i,
                    $this->prefix_column . 'description' => 'Description ' . $i,
                ];
                $this->obj_pexcel->create($pexcel);

            }
        }
    }
}
