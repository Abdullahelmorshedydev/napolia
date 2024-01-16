<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->delete();

        $cities = [
            [
                'ar' => 'القاهرة',
                'en' => 'Cairo',
            ],
            [
                'ar' => 'طنطا',
                'en' => 'Tanta',
            ],
            [
                'ar' => 'الاسكندرية',
                'en' => 'Alexandria',
            ],
            [
                'ar' => 'الجيرة',
                'en' => 'Giza',
            ],
            [
                'ar' => 'شبرا الخيمة',
                'en' => 'Shubra El-Kheima',
            ],
            [
                'ar' => 'بورسعيد',
                'en' => 'Port Said',
            ],
            [
                'ar' => 'السويس',
                'en' => 'Suez',
            ],
            [
                'ar' => 'الاقصر',
                'en' => 'Luxor',
            ],
            [
                'ar' => 'أسوان',
                'en' => 'Aswan',
            ],
            [
                'ar' => 'المنصورة',
                'en' => 'al-Mansura',
            ],
            [
                'ar' => 'المحلة الكبرى',
                'en' => 'El-Mahalla El-Kubra',
            ],
            [
                'ar' => 'أسيوط',
                'en' => 'Asyut',
            ],
            [
                'ar' => 'الاسماعيلية',
                'en' => 'Ismailia',
            ],
            [
                'ar' => 'الفيوم',
                'en' => 'Fayyum',
            ],
            [
                'ar' => 'الزقازيق',
                'en' => 'Zagazig',
            ],
            [
                'ar' => 'دمياط',
                'en' => 'Damietta',
            ],
            [
                'ar' => 'دمياط الجديدة',
                'en' => 'Damietta El-Gadeeda',
            ],
            [
                'ar' => 'دمنهور',
                'en' => 'Damanhur',
            ],
            [
                'ar' => 'المنيا',
                'en' => 'al-Minya',
            ],
            [
                'ar' => 'بنى سويف',
                'en' => 'Beni Suef',
            ],
            [
                'ar' => 'قنا',
                'en' => 'Qena',
            ],
            [
                'ar' => 'سوهاج',
                'en' => 'Sohag',
            ],
            [
                'ar' => 'الغردقة',
                'en' => 'Hurghada',
            ],
            [
                'ar' => 'السادس من أكتوبر',
                'en' => '6th of October City',
            ],
            [
                'ar' => 'بنها',
                'en' => 'Banha',
            ],
            [
                'ar' => 'كفر الشيخ',
                'en' => 'Kafr el-Sheikh	',
            ],
            [
                'ar' => 'العريش',
                'en' => 'Arish',
            ],
            [
                'ar' => 'العاشر من رمضان',
                'en' => '10th of Ramadan City',
            ],
            [
                'ar' => 'مرسى مطروح',
                'en' => 'Marsa Matruh',
            ],
            [
                'ar' => 'دسوق',
                'en' => 'Desouk',
            ],
        ];

        foreach ($cities as $city) {
            City::create([
                'name' => $city,
                'country_id' => 1,
            ]);
        }
    }
}
