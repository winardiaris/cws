How to install.
-	ektrak cws-master.zip 
	ke direktori tempat web server melayani dokumen. Edit
	file conf.php yang ada dalam direktori inc.
	ubah pada bagian :

	//server configuration
	$DBSERVER 	= 'localhost';
	$DBUSER 	= '';
	$DBPASSWORD = '';
	$DBDATABASE = 'cws';

- 	Kemudian buat sebuah database dengan konfigurasi sesuai
	dengan yang diisikan dalam file conf.php. Isikan data 
	yang ada dalam file cws_example.sql ke database yang baru dibuat.

-	Setelah proses instalasi ini selesai, login ke cws
	menggunakan akun admin dan password admin. Alamat
	login, atau alamat untuk mengakses CWS adalah

	http://alamat_web_server/cws/
	
-	Sebelum aplikasi berfungsi dengan sempurna, ubah kata sandi
	untuk admin. 

Selamat menggunakan 
