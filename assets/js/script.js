/* ==========================================
   FRONT WEBSITE
   Main JavaScript
   Arabic / English
   Gallery + 3D + Lightbox
   ========================================== */

const translations = {
  en: {
    nav_home: "Home",
    nav_products: "Products",
    nav_about: "About Us",
    nav_gallery: "Gallery",
    nav_contact: "Contact Us",

    footer_desc:
      "A leading company in the food industry, committed to providing the highest global quality standards to our customers worldwide.",

    footer_links: "Quick Links",

    btn_details: "View Details",
    btn_explore: "Explore Products",
    btn_learn: "Learn More",

    filter_all: "All",

    /* Hero */
    hero_title_1: "Exceptional Quality, Authentic Taste",
    hero_desc_1:
      "Bringing you the finest food products manufactured with the highest global standards.",

    hero_title_2: "From Nature's Bounty to You",
    hero_desc_2:
      "We select the finest crops to ensure an unforgettable taste and a unique experience.",

    hero_title_3: "Heritage of the Past, Evolution of the Present",
    hero_desc_3:
      "Generations of expertise in premium food manufacturing placed in your hands.",

    hero_title_4: "Trust that Crosses Borders",
    hero_desc_4:
      "We export our products to the largest global markets, delivering authentic taste wherever you are.",

    /* Categories */
    cat_title: "Our Product Categories",
    cat_desc: "A wide range of premium food products that meet all your needs",

    cat_molasses: "Molasses & Sauces",
    cat_oil_preserved: "Oil-Preserved Products",
    cat_tomato_sauces: "Tomato Paste & Sauces",
    cat_liquids_juices: "Liquids & Juices",
    cat_canned: "Premium Canned Foods",
    cat_jams: "Premium Jams",
    cat_halawa_tahini: "Halawa & Tahini",
    cat_spices_legumes: "Spices & Legumes",
    cat_olives: "Olives",
    cat_pickles: "Pickles",
    cat_dried_products: "Dried Products",
    cat_misc_products: "Miscellaneous Products",

    /* About */
    about_badge: "Years of Excellence",
    about_title: "About Us",
    about_subtitle: "Crafting Quality, Delivering the Best",

    about_text1:
      "Al Saadah is a pioneer in the manufacturing and export of premium food products. We are committed to selecting the finest natural ingredients to offer consumers products that combine authentic taste with high nutritional value.",

    about_text2:
      "Our factories rely on the latest global technologies and strict food safety standards to ensure our products reach your table with the highest possible quality.",

    btn_about: "Read More About Us",

    about_page_title: "Al Saadah Food Products Company",
    about_page_subtitle: "A Taste of Heritage",

    story_title: "Trusted Across Generations",

    story_p1:
      "Trusted across generations for its high quality, Al Saadah® brings to mind unforgettable family meal times and delicious home recipes.",

    expansion_title: "From the Heart of Damascus Ghouta to the World",

    expansion_p1:
      "The abundance and quality of food from our blessed Levantine land, combined with our ancestors' expertise, created the foundation of our company.",

    expansion_p2:
      "Challenges drove us to continue working in our homeland while expanding across the Middle East.",

    mission_title: "Our Mission",

    mission_desc:
      "Perseverance to reach a healthy and delicious food product with the taste and quality our crops are known for.",

    goals_title: "Our Goals",

    goal_1: '"Your health is a trust in our necks"',
    goal_2: '"Your satisfaction is what we strive for"',
    goal_3: '"Your trust is our success"',

    full_products_title: "Our Product List",

    full_products_desc:
      "We now offer a complete range of products that complement our consumers' needs.",

    /* Products */
    products_page_title: "Our Products",

    products_page_desc:
      "Discover our wide range of premium food products carefully crafted to suit your taste.",

    tbl_weight: "Weight",
    tbl_pack: "Packaging",
    tbl_qty: "Packing",
    tbl_gross: "Gross Wt.",

    /* Gallery */
    gallery_title: "Image Gallery",

    gallery_desc:
      "A visual journey through our premium products and precise manufacturing processes.",

    gal_products: "Products",
    gal_packaging: "Packaging",
    gal_ingredients: "Fresh Ingredients",

    /* Contact */
    contact_page_title: "Contact Us",

    contact_page_desc:
      "We are here to answer your inquiries and meet your requests.",

    contact_info_title: "Contact Information",

    contact_info_desc:
      "We are happy to hear from you through the following channels or by visiting our headquarters.",

    lbl_address: "Address",
    val_address: "Industrial Zone, 10th of Ramadan City, Egypt",

    lbl_phone: "Phone Number",
    lbl_email: "Email Address",

    form_title: "Send Us a Message",

    lbl_name: "Full Name",
    lbl_email_input: "Email",
    lbl_phone_input: "Phone",
    lbl_subject: "Subject",
    lbl_message: "Message",

    btn_send: "Send Message",

    msg_success: "Thank you! Your message has been sent successfully.",
  },

  ar: {
    nav_home: "الرئيسية",
    nav_products: "المنتجات",
    nav_about: "من نحن",
    nav_gallery: "المعرض",
    nav_contact: "اتصل بنا",

    footer_desc:
      "شركة رائدة في مجال الصناعات الغذائية، نلتزم بتقديم أعلى معايير الجودة العالمية لعملائنا في جميع أنحاء العالم.",

    footer_links: "روابط سريعة",

    btn_details: "عرض التفاصيل",
    btn_explore: "اكتشف منتجاتنا",
    btn_learn: "اعرف المزيد",

    filter_all: "الكل",

    /* Hero */
    hero_title_1: "جودة استثنائية، مذاق أصيل",

    hero_desc_1:
      "نقدم لك أفضل المنتجات الغذائية المصنعة بأعلى معايير الجودة العالمية.",

    hero_title_2: "من خيرات الطبيعة إليك",

    hero_desc_2: "نختار أجود المحاصيل لنضمن لك طعماً لا ينسى وتجربة فريدة.",

    hero_title_3: "عراقة الماضي وتطور الحاضر",

    hero_desc_3: "خبرة تمتد لأجيال في صناعة الغذاء الفاخر نضعها بين يديك.",

    hero_title_4: "ثقة تتخطى الحدود",

    hero_desc_4:
      "نصدر منتجاتنا لأكبر الأسواق العالمية لننقل الطعم الأصيل أينما كنت.",

    /* Categories */
    cat_title: "أقسام منتجاتنا",

    cat_desc:
      "مجموعة واسعة من المنتجات الغذائية الفاخرة التي تلبي كافة احتياجاتك",

    cat_molasses: "دبس وصوص",
    cat_oil_preserved: "محفوظات بالزيت",
    cat_tomato_sauces: "معجون الطماطم والصلصات",
    cat_liquids_juices: "سوائل وعصائر",
    cat_canned: "معلبات فاخرة",
    cat_jams: "مربيات فاخرة",
    cat_halawa_tahini: "حلاوة وطحينة",
    cat_spices_legumes: "بهارات وبقوليات",
    cat_olives: "الزيتون",
    cat_pickles: "المخللات",
    cat_dried_products: "منتجات مجففة",
    cat_misc_products: "منتجات منوعة",

    /* About */
    about_badge: "عاما من التميز",

    about_title: "من نحن",

    about_subtitle: "نصنع الجودة، ونقدم الأفضل",

    about_text1:
      "شركة السعادة هي رائدة في صناعة وتصدير المنتجات الغذائية الفاخرة. نلتزم باختيار أجود المكونات الطبيعية لنقدم للمستهلك منتجات تجمع بين المذاق الأصيل والقيمة الغذائية العالية.",

    about_text2:
      "نعتمد في مصانعنا على أحدث التقنيات العالمية ومعايير السلامة الغذائية الصارمة لضمان وصول منتجاتنا إلى مائدتك بأعلى جودة ممكنة.",

    btn_about: "اقرأ المزيد عنا",

    about_page_title: "شركة السعادة للمنتجات الغذائية",

    about_page_subtitle: "مذاق من التراث",

    story_title: "موثوقة عبر الأجيال",

    story_p1:
      "موثوقة عبر الأجيال لجودتها العالية، السعادة® تجلب إلى الذهن أوقات الوجبات العائلية التي لا تنسى والوصفات المنزلية الشهية.",

    expansion_title: "من قلب الغوطة الدمشقية إلى العالم",

    expansion_p1:
      "وفرة وجودة المواد الغذائية التي تذخر بها أرضنا الشامية المباركة وخبرة أجدادنا في صناعة المنتجات الغذائية كانت انطلاقة لشركتنا.",

    expansion_p2:
      "التحديات دفعتنا للاستمرار في العمل في وطننا مع ضرورة التوسع في الشرق الأوسط.",

    mission_title: "المهمة",

    mission_desc:
      "المثابرة للوصول لمنتج غذائي صحي وشهي بالطعم والجودة التي تتميز بها محاصيلنا والخبرة الصناعية التي ورثناها عن أجدادنا.",

    goals_title: "الأهداف",

    goal_1: '"صحتكم أمانة في أعناقنا"',
    goal_2: '"رضاكم ما نسعى إليه"',
    goal_3: '"وثقتكم نجاحنا"',

    full_products_title: "قائمة منتجاتنا",

    full_products_desc:
      "الآن نقدم مجموعة متكاملة من المنتجات تكمل احتياجات المستهلك لدينا وسنستمر في تطوير منتجات جديدة.",

    /* Products */
    products_page_title: "منتجاتنا",

    products_page_desc:
      "اكتشف مجموعتنا الواسعة من المنتجات الغذائية الفاخرة المصنوعة بعناية لتناسب ذوقك.",

    tbl_weight: "الوزن",
    tbl_pack: "العبوة",
    tbl_qty: "التعبئة",
    tbl_gross: "القائم",

    /* Gallery */
    gallery_title: "معرض الصور",

    gallery_desc: "رحلة بصرية عبر منتجاتنا الفاخرة وعمليات التصنيع الدقيقة.",

    gal_products: "المنتجات",
    gal_packaging: "التعبئة والتغليف",
    gal_ingredients: "المكونات الطازجة",

    /* Contact */
    contact_page_title: "تواصل معنا",

    contact_page_desc: "نحن هنا للإجابة على استفساراتكم وتلبية طلباتكم.",

    contact_info_title: "معلومات التواصل",

    contact_info_desc:
      "يسعدنا تواصلكم معنا عبر القنوات التالية أو من خلال زيارة مقرنا الرئيسي.",

    lbl_address: "العنوان",

    val_address: "المنطقة الصناعية، مدينة العاشر من رمضان، مصر",

    lbl_phone: "رقم الهاتف",
    lbl_email: "البريد الإلكتروني",

    form_title: "أرسل لنا رسالة",

    lbl_name: "الاسم الكامل",
    lbl_email_input: "البريد الإلكتروني",
    lbl_phone_input: "رقم الهاتف",
    lbl_subject: "الموضوع",
    lbl_message: "الرسالة",

    btn_send: "إرسال الرسالة",

    msg_success: "شكراً لك! تم إرسال رسالتك بنجاح.",
  },
};

