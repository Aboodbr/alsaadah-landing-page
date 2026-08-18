<?php
require_once 'config/database.php';

// مصفوفة الربط (الاسم العربي القديم => الاسم الإنجليزي الجديد بدون مسافات)
$mapping = [
    'أرضي شوكي' => 'artichoke', 'أعشاب مشكلة' => 'mixed_herbs', 'البهارات والتوابل' => 'spices',
    'باذنجان مشوي' => 'grilled_eggplant', 'بامية' => 'okra', 'بقوليات بأنواعها' => 'legumes',
    'ترمس مسلوق' => 'boiled_lupin', 'جيلي بأنواعه' => 'jelly_varieties', 'حلاوة بالمكسرات' => 'halva_nuts',
    'حلاوة طحينية' => 'tahini_halva', 'حلويات عربية' => 'arabic_sweets', 'حمص بالطحينة' => 'hummus_tahini',
    'حمص مسلوق' => 'boiled_hummus', 'خل ابيض' => 'white_vinegar', 'خل التفاح' => 'apple_vinegar',
    'خلطات البهارات' => 'spice_mixes', 'خلطة فلافل' => 'falafel_mix', 'دبس التمر' => 'date_molasses',
    'دبس الرمان' => 'pomegranate_molasses', 'دبس العنب' => 'grape_molasses', 'ذرة حلوة' => 'sweet_corn',
    'زعتر أحمر' => 'red_zaatar', 'زعتر أخضر' => 'green_zaatar', 'زيت زيتون' => 'olive_oil',
    'زيتون أخضر بالزيت' => 'green_olives_oil', 'زيتون أخضر' => 'green_olives', 'زيتون أسود' => 'black_olives',
    'زيتون محشي جزر' => 'olives_carrot', 'زيتون محشي فليفلة' => 'olives_peppers', 'زيتون محشي ليمون' => 'olives_lemon',
    'سلطة زيتون أخضر بالزيت' => 'green_olive_salad', 'صلصة البيتزا' => 'pizza_sauce', 'صلصة اللحوم' => 'meat_sauce',
    'صلصة حارة' => 'hot_sauce', 'صوص الرمان' => 'pomegranate_sauce', 'صوص اللحوم و المشاوي' => 'bbq_sauce',
    'طحينة السمسم' => 'sesame_tahini', 'طرشي العنبة' => 'amba_pickles', 'عرق سوس' => 'licorice',
    'عصائر مركزة' => 'concentrated_juices', 'فليفلة حمراء مطحونة' => 'ground_red_pepper', 'فول مدمس مع حمًص مسلوق' => 'foul_hummus',
    'فول مدمس' => 'foul_mudammas', 'قمر الدين' => 'qamar_aldeen', 'كاتشب الطماطم' => 'tomato_ketchup',
    'كعك شامي' => 'shami_kaak', 'ليمون أسود' => 'black_lemon', 'ليمون أصفر' => 'yellow_lemon',
    'ماء الزهر' => 'orange_blossom_water', 'ماء الورد' => 'rose_water', 'مايونيز' => 'mayonnaise',
    'مخلل خيار' => 'pickled_cucumber', 'مخلل باذنجان' => 'pickled_eggplant', 'متبل الباذنجان' => 'mutabal',
    'مخلل فليفلة' => 'pickled_peppers', 'مخلل قتة' => 'pickled_qatta', 'مخلل لفت' => 'pickled_turnips',
    'مخلل مشكل' => 'mixed_pickles', 'مربى التوت' => 'berry_jam', 'مربى التين' => 'fig_jam',
    'مربى الفراولة' => 'strawberry_jam', 'مربى الكرز' => 'cherry_jam', 'مربى المشمش' => 'apricot_jam',
    'مستردة' => 'mustard', 'مربى الورد' => 'rose_jam', 'معجون الطماطم' => 'tomato_paste',
    'مكدوس شامي بالزيت' => 'makdous', 'ملوخية ناعمة' => 'fine_molokhia', 'ملوخية يابسة' => 'dried_molokhia',
    'نشاء الذرة' => 'corn_starch', 'نعناع مجفف' => 'dried_mint', 'ورق العنب' => 'grape_leaves',
    'ورق عنب محشي بالخلطة الحلبية' => 'grape_leaves_aleppo', 'ورق عنب محشي بالخلطة الشامية' => 'grape_leaves_shami'
];

$dir = 'images/products/';

foreach ($mapping as $ar_name => $en_name) {
    $old_file = $dir . $ar_name . '.jpg';
    $new_file = $dir . $en_name . '.jpg';

    if (file_exists($old_file)) {
        if (rename($old_file, $new_file)) {
            echo "Renamed: $ar_name -> $en_name <br>";
            // تحديث قاعدة البيانات
            $stmt = $pdo->prepare("UPDATE products SET image_path = ? WHERE image_path = ?");
            $stmt->execute([$new_file, $old_file]);
        }
    } else {
        echo "File not found: $old_file <br>";
    }
}
echo "عملية التغيير اكتملت!";
?>