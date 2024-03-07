function updateKaryawanClass() {
    const liKaryawan = document.getElementById('li_karyawan');
    const lidashboard = document.getElementById('li_dashboard');
    const currentPath = window.location.pathname;

    
    if (currentPath.includes('karyawan.php')) {
        lidashboard.classList.remove('active');
        liKaryawan.classList.add('active');
    } else if(currentPath.includes('index.php')){
        lidashboard.classList.add("active");
        liKaryawan.classList.remove('active');
      }
}

document.addEventListener('DOMContentLoaded', updateKaryawanClass);
window.addEventListener('popstate', updateKaryawanClass);