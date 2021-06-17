-- pelanggan
-- drop table tb_pelanggan;
create table tb_pelanggan(
	id_pelanggan varchar(50) not null,
	nama_pelanggan varchar(50) not null,
	no_telepon varchar(50) not null,
	alamat varchar(50) not null,
	constraint pelanggan_id_pk primary key (id_pelanggan)
);

-- distributor
-- drop table tb_distributor;
create table tb_distributor(
	id_distributor varchar(50) not null,
	nama_distributor varchar(50) not null,
	no_telepon varchar(50) not null,
	alamat varchar(50) not null,
	constraint distributor_id_pk primary key (id_distributor)
);

--  ekspedisi
-- drop table tb_ekspedisi;
create table tb_ekspedisi(
	id_ekspedisi varchar(50) not null,
	nama_ekspedisi varchar(50) not null,
	no_telepon varchar(50) not null,
	alamat varchar(50) not null,
	constraint ekspedisi_id_pk primary key (id_ekspedisi)
);

-- keberangkatan
-- drop table tb_keberangkatan;
create table tb_keberangkatan(
	id_keberangkatan varchar(50) not null,
	nama_kapal varchar(50) not null,
	tanggal_pengiriman date not null,
	kota_tujuan varchar(50) not null,
	constraint keberangkatan_id_pk primary key (id_keberangkatan)
);

-- catatan barang
-- drop table tb_catatanbarang;
create table tb_catatanbarang(
	id_catatanbarang varchar(50) not null,
	id_distributor varchar(50) not null,
	id_pelanggan varchar(50) not null,
	id_ekspedisi varchar(50) not null,
	id_keberangkatan varchar(50) not null,
	berat bigint not null,
	harga bigint not null,
	constraint catatan_id_pk primary key (id_catatanbarang),
	constraint catatan_distributor_fk foreign key (id_distributor) references tb_distributor (id_distributor),
	constraint catatan_pelanggan_fk foreign key (id_pelanggan) references tb_pelanggan (id_pelanggan),
	constraint catatan_ekspedisi_fk foreign key (id_ekspedisi) references tb_ekspedisi (id_ekspedisi),
	constraint catatan_keberangkatan_fk foreign key (id_keberangkatan) references tb_keberangkatan (id_keberangkatan)
);

insert into tb_pelanggan (id_pelanggan, nama_pelanggan, no_telepon, alamat)
	values
	('IDP-0001','Azka','082536472577','Jl. Pancasila No.7'), ('IDP-0002','Hambali','082636287362','Jl. Manggis No.13'),
	('IDP-0003','Dias','082637189746','Jl. Mawar No.9'), ('IDP-0004','Resti','082637484655','Jl. Melati No.33');

select * from tb_pelanggan;

insert into tb_distributor (id_distributor, nama_distributor, no_telepon, alamat)
	values
	('IDD-0001','Hadiyani','083647283283','Jl. Pisang No.43'),
	('IDD-0002','Dhiyaaul','088736453632','Jl. Kenangan No.11'),
	('IDD-0003','Rizky','082535278362','Gang Melon No. 1'),
	('IDD-0004','Azkiya','082323535353','Dusun Kangkung No 5');

select * from tb_distributor;

insert into tb_ekspedisi (id_ekspedisi, nama_ekspedisi, no_telepon, alamat) 
	values 
	('EKS-001','ENJ','081362763727','Jl. Raya Dramaga No.112'),
	('EKS-002','TNJ','086253746373','Jl. Raya Bogor No.209'),
	('EKS-003','CARGO EXPRESS','089765132444','Jl. Raya Dramaga No.5');

select * from tb_ekspedisi;

insert into tb_keberangkatan (id_keberangkatan, nama_kapal, tanggal_pengiriman, kota_tujuan) 
	values 
	('IDK-001','Ciremai','23-Jun-2021','Jayapura'),
	('IDK-002','Dobonsolo','7-Jun-2021','Biak'),
	('IDK-003','Sinabung','6-Jun-2021','Serui');

select * from tb_keberangkatan;

insert into tb_catatanbarang (id_catatanbarang, id_distributor, id_pelanggan, id_ekspedisi, id_keberangkatan, berat, harga) 
	values
	('IDC-001','IDD-0001','IDP-0001','EKS-001', 'IDK-001', '7', '250000'),
	('IDC-002','IDD-0003','IDP-0002','EKS-002', 'IDK-003', '1', '100000');

select * from tb_catatanbarang;