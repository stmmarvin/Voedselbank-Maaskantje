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
        }
        
        .top-bar {
            background-color: #ff6600;
            color: white;
            padding: 8px 40px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 20px;
            font-size: 14px;
        }
        
        .top-bar a {
            color: white;
            text-decoration: none;
        }
        
        .top-bar a:hover {
            text-decoration: underline;
        }
        
        .main-nav {
            background-color: white;
            border-bottom: 2px solid #ddd;
            padding: 0 40px;
            display: flex;
            align-items: center;
            gap: 40px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 0;
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            background-color: #ff6600;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        
        .logo-text {
            color: #ff6600;
            font-size: 18px;
            font-weight: bold;
        }
        
        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
            flex: 1;
        }
        
        .nav-links a {
            color: #333;
            text-decoration: none;
            padding: 20px 0;
            display: block;
            font-size: 15px;
        }
        
        .nav-links a:hover {
            color: #ff6600;
            border-bottom: 3px solid #ff6600;
        }
        
        .nav-links a.active {
            color: #ff6600;
            border-bottom: 3px solid #ff6600;
        }
        
        .container {
            max-width: 1200px;
            margin: 30px auto;
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
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
            .top-bar {
                padding: 8px 20px;
            }
            
            .main-nav {
                padding: 0 20px;
                flex-wrap: wrap;
            }
            
            .nav-links {
                width: 100%;
                flex-direction: column;
                gap: 0;
            }
            
            .nav-links a {
                padding: 15px 0;
                border-bottom: 1px solid #eee;
            }
            
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
    <div class="top-bar">
        <span>Mohammed@gmail.com</span>
        <a href="#">Uitloggen</a>
    </div>
    
    <nav class="main-nav">
        <div class="logo">
            <div class="logo-icon">🛒</div>
            <span class="logo-text">Mijn Overzicht</span>
        </div>
        
        <ul class="nav-links">
            <li><a href="#" class="{{ request()->is('informatie') ? 'active' : '' }}">Informatie</a></li>
            <li><a href="{{ route('overzicht') }}" class="{{ request()->is('/') || request()->is('overzicht') ? 'active' : '' }}">Voorraad</a></li>
            <li><a href="#" class="{{ request()->is('allergieen') ? 'active' : '' }}">Allergieën</a></li>
            <li><a href="#" class="{{ request()->is('leveranciers') ? 'active' : '' }}">Leveranciers</a></li>
        </ul>
    </nav>
    
    <div class="container">
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
