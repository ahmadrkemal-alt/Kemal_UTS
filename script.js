function validasi(){

    let nama =
    document.getElementById("nama").value;

    let harga =
    document.getElementById("harga").value;

    let stok =
    document.getElementById("stok").value;

    let foto =
    document.getElementById("foto").files[0];

    if(nama == "" ||
       harga == "" ||
       stok == ""){

        alert("Data tidak boleh kosong");
        return false;
    }

    if(foto){

        let ext =
        foto.name.split('.').pop()
        .toLowerCase();

        let allowed =
        ['jpg','jpeg','png'];

        if(!allowed.includes(ext)){

            alert("File harus gambar");
            return false;
        }

        if(foto.size > 2000000){

            alert("Ukuran maksimal 2 MB");
            return false;
        }
    }

    return true;
}