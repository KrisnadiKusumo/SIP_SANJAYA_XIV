Create database sip_sanjaya14;

use sip_sanjaya14;

create table buku(
kode_buku varchar(100) not null primary key,
judul_buku varchar(200) not null,
pengarang_buku varchar(200),
penerbit_buku varchar(200),
thn_terbit_buku date,
sumber_asal_buku enum('Beli','Bantuan')DEFAULT 'Beli',
jumlah_buku int
);

create table fiksi(
kode_fiksi varchar(100) not null primary key,
judul_fiksi varchar(200) not null,
pengarang_fiksi varchar(200),
klasifikasi_fiksi varchar(200),
sumber_asal_fiksi enum('Beli','Hadiah')DEFAULT 'Beli',
bahasa_fiksi enum('Indonesia','Asing'),
macam_fiksi enum('Teks','Fakta','Fiksi','Info')DEFAULT 'Teks',
harga_fiksi int,
keterangan_fiksi varchar(200),
jumlah_fiksi int
);

create table anggota(
id_anggota int not null primary key,
nama_anggota varchar(200) not null,
alamat_anggota varchar(200),
no_telp_anggota varchar(15)
);
