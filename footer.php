      </div>
    </main>
  </div>

  <!-- Mobile Menu Overlay -->
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <script src="./js/principale.js"></script>
  <script>
    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
      const sidebarToggle = document.querySelector('.sidebar-toggle');
      const sidebar = document.querySelector('.sidebar');
      const sidebarOverlay = document.getElementById('sidebarOverlay');
      
      if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
          sidebar.classList.toggle('sidebar-open');
        });
      }
      
      if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
          sidebar.classList.remove('sidebar-open');
        });
      }
      
      // Search functionality
      const searchInput = document.getElementById('searchInput');
      if (searchInput) {
        searchInput.addEventListener('input', function() {
          const searchTerm = this.value.toLowerCase();
          const tableRows = document.querySelectorAll('.tbd tr');
          
          tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
          });
        });
      }
    });
  </script>
</body>
</html> 