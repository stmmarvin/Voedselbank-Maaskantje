<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voedselbank - @yield('title')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border: 2px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .header {
            background-color: #ff6600;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header h1 {
            font-size: 18px;
            font-weight: normal;
        }
        
        .menu-icon {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        
        .menu-icon span {
            width: 25px;
            height: 3px;
            background: white;
        }
        
        nav {
            background: #f9f9f9;
            border-bottom: 1px solid #ddd;
            padding: 10px 20px;
        }
        
        nav a {
            color: #333;
            text-decoration: none;
            margin-right: 20px;
            font-size: 14px;
        }
        
        nav a:hover {
            color: #ff6600;
        }
        
        .content {
            padding: 30px;
        }
        
        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .search-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            justify-content: center;
        }
        
        .search-bar input {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 300px;
        }
        
        .search-bar button, .btn {
            background-color: #ff6600;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .search-bar button:hover, .btn:hover {
            background-color: #e55a00;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table th {
            background-color: #f0f0f0;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
            font-weight: normal;
            color: #333;
        }
        
        table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: normal;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .form-actions {
            text-align: center;
            margin-top: 30px;
        }
        
        .pagination {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        
        .pagination a {
            color: #ff6600;
            text-decoration: none;
            margin: 0 5px;
        }
        
        @media (max-width: 768px) {
            .container {
                margin: 10px;
            }
            
            .search-bar {
                flex-direction: column;
            }
            
            .search-bar input {
                width: 100%;
            }
            
            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Voedselbank</h1>
            <div class="menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        
        <nav>
            <a href="{{ route('overzicht') }}">Home</a>
            <a href="{{ route('overzicht') }}">Voorraad</a>
            <a href="#">Rapporten</a>
            <a href="#">Instellingen</a>
        </nav>
        
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
