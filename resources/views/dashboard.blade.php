<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <td>
                    <h1>Tableau de bord</h1>
                </td>
                <td>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button>Se déconnecter</button>
                    </form>
                    
                        
                    
                </td>
            </tr>
        </tbody>
    </table>
    <h3>Bienvenue {{ Auth::user()->name }}</h3>

    <a href="{{route('users.index')}}">
        Liste des utilisateurs
    </a>
</body>
</html>