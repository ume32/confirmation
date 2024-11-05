@extends('layouts.app')

@section('content')
<div class="admin__content">
    <form action="{{ route('admin.search') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="名前やメールアドレスを入力してください" value="{{ request('name') }}">
        <select name="gender">
            <option value="all">性別</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
            <option value="3">その他</option>
        </select>
        <input type="date" name="date" value="{{ request('date') }}">
        <button type="submit">検索</button>
        <a href="{{ route('admin.index') }}">リセット</a>
    </form>

    <a href="{{ route('admin.export') }}" class="export-button">エクスポート</a>

    <table>
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                    <td>{{ $contact->gender_label }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td><button class="detail-button" data-id="{{ $contact->id }}">詳細</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
</div>

<div id="modal" style="display: none;">
    <div id="modal-content">
        <span id="close-modal">×</span>
        <!-- モーダルウィンドウの詳細内容 -->
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.detail-button').forEach(button => {
        button.addEventListener('click', () => {
            // モーダルの表示ロジック
        });
    });

    document.getElementById('close-modal').addEventListener('click', () => {
        // モーダルを閉じるロジック
    });
});
</script>
@endsection
