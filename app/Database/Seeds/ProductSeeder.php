<?php namespace App\Database\Seeds;

class ProductSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $random_price = [1000,2000,3000,4000,5000];

        for($i = 0; $i < 5; $i++)
        {
            $number = $i + 1;
            $data[$i] = [
                'name' => "Product $number",
                'price' => $random_price[$i],
                'description' => 'Lorem, ipsum dolor sit amet ...',
                'photo' => "product$number.png"
            ];
            $this->db->table('products')->insert($data[$i]);
        }
            
    }
}