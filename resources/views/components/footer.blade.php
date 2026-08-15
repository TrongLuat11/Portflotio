{{-- 
  Component Footer
  Phần chân trang bao gồm:
  - Copyright
  - Social links
  - Nút scroll lên đầu trang
  Include ở mọi trang thông qua base.njk layout
--}}
<footer class="bg-gray-900 dark:bg-navy-950 border-t border-gray-800 dark:border-navy-800">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="grid sm:grid-cols-3 gap-8 items-center">
      
      {{-- === Logo & Copyright === --}}
      <div class="text-center sm:text-left">
        <a href="#hero" class="text-2xl font-bold text-white hover:text-accent-light transition-colors">
          TrLuat <span class="text-accent-light font-normal text-lg">|</span> Data Analyst
        </a>
        <p class="text-gray-400 text-sm mt-2">
          © <span id="footer-year">2024</span> {{ $site->name }}
        </p>
        <script>document.getElementById('footer-year').textContent = new Date().getFullYear();</script>
        <p class="text-gray-500 text-xs mt-1">
          Built with ❤️ & Laravel
        </p>
      </div>
      
      {{-- === Liên kết nhanh === --}}
      <div class="text-center">
        <p class="text-gray-400 text-sm font-medium mb-3">Liên kết</p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="#about" class="text-gray-500 hover:text-white text-sm transition-colors">Giới thiệu</a>
          <a href="#skills" class="text-gray-500 hover:text-white text-sm transition-colors">Kỹ năng</a>
          <a href="#projects" class="text-gray-500 hover:text-white text-sm transition-colors">Dự án</a>
          <a href="#contact" class="text-gray-500 hover:text-white text-sm transition-colors">Liên hệ</a>
        </div>
      </div>
      
      {{-- === Social Links === --}}
      <div class="text-center sm:text-right">
        <p class="text-gray-400 text-sm font-medium mb-3">Kết nối</p>
        <div class="flex justify-center sm:justify-end gap-3">
          {{-- GitHub --}}
          <a href="{{ $site->social->github }}" target="_blank" 
             class="w-10 h-10 bg-gray-800 hover:bg-gray-700 rounded-lg flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300"
             aria-label="GitHub">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.379.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.161 22 16.418 22 12c0-5.523-4.477-10-10-10z"/>
            </svg>
          </a>
          {{-- LinkedIn --}}
          <a href="{{ $site->social->linkedin }}" target="_blank"
             class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-lg flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300"
             aria-label="LinkedIn">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
            </svg>
          </a>
          {{-- Email --}}
          <a href="mailto:{{ $site->email }}"
             class="w-10 h-10 bg-gray-800 hover:bg-accent rounded-lg flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300"
             aria-label="Email">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
  
  {{-- === Nút scroll lên đầu trang === --}}
  <button id="scroll-top-btn" 
          class="fixed bottom-6 right-6 w-12 h-12 bg-accent hover:bg-accent-dark text-white rounded-full shadow-lg shadow-accent/25 flex items-center justify-center opacity-0 invisible translate-y-4 transition-all duration-300 z-50"
          aria-label="Lên đầu trang">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
  </button>
</footer>
