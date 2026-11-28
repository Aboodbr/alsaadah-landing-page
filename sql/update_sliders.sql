-- Replaces the slider text with the approved Al Saadah copy (4 slides).
-- Images are untouched. Slide 4 keeps its existing button.
-- Run once in phpMyAdmin on the site database.
-- Works on the first 4 slides ordered by id.
UPDATE sliders SET
  title_ar='من دمشق إلى موائد العالم',
  title_en='From Damascus to Tables Around the World',
  desc_ar='بدأت حكايتنا في دمشق عام 1990، وفي 2014 افتتحنا مقرنا في القاهرة لنقرّب نكهاتنا من أسواق جديدة.',
  desc_en='Our story began in Damascus in 1990. In 2014 we opened our Cairo base to bring our flavors closer to new markets.',
  btn_text_ar='تعرف على قصتنا', btn_text_en='Our Story', btn_link='about.php'
WHERE id = (SELECT id FROM (SELECT id FROM sliders ORDER BY id LIMIT 1 OFFSET 0) t);

UPDATE sliders SET
  title_ar='أكثر من 200 منتج، سفرة كاملة',
  title_en='Over 200 Products, a Full Table',
  desc_ar='معجون الطماطم والصلصات، المربيات الفاخرة، الزيتون والمخللات، الدبس والطحينة والحلاوة، المعلبات والبقوليات والبهارات.',
  desc_en='Tomato paste and sauces, premium jams, olives and pickles, molasses, tahini and halawa, canned goods, legumes and spices.',
  btn_text_ar='تصفح منتجاتنا', btn_text_en='Browse Products', btn_link='products.php'
WHERE id = (SELECT id FROM (SELECT id FROM sliders ORDER BY id LIMIT 1 OFFSET 1) t);

UPDATE sliders SET
  title_ar='مصنعان، بلدان، معيار واحد',
  title_en='Two Factories, Two Countries, One Standard',
  desc_ar='نصنّع منتجاتنا في مصنعين، أحدهما في سوريا والآخر في مصر، ونطبّق في كليهما معايير جودة صارمة تبدأ من اختيار المكوّنات وتنتهي بالتعبئة والتغليف. وبفضل هذا الانتشار الإنتاجي نلبّي طلبات أسواقنا بسرعة، وتصل إليك كل عبوة بنفس الطعم الأصيل أينما كنت.',
  desc_en='We make our products in two factories, one in Syria and one in Egypt, and apply strict quality standards in both, from choosing the ingredients to packaging. This production reach lets us serve our markets quickly, so every pack reaches you with the same authentic taste wherever you are.',
  btn_text_ar='تواصل معنا', btn_text_en='Contact Us', btn_link='contact.php'
WHERE id = (SELECT id FROM (SELECT id FROM sliders ORDER BY id LIMIT 1 OFFSET 2) t);

UPDATE sliders SET
  title_ar='في أكثر من 35 دولة',
  title_en='In More Than 35 Countries',
  desc_ar='من الدول العربية إلى أوروبا وآسيا، يصل اسم السعادة إلى موائد العائلات والجاليات في أكثر من 35 دولة، ونواصل توسيع حضورنا في الأسواق العالمية كل عام.',
  desc_en='From the Arab countries to Europe and Asia, the Al Saadah name reaches the tables of families and communities in more than 35 countries, and we keep expanding our presence in global markets every year.'
WHERE id = (SELECT id FROM (SELECT id FROM sliders ORDER BY id LIMIT 1 OFFSET 3) t);
