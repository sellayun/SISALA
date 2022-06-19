<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>

	<h2>www.malasngoding.com</h2>
	<h3>Data Pegawai</h3>

	<a href="/pegawai/tambah"> + Tambah Pegawai Baru</a>
	
	<br/>
	<br/>

	<table border="1">
		<tr>
			<th>Nama</th>
			<th>Opsi</th>
		</tr>
		@foreach($pegawai as $p)
		<tr>
			<td>{{ $p->nama }}</td>
			<td>
				<a href="/pegawai/edit/{{ $p->id }}">Edit</a>
				|
				<a href="/pegawai/hapus/{{ $p->id }}">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>


</body>
</html>