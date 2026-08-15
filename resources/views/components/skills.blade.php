{{-- 
  Component Skills Section (ĐÃ CẬP NHẬT)
  - Cards kỹ năng
  - Modal: Sổ tay kiến thức (Knowledge Base) & Dự án
--}}
<section id="skills" class="py-20">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    
    {{-- === Tiêu đề Section === --}}
    <div class="text-center mb-16 fade-in">
      <p class="text-accent dark:text-accent-light font-mono text-sm tracking-wider uppercase mb-2">Kỹ năng & Kiến thức</p>
      <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white">
        Công cụ & Sổ tay ngành
      </h2>
      <div class="w-20 h-1 bg-gradient-to-r from-accent to-navy-500 mx-auto mt-4 rounded-full"></div>
      <p class="text-gray-600 dark:text-gray-400 mt-4 max-w-lg mx-auto">
        Nhấn vào từng kỹ năng để xem "Sổ tay kiến thức" và dự án áp dụng
      </p>
    </div>
    
    {{-- === Grid kỹ năng === --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
      @foreach($skills as $skill)
        <div class="fade-in" style="animation-delay: {{ $loop->index * 80 }}ms;">
          <button type="button"
                  class="skill-card w-full text-left bg-white dark:bg-navy-800/50 rounded-xl p-5 border border-gray-100 dark:border-navy-700/50 hover:shadow-lg hover:border-accent/30 dark:hover:border-accent/30 transform hover:-translate-y-1 transition-all duration-300 cursor-pointer group"
                  data-skill-name="{{ $skill->name }}"
                  onclick="openSkillModal('{{ $skill->name }}')">
            
            {{-- Icon + tên --}}
            <div class="flex items-center gap-3 mb-3">
              <span class="text-2xl group-hover:scale-110 transition-transform duration-300">{{ $skill->icon }}</span>
              <div>
                <h4 class="font-semibold text-gray-900 dark:text-white text-sm group-hover:text-accent dark:group-hover:text-accent-light transition-colors">{{ $skill->name }}</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400 font-mono">{{ $skill->category }}</p>
              </div>
            </div>
            
            {{-- Mô tả --}}
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed mb-2">{{ $skill->description }}</p>
            
            {{-- Hint nhấn để xem --}}
            <div class="flex items-center gap-1 text-xs text-accent/60 dark:text-accent-light/60 group-hover:text-accent dark:group-hover:text-accent-light transition-colors mt-4">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
              </svg>
              <span>Xem chi tiết Sổ tay</span>
            </div>
          </button>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- === MODAL — Kiến thức & Dự án === --}}
<div id="skill-modal" class="fixed inset-0 z-[100] hidden">
  <div id="skill-modal-overlay" class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeSkillModal()"></div>
  
  <div class="absolute inset-4 sm:inset-8 md:inset-12 lg:inset-x-32 lg:inset-y-16 bg-white dark:bg-navy-900 rounded-2xl shadow-2xl overflow-hidden flex flex-col modal-content">
    
    {{-- Header modal --}}
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-navy-700 bg-gray-50/50 dark:bg-navy-800/30">
      <div class="flex items-center gap-3">
        <span id="modal-skill-icon" class="text-2xl sm:text-3xl"></span>
        <div>
          <h3 id="modal-skill-name" class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white"></h3>
          <p id="modal-skill-desc" class="text-sm text-gray-500 dark:text-gray-400"></p>
        </div>
      </div>
      <button onclick="closeSkillModal()" 
              class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-navy-700 text-gray-500 dark:text-gray-400 transition-colors"
              aria-label="Đóng">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>
    
    {{-- Body modal: Sổ tay kiến thức (Full width) --}}
    <div class="flex-1 overflow-y-auto bg-gray-50/30 dark:bg-navy-950/20">
      <div class="p-6 lg:p-10 max-w-5xl mx-auto">
        <div class="flex items-center gap-3 mb-8">
          <div class="p-2.5 rounded-xl bg-accent/10 text-accent dark:bg-accent/20 dark:text-accent-light shadow-inner">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
          </div>
          <h4 class="text-xl font-bold text-gray-900 dark:text-white tracking-wide">Chi tiết Sổ tay (Knowledge Base)</h4>
        </div>
        
        <ul id="modal-knowledge-list" class="space-y-6">
          {{-- Dữ liệu kiến thức sẽ render vào đây --}}
        </ul>
      </div>
    </div>
  </div>
</div>

{{-- === Script xử lý modal === --}}
<script>
  // Dữ liệu skills (render từ Nunjucks)
  const skillsData = @json($skills);

  
  function openSkillModal(skillName) {
    const modal = document.getElementById('skill-modal');
    const skill = skillsData.find(s => s.name === skillName);
    if (!skill) return;
    
    // Header
    document.getElementById('modal-skill-icon').textContent = skill.icon;
    document.getElementById('modal-skill-name').textContent = skill.name;
    document.getElementById('modal-skill-desc').textContent = skill.description;
    
    // Render Knowledge List
    const knowledgeContainer = document.getElementById('modal-knowledge-list');
    if (skill.knowledge && skill.knowledge.length > 0) {
      knowledgeContainer.innerHTML = skill.knowledge.map(note => `
        <li class="flex items-start gap-3 p-3 rounded-lg bg-white dark:bg-navy-800 border border-gray-100 dark:border-navy-700">
          <div class="mt-0.5 min-w-4 text-accent dark:text-accent-light">•</div>
          <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">${note}</p>
        </li>
      `).join('');
    } else {
      knowledgeContainer.innerHTML = `<p class="text-sm text-gray-500 italic">Đang cập nhật kiến thức...</p>`;
    }
    

    
    // Mở modal
    modal.classList.remove('hidden');
    requestAnimationFrame(() => {
      modal.querySelector('.modal-content').classList.add('modal-open');
      modal.querySelector('#skill-modal-overlay').classList.add('modal-overlay-open');
    });
    document.body.style.overflow = 'hidden';
  }
  
  function closeSkillModal() {
    const modal = document.getElementById('skill-modal');
    modal.querySelector('.modal-content').classList.remove('modal-open');
    modal.querySelector('#skill-modal-overlay').classList.remove('modal-overlay-open');
    setTimeout(() => {
      modal.classList.add('hidden');
      document.body.style.overflow = '';
    }, 250);
  }
  
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeSkillModal();
  });
</script>
