<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks </title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <table >
        <thead>

            <tr>
                <th colspan="6">
                    <strong>REPORTE DE BECAS</strong>

                </th>
            </tr>
            <tr>
                <th colspan="6">
                </th>
            </tr>

            <tr>
                <th style="font-weight: bold;">id</th>
                <th style="font-weight: bold;">Title</th>
                <th style="font-weight: bold;">Description</th>
                <th style="font-weight: bold;">place</th>
                <th style="font-weight: bold;">Expiration date</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($data as $key => $task)
                <tr>
                    <td align="center">{{ $task->id }}</td>
                    <td align="center">{{ $task->title}}</td>
                    <td align="center">{{ $task->description }}</td>
                    <td align="center">{{ $task->place_id }}%</td>
                    <td align="center">{{ $task->expiration_date }}</td>
                    <td align="center">{{ $task->place->name }}</td>
                </tr>
            @endforeach



        </tbody>
    </table>



</body>
@php(dd())

</html>
