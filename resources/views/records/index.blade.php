<!-- resources/views/records/index.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records de Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Ranking</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="GET" action="{{ route('records.index') }}" class="mb-3">
            <label for="movement">Escolha um movimento:</label>
            <select name="movementId" id="movement" class="form-control" onchange="this.form.submit()">
                <option value="1" {{ request('movementId') == 1 ? 'selected' : '' }}>Deadlift</option>
                <option value="2" {{ request('movementId') == 2 ? 'selected' : '' }}>Black Squat</option>
                <option value="3" {{ request('movementId') == 3 ? 'selected' : '' }}>Bench Press</option>
            </select>
        </form>

        <table class="table table-bordered table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Posição</th>
                    <th>Usuário</th>
                    <th>Recorde Máximo</th>
                    <th>Data do Recorde</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records['ranking'] as $index => $record)
                    <tr>
                        <td>{{ $record->posicao }}º lugar</td>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->max_value }} kg</td>
                        <td>{{ \Carbon\Carbon::parse($record->date)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center">
            <a href="{{ route('login') }}" class="btn btn-primary">Logout</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
