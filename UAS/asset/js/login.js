// Mendapatkan referensi elemen dengan kelas 'sidebar'
const sidebar = document.querySelector('.sidebar');

// Mendapatkan referensi elemen dengan id 'btn'
const btn = document.querySelector('#btn');

// Menambahkan event listener pada tombol dengan id 'btn'
btn.onclick = function(){
    // Menambahkan atau menghapus kelas 'active' pada elemen dengan kelas 'sidebar' saat tombol diklik
    sidebar.classList.toggle('active');
};

// Mendapatkan referensi elemen dengan kelas 'content'
const content = document.querySelector('.content');

// Mendapatkan referensi elemen dengan kelas 'sidebar_mobile'
const sidebarMobile = document.querySelector('.sidebar_mobile'); // Perbaikan: tambahkan titik (.) sebelum 'sidebar_mobile'

// Menambahkan event listener pada elemen dengan kelas 'content'
content.addEventListener('click', function(){
    // Menghapus kelas 'active' pada elemen dengan kelas 'sidebar' saat konten diklik
    sidebar.classList.remove('active');
});