/* ==========================================
   MAIN INITIALIZATION
   ========================================== */

document.addEventListener("DOMContentLoaded", () => {
  let currentLang = document.documentElement.getAttribute("lang") || "ar";

  /* ------------------------------------------
     Language Switcher
     ------------------------------------------ */

  function initLanguageSwitcher() {
    const langSwitcher = document.getElementById("langSwitcher");

    if (!langSwitcher) return;

    langSwitcher.addEventListener("click", () => {
      currentLang = currentLang === "ar" ? "en" : "ar";

      document.documentElement.setAttribute("lang", currentLang);

      document.documentElement.setAttribute(
        "dir",
        currentLang === "ar" ? "rtl" : "ltr",
      );

      langSwitcher.textContent = currentLang === "ar" ? "English" : "العربية";

      updateTranslations();
    });
  }

  function updateTranslations() {
    document.querySelectorAll("[data-i18n]").forEach((element) => {
      const key = element.getAttribute("data-i18n");

      if (translations[currentLang] && translations[currentLang][key]) {
        element.textContent = translations[currentLang][key];
      }
    });
  }

  /* ==========================================
     HERO SLIDER
     ========================================== */

  function initHeroSlider() {
    const slides = document.querySelectorAll(".slide");

    const dots = document.querySelectorAll(".dot");

    const prevBtn = document.getElementById("prevSlide");

    const nextBtn = document.getElementById("nextSlide");

    if (!slides.length) return;

    let currentSlide = 0;

    let slideInterval;

    const intervalTime = 5000;

    function goToSlide(index) {
      slides[currentSlide].classList.remove("active");

      if (dots.length) {
        dots[currentSlide].classList.remove("active");
      }

      currentSlide = index;

      if (currentSlide >= slides.length) {
        currentSlide = 0;
      }

      if (currentSlide < 0) {
        currentSlide = slides.length - 1;
      }

      slides[currentSlide].classList.add("active");

      if (dots.length) {
        dots[currentSlide].classList.add("active");
      }
    }

    function nextSlide() {
      goToSlide(currentSlide + 1);
    }

    function previousSlide() {
      goToSlide(currentSlide - 1);
    }

    function startInterval() {
      slideInterval = setInterval(nextSlide, intervalTime);
    }

    function resetInterval() {
      clearInterval(slideInterval);
      startInterval();
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", () => {
        nextSlide();
        resetInterval();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener("click", () => {
        previousSlide();
        resetInterval();
      });
    }

    dots.forEach((dot, index) => {
      dot.addEventListener("click", () => {
        goToSlide(index);
        resetInterval();
      });
    });

    startInterval();
  }

  /* ==========================================
     PRODUCTS FILTER
     ========================================== */

  function initProductsFilter() {
    const filterBtns = document.querySelectorAll(
      ".products-filter:not(.gallery-filter) .filter-btn",
    );

    const productCards = document.querySelectorAll(".product-card");

    if (!filterBtns.length) return;

    filterBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        filterBtns.forEach((button) => {
          button.classList.remove("active");
        });

        btn.classList.add("active");

        const filterValue = btn.getAttribute("data-filter");

        productCards.forEach((card) => {
          const category = card.getAttribute("data-category");

          if (filterValue === "all" || category === filterValue) {
            card.style.display = "block";

            requestAnimationFrame(() => {
              card.style.opacity = "1";
              card.style.transform = "translateY(0)";
            });
          } else {
            card.style.opacity = "0";

            card.style.transform = "translateY(10px)";

            setTimeout(() => {
              card.style.display = "none";
            }, 300);
          }
        });
      });
    });

    /* URL Category */

    const params = new URLSearchParams(window.location.search);

    const categoryParam = params.get("category");

    if (categoryParam) {
      const targetBtn = document.querySelector(
        `.products-filter:not(.gallery-filter) .filter-btn[data-filter="${categoryParam}"]`,
      );

      if (targetBtn) {
        targetBtn.click();
      }
    }
  }

  /* ==========================================
     PRODUCT DETAILS MODAL
     ========================================== */

  function initProductModal() {
    const productModal = document.getElementById("productModal");

    const closeBtn = document.querySelector(".close-product-modal");

    const detailButtons = document.querySelectorAll(".view-details-btn");

    if (!productModal || !detailButtons.length) {
      return;
    }

    function closeModal() {
      productModal.style.display = "none";

      document.body.style.overflow = "auto";
    }

    detailButtons.forEach((btn) => {
      btn.addEventListener("click", (event) => {
        const card = event.target.closest(".product-card");

        if (!card) return;

        const image = card.querySelector("img");

        const category = card.querySelector(".category-tag");

        const title = card.querySelector("h4");

        const details = card.querySelector(".product-details-data");

        const modalImage = document.getElementById("modalProductImg");

        const modalCategory = document.getElementById("modalProductCategory");

        const modalTitle = document.getElementById("modalProductTitle");

        const modalDetails = document.getElementById("modalProductDetails");

        if (modalImage && image) {
          modalImage.src = image.src;
        }

        if (modalCategory && category) {
          modalCategory.innerHTML = category.innerHTML;
        }

        if (modalTitle && title) {
          modalTitle.innerHTML = title.innerHTML;
        }

        if (modalDetails && details) {
          modalDetails.innerHTML = details.innerHTML;
        }

        productModal.style.display = "block";

        document.body.style.overflow = "hidden";
      });
    });

    if (closeBtn) {
      closeBtn.addEventListener("click", closeModal);
    }

    productModal.addEventListener("click", (event) => {
      if (event.target === productModal) {
        closeModal();
      }
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape" && productModal.style.display === "block") {
        closeModal();
      }
    });
  }

  /* ==========================================
     PREMIUM MASONRY GALLERY
     ========================================== */

  function initGallery() {
    const galleryWrapper = document.getElementById("galleryWrapper");

    if (!galleryWrapper) return;

    const items = Array.from(galleryWrapper.querySelectorAll(".masonry-item"));

    const filterBtns = document.querySelectorAll(".gallery-filter .filter-btn");

    const lightbox = document.getElementById("lightbox");

    const lightboxImg = document.getElementById("lightbox-img");

    const lightboxCaption = document.getElementById("lightbox-caption");

    const closeBtn = document.querySelector(".lightbox-close");

    if (!items.length) return;

    let currentLightboxIndex = -1;

    /* ------------------------------------------
       3D Tilt
       ------------------------------------------ */

    const enableTilt = window.matchMedia(
      "(hover: hover) and (pointer: fine)",
    ).matches;

    if (enableTilt) {
      items.forEach((item) => {
        item.addEventListener("mousemove", (event) => {
          const rect = item.getBoundingClientRect();

          const x = event.clientX - rect.left;

          const y = event.clientY - rect.top;

          const centerX = rect.width / 2;

          const centerY = rect.height / 2;

          const rotateX = ((y - centerY) / centerY) * -3;

          const rotateY = ((x - centerX) / centerX) * 3;

          item.style.transform = `perspective(900px)
               rotateX(${rotateX}deg)
               rotateY(${rotateY}deg)
               translateY(-4px)
               scale(1.015)`;
        });

        item.addEventListener("mouseleave", () => {
          item.style.transform =
            "perspective(900px) rotateX(0deg) rotateY(0deg) translateY(0) scale(1)";
        });
      });
    }

    /* ------------------------------------------
       Filtering
       ------------------------------------------ */

    filterBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        filterBtns.forEach((button) => {
          button.classList.remove("active");
        });

        btn.classList.add("active");

        const filter = btn.getAttribute("data-filter");

        items.forEach((item) => {
          const category = item.getAttribute("data-category");

          const shouldShow = filter === "all" || category === filter;

          if (shouldShow) {
            item.style.display = "inline-block";

            requestAnimationFrame(() => {
              item.style.opacity = "1";

              item.style.transform = "translateY(0) scale(1)";
            });
          } else {
            item.style.opacity = "0";

            item.style.transform = "translateY(15px) scale(.94)";

            setTimeout(() => {
              item.style.display = "none";
            }, 400);
          }
        });
      });
    });

    /* ------------------------------------------
       Get Visible Items
       ------------------------------------------ */

    function getVisibleItems() {
      return items.filter((item) => item.style.display !== "none");
    }

    /* ------------------------------------------
       Open Lightbox
       ------------------------------------------ */

    function openLightbox(item) {
      if (!lightbox || !lightboxImg) {
        return;
      }

      const visibleItems = getVisibleItems();

      currentLightboxIndex = visibleItems.indexOf(item);

      const image = item.querySelector("img");

      const title = item.querySelector(".masonry-title");

      if (!image) return;

      lightboxImg.src = image.src;

      lightboxImg.alt = image.alt || "";

      if (lightboxCaption) {
        lightboxCaption.innerHTML = title ? title.innerHTML : "";
      }

      lightbox.style.display = "flex";

      requestAnimationFrame(() => {
        lightbox.style.opacity = "1";
      });

      document.body.style.overflow = "hidden";
    }

    /* ------------------------------------------
       Close Lightbox
       ------------------------------------------ */

    function closeLightbox() {
      if (!lightbox) return;

      lightbox.style.opacity = "0";

      setTimeout(() => {
        lightbox.style.display = "none";

        document.body.style.overflow = "auto";
      }, 300);
    }

    /* ------------------------------------------
       Navigate Lightbox
       ------------------------------------------ */

    function navigateLightbox(direction) {
      const visibleItems = getVisibleItems();

      if (!visibleItems.length) {
        return;
      }

      currentLightboxIndex += direction;

      if (currentLightboxIndex < 0) {
        currentLightboxIndex = visibleItems.length - 1;
      }

      if (currentLightboxIndex >= visibleItems.length) {
        currentLightboxIndex = 0;
      }

      openLightbox(visibleItems[currentLightboxIndex]);
    }

    /* ------------------------------------------
       Item Click
       ------------------------------------------ */

    items.forEach((item) => {
      item.addEventListener("click", () => {
        openLightbox(item);
      });
    });

    /* ------------------------------------------
       Close
       ------------------------------------------ */

    if (closeBtn) {
      closeBtn.addEventListener("click", (event) => {
        event.stopPropagation();

        closeLightbox();
      });
    }

    if (lightbox) {
      lightbox.addEventListener("click", (event) => {
        if (event.target === lightbox) {
          closeLightbox();
        }
      });
    }

    /* ------------------------------------------
       Keyboard
       ------------------------------------------ */

    document.addEventListener("keydown", (event) => {
      if (!lightbox || lightbox.style.display !== "flex") {
        return;
      }

      switch (event.key) {
        case "Escape":
          closeLightbox();
          break;

        case "ArrowRight":
          if (document.documentElement.dir === "rtl") {
            navigateLightbox(-1);
          } else {
            navigateLightbox(1);
          }

          break;

        case "ArrowLeft":
          if (document.documentElement.dir === "rtl") {
            navigateLightbox(1);
          } else {
            navigateLightbox(-1);
          }

          break;
      }
    });

    /* ------------------------------------------
       Touch Swipe
       ------------------------------------------ */

    let touchStartX = 0;

    if (lightbox) {
      lightbox.addEventListener(
        "touchstart",
        (event) => {
          touchStartX = event.changedTouches[0].screenX;
        },
        {
          passive: true,
        },
      );

      lightbox.addEventListener(
        "touchend",
        (event) => {
          const touchEndX = event.changedTouches[0].screenX;

          const difference = touchEndX - touchStartX;

          if (Math.abs(difference) < 50) {
            return;
          }

          if (difference < 0) {
            navigateLightbox(1);
          } else {
            navigateLightbox(-1);
          }
        },
        {
          passive: true,
        },
      );
    }
  }

  /* ==========================================
     CONTACT FORM
     ========================================== */

  function initContactForm() {
    const contactForm = document.getElementById("contactForm");

    const formMessage = document.getElementById("formMessage");

    if (!contactForm || !formMessage) {
      return;
    }

    contactForm.addEventListener("submit", async (event) => {
      event.preventDefault();

      const formData = new FormData(contactForm);

      const submitButton = contactForm.querySelector(
        'button[type="submit"], input[type="submit"]',
      );

      if (submitButton) {
        submitButton.disabled = true;
      }

      try {
        const response = await fetch("api/submit_contact.php", {
          method: "POST",
          body: formData,
        });

        if (!response.ok) {
          throw new Error(`HTTP Error: ${response.status}`);
        }

        const data = await response.json();

        if (data.status === "success") {
          formMessage.textContent =
            translations[currentLang]?.msg_success ||
            "Thank you! Your message has been sent successfully.";

          formMessage.classList.remove("hidden", "error");

          formMessage.classList.add("success");

          contactForm.reset();
        } else {
          formMessage.textContent =
            data.message ||
            (currentLang === "ar"
              ? "حدث خطأ أثناء إرسال الرسالة."
              : "Error sending message.");

          formMessage.classList.remove("hidden", "success");

          formMessage.classList.add("error");
        }

        setTimeout(() => {
          formMessage.classList.add("hidden");

          formMessage.classList.remove("success", "error");
        }, 5000);
      } catch (error) {
        console.error("Contact form error:", error);

        formMessage.textContent =
          currentLang === "ar"
            ? "حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى."
            : "An error occurred while sending the message. Please try again.";

        formMessage.classList.remove("hidden", "success");

        formMessage.classList.add("error");
      } finally {
        if (submitButton) {
          submitButton.disabled = false;
        }
      }
    });
  }

  /* ==========================================
     START EVERYTHING
     ========================================== */

  initLanguageSwitcher();

  initHeroSlider();

  initProductsFilter();

  initProductModal();

  initGallery();

  initContactForm();
});

/* ==========================================
   PRELOADER
   ========================================== */

window.addEventListener("load", () => {
  const preloader = document.getElementById("preloader");

  if (!preloader) return;

  preloader.style.opacity = "0";

  setTimeout(() => {
    preloader.style.display = "none";
  }, 500);
});
// تشغيل قائمة الجوال
document.addEventListener("DOMContentLoaded", () => {
  const mobileMenuBtn = document.getElementById("mobileMenuBtn");
  const navLinks = document.querySelector(".nav-links");

  if (mobileMenuBtn && navLinks) {
    mobileMenuBtn.addEventListener("click", () => {
      navLinks.classList.toggle("active");

      // تغيير شكل الأيقونة بين (القائمة) و (X)
      if (navLinks.classList.contains("active")) {
        mobileMenuBtn.innerHTML =
          '<svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>';
      } else {
        mobileMenuBtn.innerHTML =
          '<svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
      }
    });
  }
});
