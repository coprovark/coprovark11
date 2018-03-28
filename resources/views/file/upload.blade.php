

<form action="/upload1" method="post" enctype="multipart/form-data"> 
    <input type="text" name="uploadfilename"><br><br>
    <input type="file" name="uploadfile"><br><br>
    <input type="submit" value="uplad">
<form>
<br><br>
<table border="1" width="40%">
    <thead>
        <tr>
            <th>#</th>
            <th>ชื่อไฟล์</th>
            <th>ประเภทไฟล์</th>
            <th>ขนาด</th>
            <th>Download</th>
        </tr>
    </thead>
    <tbody>
    @foreach($datatable as $row)
        <tr>
            <td>
                @if($row->FileType == 'png')
                    <img src="upload/{{ $row->FilePath }}" width="60px">
                @endif
            </td>
            <td>{{ $row->FileName }}</td>
            <td>{{ $row->FileType }}</td>
            <td>{{ $row->FileSize }}</td>
            <td>
                <a href="dl/{{$row->FilePath}}/{{ $row->FileName }}.{{ $row->FileType }}" target="new">Download</a>
                <a href="rm/{{$row->ID}}" >Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
