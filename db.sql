CREATE TABLE pasien (
    id_pasien INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50) NOT NULL,
    poli VARCHAR(50) NOT NULL,
    alamat VARCHAR(50) NOT NULL,
    no_hp CHAR(13) NOT NULL,
    keluhan VARCHAR(50) NOT NULL
);
