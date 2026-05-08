const form = document.getElementById('formProduk');
if(form) {
    form.addEventListener('submit', function(e) {
        const nama = document.getElementById('nama').value;
        const harga = document.getElementById('harga').value;
        const foto = document.getElementById('foto');
        
        if(nama === "" || harga === "") {
            alert("Semua field wajib diisi!");
            e.preventDefault();
        }
        
        if(foto.files.length > 0) {
            const file = foto.files[0];
            const size = file.size / 1024 / 1024; // MB
            const ext = file.name.split('.').pop().toLowerCase();
            
            if(!['jpg', 'jpeg', 'png'].includes(ext)) {
                alert("Hanya boleh JPG, JPEG, atau PNG!");
                e.preventDefault();
            }
            if(size > 2) {
                alert("Ukuran file maksimal 2 MB!");
                e.preventDefault();
            }
        }
    });
}