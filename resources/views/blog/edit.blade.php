@extends('layouts.admin')
@section('title', 'sửa blog')

@section('content')
    <form action="{{ route('blog.update', $blog->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <link rel="stylesheet" href="{{ asset('css/suablog.css') }}">
            <tr>
                <td><label for="tieu_de">Tiêu đề:</label></td>
                <td><input type="text" id="tieu_de" name="tieu_de" value="{{ old('tieu_de', $blog->tieu_de) }}"></td>
            </tr>
            <tr>
                <td><label for="noi_dung">Nội dung:</label></td>
                <td>
                    <textarea id="noi_dung" name="noi_dung" rows="5">{{ old('noi_dung', $blog->noi_dung) }}</textarea>
                </td>
            </tr>
            <tr>
                <td><label for="tac_gia">Tác giả:</label></td>
                <td><input type="text" id="tac_gia" name="tac_gia" value="{{ old('tac_gia', $blog->tac_gia) }}"></td>
            </tr>
        </table>
        <button type="submit">Lưu thay đổi</button>
    </form>

@endsection
