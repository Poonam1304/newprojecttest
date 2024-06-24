<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hierarchical Employees</title>
    <style>
        ul {
            list-style-type: disc; 
            margin-left: 20px; 
        }
        ul ul {
            list-style-type: circle; 
        }
    </style>
</head>
<body>
    <h1>Hierarchical Employees</h1>
    <ul>
        @foreach ($employees as $employee)
            <li>{{ $employee->name }}
                {!! $employee->hierarchy !!} 
            </li>
        @endforeach
    </ul>
</body>
</html>