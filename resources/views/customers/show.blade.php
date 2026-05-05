<h1>Data Customer</h1>

<table border="1">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>

    @foreach($customers as $c)
    <tr>
        <td>{{ $c->nama }}</td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->phone }}</td>
    </tr>
    @endforeach
</table>
