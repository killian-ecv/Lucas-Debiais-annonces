# Projet d'évalutation Laravel (Trello-like)

Développement d'une plateforme d'annonce de biens d'occasion avec interface d'administration sur Laravel

## Pré-requis

Pour exécuter le projet, il est nécessaire d'avoir installer les outils ci-dessous :

- [NodeJS](https://nodejs.org)
- [Composer](https://getcomposer.org/)
- Un service qui fait tourner une BDD (exemple : [WAMP](https://www.wampserver.com/))

## Démarage

- Copier le projet :``` git clone https://github.com/Lucas-Debiais/vinted-like.git ```

- Lancer ça base de donnée
- Copier/coller le .env.example à la racine du projet et le renommer en .env
- Remplacer les variables d'environment du .env qui concernent la base de donnée (préfixées par "DB_")
- Lancer l'installation des dépendances composer : ```composer install ```
- Lancer l'installation des dépendances NPM : ``` npm install ```
- Lancer l'hosting du projet à l'aide de PHP Artisan : ``` php artisan serve ```

- Lancer le watcher de vite pour compiler en hotreload le style et les scripts js : ``` npm run dev ```

- Effectuer une migration pour initialiser la BDD : ``` php artisan migrate ```

## Tips

- Pour créer 10 annonces avec des données aléatoires : ``` php artisan db:seed ```
  - (modifier le seeder "database/seeders/DatabaseSeeder.php" : Ad::factory(<i>number</i>)->create(); , si besoin de changer
  le nombre d'annonces à générer)
- Pour build le style et les scripts js : ``` npm run build ```

## Author
- [Debiais Lucas](https://github.com/Lucas-Debiais)


