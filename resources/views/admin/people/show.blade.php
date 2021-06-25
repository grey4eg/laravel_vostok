<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      body {
        font-family: "DejaVu Sans";
      }
  </style>
</head>
<body>

    <div class="container bg-white my-4">
        @if (!empty($people))
            <div class="row">
                <div class="col-12 text-center">
                    Очень Важный Официальный Документ
                </div>
                <div class="col-12 text-center fw-bold">
                    {{ $people[0]->Lastname }} {{ $people[0]->FirstName }} {{ $people[0]->Secondname }}
                </div>
                <div class="col-12 text-center">
                    Его долг: {{ $people[0]->Debt }} руб.
                </div>
                <div class="col-12 text-center">
                    Госпошлина: {{ $people[0]->StateFee }} руб.
                </div>
            </div>
        @else
            Указанный пользователь в базе не найден.
        @endif

    </div>

</body>
</html>
