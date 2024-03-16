const currentPath = window.location.pathname;
const liKaryawan = document.getElementById('li_karyawan');
const lidashboard = document.getElementById('li_dashboard');
const lisupplier = document.getElementById('li_supplier');
const liproduk = document.getElementById('li_produk');
const SubMenu_produk = document.getElementById('SubMenu_produk');
const SubMenu_StockIn = document.getElementById('SubMenu_stock_in');
const SubMenu_kategori = document.getElementById('SubMenu_kategori');


function updateNavClass(activeTabId) {
    
    lidashboard.classList.toggle('active', activeTabId === 'dashboard');
    liKaryawan.classList.toggle('active', activeTabId === 'karyawan');
    lisupplier.classList.toggle('active', activeTabId === 'supplier');
    liproduk.classList.toggle('active', activeTabId === 'produk' || activeTabId === 'stock_in' || activeTabId === 'kategori');
    SubMenu_produk.classList.toggle('active', activeTabId === 'produk');
    SubMenu_StockIn.classList.toggle('active', activeTabId === 'stock_in');
    SubMenu_kategori.classList.toggle('active', activeTabId === 'kategori');
}
function updateKaryawanClass() {
    
    if (currentPath.includes('karyawan.php')) {
        updateNavClass('karyawan');
    } else if (currentPath.includes('index.php')) {
        updateNavClass('dashboard');
    } else if (currentPath.includes('supplier.php')) {
        updateNavClass('supplier');
    } else if (currentPath.includes('produk.php')) {
        updateNavClass('produk');
    } else if (currentPath.includes('stock_in.php')) {
        updateNavClass('stock_in');
    } else if (currentPath.includes('kategori.php')) {
        updateNavClass('kategori');
    }
}

document.addEventListener('DOMContentLoaded', updateKaryawanClass);

window.addEventListener('popstate', function (event) {
    if (event.state) {
        updateKaryawanClass();
    }
});

