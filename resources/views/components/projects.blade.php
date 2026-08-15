{{-- 
  Component Projects Section
  Hiển thị danh sách dự án dạng grid
  Loop qua projects.json bằng Nunjucks {% for %}
  Mỗi dự án dùng component project-card.njk
--}}
<section id="projects" class="py-20 bg-gray-50/50 dark:bg-navy-900/30">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    
    {{-- === Tiêu đề Section === --}}
    <div class="text-center mb-16 fade-in">
      <p class="text-accent dark:text-accent-light font-mono text-sm tracking-wider uppercase mb-2">Dự án</p>
      <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white">
        Dự án nổi bật
      </h2>
      <div class="w-20 h-1 bg-gradient-to-r from-accent to-navy-500 mx-auto mt-4 rounded-full"></div>
      <p class="text-gray-600 dark:text-gray-400 mt-4 max-w-lg mx-auto">
        Một số dự án phân tích dữ liệu tiêu biểu tôi đã thực hiện
      </p>
    </div>
    
    {{-- === Grid dự án === --}}
    <div class="grid md:grid-cols-2 gap-8">
      @foreach($projects as $project)
        <div class="fade-in" style="animation-delay: {{ $loop->index * 150 }}ms;">
          @include('components.project-card')
        </div>
      @endforeach
    </div>
  </div>
</section>
