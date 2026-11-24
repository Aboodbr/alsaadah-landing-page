-- Replaces the generic slider text with Al Saadah company text.
-- Images and links are untouched. Run once in phpMyAdmin on the site database.
-- Works on the first 3 slides ordered by id; extra slides are left as they are.
UPDATE sliders SET
  title_ar='شركة السعادة للمنتجات الغذائية',
  title_en='Al Saadah Food Company',
  desc_ar='بدأنا في دمشق منذ عام 1990 وتوسعنا إلى القاهرة منذ 2014، ومنتجاتنا تصل إلى أكثر من 35 دولة حول العالم.',
  desc_en='Started in Damascus in 1990 and expanded to Cairo in 2014. Our products reach over 35 countries worldwide.',
  btn_text_ar='تعرف على قصتنا', btn_text_en='Our Story', btn_link='about.php'
WHERE id = (SELECT id FROM (SELECT id FROM sliders ORDER BY id LIMIT 1 OFFSET 0) t);

UPDATE sliders SET
  title_ar='أكثر من 200 منتج غذائي',
  title_en='Over 200 Food Products',
  desc_ar='معجون الطماطم والصلصات، المربيات الفاخرة، المخللات، الزيتون، الحلاوة والطحينة، المعلبات، البهارات والبقوليات.',
  desc_en='Tomato paste and sauces, premium jams, pickles, olives, halawa and tahini, canned goods, spices and legumes.',
  btn_text_ar='تصفح منتجاتنا', btn_text_en='Browse Products', btn_link='products.php'
WHERE id = (SELECT id FROM (SELECT id FROM sliders ORDER BY id LIMIT 1 OFFSET 1) t);

UPDATE sliders SET
  title_ar='جودة عالية بخبرة دمشقية عريقة',
  title_en='High Quality, Damascene Expertise',
  desc_ar='مصنع في ريف دمشق ومصنع في العاشر من رمضان بمصر، وفق أعلى المواصفات والمقاييس الصحية العالمية.',
  desc_en='A factory in Rural Damascus and one in 10th of Ramadan, Egypt, built to the highest international health standards.',
  btn_text_ar='تواصل معنا', btn_text_en='Contact Us', btn_link='contact.php'
WHERE id = (SELECT id FROM (SELECT id FROM sliders ORDER BY id LIMIT 1 OFFSET 2) t);
