document.addEventListener('DOMContentLoaded', function() {
    // Ambil elemen modal
    var modal = document.getElementById("modalGaleri");

    // Ambil gambar di dalam modal
    var gambarBesar = document.getElementById("gambarBesar");

    // Ambil semua link galeri
    var galeriLinks = document.getElementsByClassName("galeri-link");

    // Loop untuk setiap link galeri
    for (var i = 0; i < galeriLinks.length; i++) {
        galeriLinks[i].onclick = function(event) {
            event.preventDefault(); // Mencegah link pindah halaman
            
            // Tampilkan modal
            modal.style.display = "block";
            
            // Atur sumber gambar besar
            gambarBesar.src = this.href;
        }
    }

    // Ambil tombol tutup
    var tutup = document.getElementsByClassName("tutup")[0];
    
    // Ketika pengguna klik tombol tutup, sembunyikan modal
    tutup.onclick = function() {
        modal.style.display = "none";
    }

    // Ketika pengguna klik di luar modal, sembunyikan modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});