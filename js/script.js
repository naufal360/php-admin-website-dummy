let keyword = document.getElementById('keyword');
// let tombolCari = document.getElementById('tombol-cari');
let container = document.getElementById('sub-container');

// buat event di keyword
keyword.addEventListener('keyup', function(){
    
    // buat objek ajax
    let xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();
});