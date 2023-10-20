```
git clone https://github.com/Lucas-Debiais/vinted-like.git
```

Avoir une base de donnée qui tourne (genre lancer WAMP)

Remplir les variables d'environment du .env qui concerne la base de donnée (préfixées par "DB_")

```
composer install
```

```
npm install
```

```
php artisan serve
```

```
npm run dev
```

```
php artisan migrate
```

### Pour créer 10 annonces avec des données aléatoires 
(modifier le seeder "database/seeders/DatabaseSeeder.php" : Ad::factory(<i>number</i>)->create(); , si besoin de changer le nombre d'annonces à générer)
```
php artisan db:seed
```

