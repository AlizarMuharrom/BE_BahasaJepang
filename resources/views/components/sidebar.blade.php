<!-- resources/views/components/sidebar.blade.php -->
<div id="sidebar" class="sidebar">
  <button id="sidebarToggle" class="toggle-btn">☰</button>
  <ul class="menu">
    <li><a href="{{ route('materi.index') }}">📘 Data Materi</a></li>
    <li><a href="{{ route('ujian.index') }}">📝 Data Ujian</a></li>
    <li><a href="{{ route('kamus.index') }}">📚 Data Kamus</a></li>
    <li><a href="{{ route('kanji.index') }}">🈶 Data Kanji</a></li>
    <li><a href="{{ route('user.index') }}">👤 Data User</a></li>
  </ul>
</div>

<style>
  .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 220px;
    height: 100%;
    background-color: #1f2937;
    color: white;
    padding-top: 60px;
    transition: transform 0.3s ease;
    z-index: 1000;
  }

  .sidebar.closed {
    transform: translateX(-100%);
  }

  .menu {
    list-style: none;
    padding: 0;
  }

  .menu li {
    padding: 15px;
    border-bottom: 1px solid #374151;
  }

  .menu li a {
    color: white;
    text-decoration: none;
    display: block;
  }

  .toggle-btn {
    position: fixed;
    top: 15px;
    left: 15px;
    background-color: #2563eb;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 1100;
    border-radius: 4px;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('closed');
    });
  });
</script>
