# REST-API-FORMULA1

Ce projet a pour but de créer une REST API from scratch 
permettant un CRUD.

Il est donc possible de faire des requêtes GET, POST, PATCH ainsi que DELETE sur différents endpoints qui sont les circuits, les écuries et les pilotes.

Les données par défaut qui sont utilisées dans la base de données sont les données de la saison 2019 / 2020.

Si vous tester les différentes requêtes sur POSTMAN, veillez à ce que votre serveur PHP écoute sur le port 8888.

Voici les différentes routes que vous pouvez utiliser :

- /circuits --> affiche tous les circuits
- /drivers --> affiche tous les drivers
- /teams --> affiche toutes les teams

- /circuits/show/{id} --> affiche le circuit avec l'id correspondant
- /drivers/show/{id} --> affiche le driver avec l'id correspondant
- /teams/show/{id} --> affiche la team avec l'id correspondant

- /circuits/delete/{id} --> delete le circuit avec l'id correspondant
- /drivers/delete/{id} --> delete le driver avec l'id correspondant
- /teams/delete/{id} --> delete la team avec l'id correspondant

- /circuits/update/{id} --> update le circuit avec l'id correspondant et avec les données qui sont passés dans le body de la requête HTTP en format json
    
Un exemple de body pour les circuits :

    {
    "name": "test",
    "country": "test",
    "length": 14,
    "number_of_turns": 1
    }
        


- /drivers/update/{id} --> update le driver avec l'id correspondant et avec les données qui sont passés dans le body de la requête HTTP en format json

Un exemple de body pour les drivers :

    {
    "name": "test",
    "nationality": "test",
    "date_of_birth": "2003-12-07",
    "team_id": 1,
    "car_number": 3
    }



- /teams/update/{id} --> update la team avec l'id correspondant et avec les données qui sont passés dans le body de la requête HTTP en format json
  
Un exemple de body pour les teams :
    

    {
    "name": "test",
    "country": "test",
    "team_principal": "moi",
    "year_of_creation": 1999
    }

- /circuits/create/{id} --> create le circuit avec l'id correspondant et avec les données qui sont passés dans le body de la requête HTTP en format json

Un exemple de body pour les circuits :

    {
    "name": "test",
    "country": "test",
    "length": 14,
    "number_of_turns": 1
    }



- /drivers/create/{id} --> create le driver avec l'id correspondant et avec les données qui sont passés dans le body de la requête HTTP en format json

Un exemple de body pour les drivers :

    {
    "name": "test",
    "nationality": "test",
    "date_of_birth": "2003-12-07",
    "team_id": 1,
    "car_number": 3
    }



- /teams/create/{id} --> create la team avec l'id correspondant et avec les données qui sont passés dans le body de la requête HTTP en format json

Un exemple de body pour les teams :


    {
    "name": "test",
    "country": "test",
    "team_principal": "moi",
    "year_of_creation": 1999
    }


Sur la page HTML, les boutons TEAMS, CIRCUITS et DRIVERS vous redirigerons vers une page qui vous affichera toutes les données de chaque catégorie.