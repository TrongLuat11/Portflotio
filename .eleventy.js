/**
 * Cấu hình Eleventy (11ty)
 * - Input: thư mục src/
 * - Output: thư mục _site/ (build ra đây để deploy)
 * - Copy nguyên các thư mục css, js, images sang output
 * - Sử dụng Nunjucks làm template engine chính
 */
module.exports = function (eleventyConfig) {
  // === Copy tài nguyên tĩnh (CSS, JS, hình ảnh) sang thư mục output ===
  eleventyConfig.addPassthroughCopy("src/css");
  eleventyConfig.addPassthroughCopy("src/js");
  eleventyConfig.addPassthroughCopy("src/images");

  // === Theo dõi thay đổi file CSS/JS để tự reload khi dev ===
  eleventyConfig.addWatchTarget("src/css/");
  eleventyConfig.addWatchTarget("src/js/");

  // === Cấu hình thư mục input/output và template engine ===
  return {
    // Bỏ pathPrefix ở đây để dev local (localhost:8080/) không bị lỗi đường dẫn
    // Sẽ cấu hình pathPrefix trong file GitHub Actions (deploy.yml)
    dir: {
      input: "src",          // Thư mục chứa source (giống resources/views trong Laravel)
      output: "_site",       // Thư mục build ra (giống public/ trong Laravel)
      includes: "_includes", // Thư mục chứa layout & component (giống layouts + partials)
      data: "_data",         // Thư mục chứa dữ liệu JSON (giống data từ Controller)
    },
    // Sử dụng Nunjucks cho cả HTML và Nunjucks files
    templateFormats: ["njk", "html", "md"],
    htmlTemplateEngine: "njk",
    markdownTemplateEngine: "njk",
  };
};
