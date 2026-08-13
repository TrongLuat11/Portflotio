/**
 * script.js — JavaScript cho portfolio
 * Bao gồm:
 * 1. Dark mode toggle (lưu vào localStorage)
 * 2. Hiệu ứng scroll fade-in (Intersection Observer)
 * 3. Skill progress bar animation
 * 4. Menu mobile toggle
 * 5. Nút scroll lên đầu trang
 * 6. Active nav link highlight
 * 7. Form submit handler (demo)
 */

// === Đợi DOM load xong ===
document.addEventListener("DOMContentLoaded", function () {
  // ========================================
  // 1. DARK MODE TOGGLE
  // Kiểm tra localStorage hoặc system preference
  // ========================================
  const themeToggle = document.getElementById("theme-toggle");
  const sunIcon = document.getElementById("sun-icon");
  const moonIcon = document.getElementById("moon-icon");
  const html = document.documentElement;

  // Hàm cập nhật icon theo theme
  function updateThemeIcons(isDark) {
    if (isDark) {
      sunIcon.classList.remove("hidden");
      moonIcon.classList.add("hidden");
    } else {
      sunIcon.classList.add("hidden");
      moonIcon.classList.remove("hidden");
    }
  }

  // Kiểm tra theme đã lưu trong localStorage
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme === "dark") {
    html.classList.add("dark");
    updateThemeIcons(true);
  } else if (savedTheme === "light") {
    html.classList.remove("dark");
    updateThemeIcons(false);
  } else {
    // Nếu chưa lưu, dùng system preference
    const prefersDark = window.matchMedia(
      "(prefers-color-scheme: dark)"
    ).matches;
    if (prefersDark) {
      html.classList.add("dark");
      updateThemeIcons(true);
    }
  }

  // Sự kiện click toggle dark mode
  if (themeToggle) {
    themeToggle.addEventListener("click", function () {
      const isDark = html.classList.toggle("dark");
      localStorage.setItem("theme", isDark ? "dark" : "light");
      updateThemeIcons(isDark);
    });
  }

  // ========================================
  // 2. HIỆU ỨNG SCROLL FADE-IN
  // Dùng Intersection Observer API — hiệu năng tốt hơn scroll event
  // ========================================
  const fadeElements = document.querySelectorAll(".fade-in");

  const fadeObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          // Thêm delay nếu có animation-delay
          const delay = entry.target.style.animationDelay || "0ms";
          const delayMs = parseInt(delay);

          setTimeout(function () {
            entry.target.classList.add("visible");
          }, delayMs);

          // Ngừng theo dõi sau khi đã hiện (chỉ chạy 1 lần)
          fadeObserver.unobserve(entry.target);
        }
      });
    },
    {
      // Kích hoạt khi phần tử hiện 15% trong viewport
      threshold: 0.15,
      // Bắt đầu load sớm hơn 50px
      rootMargin: "0px 0px -50px 0px",
    }
  );

  fadeElements.forEach(function (el) {
    fadeObserver.observe(el);
  });

  // ========================================
  // 3. SKILL PROGRESS BAR ANIMATION
  // Animate thanh progress khi scroll đến
  // ========================================
  const skillBars = document.querySelectorAll(".skill-progress");

  const skillObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          const level = entry.target.getAttribute("data-level");
          // Đặt timeout nhỏ để animation mượt hơn
          setTimeout(function () {
            entry.target.style.width = level + "%";
          }, 300);
          skillObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.5 }
  );

  skillBars.forEach(function (bar) {
    skillObserver.observe(bar);
  });

  // ========================================
  // 4. MENU MOBILE TOGGLE
  // Hiện/ẩn menu trên mobile
  // ========================================
  const mobileMenuBtn = document.getElementById("mobile-menu-btn");
  const mobileMenu = document.getElementById("mobile-menu");
  const hamburgerIcon = document.getElementById("hamburger-icon");
  const closeIcon = document.getElementById("close-icon");

  if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener("click", function () {
      mobileMenu.classList.toggle("hidden");
      hamburgerIcon.classList.toggle("hidden");
      closeIcon.classList.toggle("hidden");
    });

    // Đóng menu khi click vào link
    const mobileLinks = mobileMenu.querySelectorAll("a");
    mobileLinks.forEach(function (link) {
      link.addEventListener("click", function () {
        mobileMenu.classList.add("hidden");
        hamburgerIcon.classList.remove("hidden");
        closeIcon.classList.add("hidden");
      });
    });
  }

  // ========================================
  // 5. NÚT SCROLL LÊN ĐẦU TRANG
  // Hiện khi cuộn xuống quá 300px
  // ========================================
  const scrollTopBtn = document.getElementById("scroll-top-btn");

  if (scrollTopBtn) {
    window.addEventListener("scroll", function () {
      if (window.scrollY > 300) {
        scrollTopBtn.classList.remove("opacity-0", "invisible", "translate-y-4");
        scrollTopBtn.classList.add("opacity-100", "visible", "translate-y-0");
      } else {
        scrollTopBtn.classList.add("opacity-0", "invisible", "translate-y-4");
        scrollTopBtn.classList.remove("opacity-100", "visible", "translate-y-0");
      }
    });

    scrollTopBtn.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  // ========================================
  // 6. ACTIVE NAV LINK HIGHLIGHT
  // Tô sáng link nav tương ứng section đang xem
  // ========================================
  const sections = document.querySelectorAll("section[id]");
  const navLinks = document.querySelectorAll(".nav-link");

  const sectionObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          const id = entry.target.getAttribute("id");
          navLinks.forEach(function (link) {
            link.classList.remove("active", "text-accent", "dark:text-accent-light");
            if (link.getAttribute("href") === "#" + id) {
              link.classList.add("active", "text-accent", "dark:text-accent-light");
            }
          });
        }
      });
    },
    {
      threshold: 0.3,
      rootMargin: "-80px 0px -50% 0px",
    }
  );

  sections.forEach(function (section) {
    sectionObserver.observe(section);
  });

  // ========================================
  // 7. NAVBAR SHADOW KHI SCROLL
  // Thêm shadow khi user cuộn xuống
  // ========================================
  const navbar = document.getElementById("navbar");

  if (navbar) {
    window.addEventListener("scroll", function () {
      if (window.scrollY > 10) {
        navbar.classList.add("shadow-lg", "shadow-black/5");
      } else {
        navbar.classList.remove("shadow-lg", "shadow-black/5");
      }
    });
  }

  // ========================================
  // 8. FORM SUBMIT HANDLER (DEMO)
  // Chỉ hiển thị thông báo, không gửi thật
  // ========================================
  const contactForm = document.getElementById("contact-form");

  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault();

      // Lấy nút submit
      const submitBtn = contactForm.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;

      // Hiệu ứng loading
      submitBtn.innerHTML =
        '<svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Đang gửi...';
      submitBtn.disabled = true;

      // Giả lập gửi thành công sau 1.5 giây
      setTimeout(function () {
        submitBtn.innerHTML =
          '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Đã gửi thành công!';
        submitBtn.classList.remove("bg-accent", "hover:bg-accent-dark");
        submitBtn.classList.add("bg-green-500");

        // Reset sau 3 giây
        setTimeout(function () {
          submitBtn.innerHTML = originalText;
          submitBtn.disabled = false;
          submitBtn.classList.remove("bg-green-500");
          submitBtn.classList.add("bg-accent", "hover:bg-accent-dark");
          contactForm.reset();
        }, 3000);
      }, 1500);
    });
  }
});
