<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4a4a4a;
            font-size: 20px; /* Réduire la taille de la police pour économiser de l'espace */
        }

        .table-container {
            overflow-x: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 5px 10px; /* Ajuster la marge pour centrer la table */
            border-radius: 8px;
            background-color: #fff;
            width: 100%; /* Utiliser la largeur maximale pour le contenu PDF */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 5px; /* Réduire la marge autour de la table */
        }

        th, td {
            padding: 8px 12px; /* Réduire le padding pour compacter les cellules */
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px; /* Réduire la taille de la police pour économiser de l'espace */
        }

        th {
            background-color: #f4f4f4;
            color: #333;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
            color: #333;
        }

        img {
            width: 30px; /* Réduire la taille de l'image pour économiser de l'espace */
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .empty-message {
            text-align: center;
            color: #aaa;
            font-size: 17px; /* Réduire la taille de la police pour économiser de l'espace */
            margin-top: 30px; /* Réduire l'espace entre le titre et le message vide */
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    @if (count($marchandises) > 0)
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                      
                        <th>Nom</th>
                        <th>Categorie</th>
                        <th>Quantite</th>
                        <th class="text-center">Entre</th>
                        <th class="text-center">Sortie</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marchandises as $marchandise)
                        <tr>
                            <td>{{ $marchandise->nom }}</td>
                           
                            <td>
                                {{ $marchandise->categories->nom ?? $marchandise->categories }}
                            </td>
                            <td>{{ $marchandise->quantite }}</td>
                            <td>{{ $marchandise->entre }}</td>
                            <td>{{ $marchandise->sortie }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h2 class="empty-message">Aucune marchandise</h2>
    @endif
</body>
</html>