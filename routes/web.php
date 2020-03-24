<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\store\Store;

Route::get('/', function () {
    return view('login', compact("villes"));
});

Route::get('/home', function () {
    $persons = ["Jessica", "Francess", "Sandrine", "Lorenza", "Karlie"];
    return view('home', compact("persons"));
});

Route::get('/admin', function () {
    $admins = [];
    for($i = 1; $i < 10;$i++){
        array_push($admins, ['username_admin'=>'Rob Rx', 'id'=>2]);
    }
    return view('admin', compact("admins"));
});

Route::get('/admin/modify_password', function () {
    return view('modify_password');
});

Route::get('/ville', function () {
    $villes = Store::getVilles();
    return view('ville', compact("villes"));
});

Route::get('/quartier', function () {
    $quartiers = Store::getQuartiers();
    $villes = Store::getVilles();
    return view('quartier', compact("villes", "quartiers"));
});

Route::get('/typebureau', function () {
    $types = Store::getTypesBureau();
    return view('type_bureau', compact("types"));
});

Route::get('/bureau', function () {
    $bureaux = Store::getBureaux();
    $typesBureau = Store::getTypesBureau();
    $quartiers = Store::getQuartiers();
    return view('bureau', compact("bureaux", "typesBureau", "quartiers"));
});


Route::get('/categories_user', function () {
    $categoriesUser = Store::getCategoriesUser();
    return view('categorie_user', compact("categoriesUser"));
});

Route::get('/type_user', function () {
    $typesUser = Store::getTypesUser();
    return view('type_user', compact("typesUser"));
});


Route::get('/distributeurs', function () {
    $distributeurs = Store::getDistributeurs();
    $bureaux = Store::getBureaux();
    $villes = Store::getVilles();
    $categoriesUser = Store::getCategoriesUser();
    $typesUser = Store::getTypesUser();
    return view('distributeur', compact("distributeurs", "bureaux", "villes", "categoriesUser", "typesUser"));
});


Route::get('/distributeurs/{id}', function () {
    $distributeur = [
        "id_dist"=> 1,
        "nom_dist" => "Kamga",
        "prenom_dist" => "Rick",
        "matricule_dist" => "2303ED",
        "sexe_dist" => 1,
        "phone_dist" => 677229922,
        "mail_dist" => "mail@gmail.com",
        "datenaiss_dist" => "1992-02-16",
        "heritier_dist" => "202020FD",
        "ville" => ['titre_ville'=>'Douala', 'id'=>2],
        "type_user" => ['titre_typuser'=>"Type 1", 'id'=>2],
        "categorie_user" => ['titre_catuser'=>"Categorie 1", 'id'=>2]
    ];
    $commandes = Store::getCommandes();
    $njangui = ['montant_njang'=>3000];
    return view('details_distributeur', compact("distributeur", "commandes", "njangui"));
});

Route::get('/commandes', function () {
    $distributeur = [
        "id_dist"=> 1,
        "nom_dist" => "Kamga",
        "prenom_dist" => "Rick",
        "matricule_dist" => "2303ED",
        "sexe_dist" => 1,
        "phone_dist" => 677229922,
        "mail_dist" => "mail@gmail.com",
        "datenaiss_dist" => "1992-02-16",
        "heritier_dist" => "202020FD",
        "ville" => ['titre_ville'=>'Douala', 'id'=>2],
        "type_user" => ['titre_typuser'=>"Type 1", 'id'=>2],
        "categorie_user" => ['titre_catuser'=>"Categorie 1", 'id'=>2]
    ];
    $commandes = Store::getCommandes();
    return view('commandes', compact("distributeur", "commandes"));
});

Route::get('/categorie_produit', function () {
    $categoriesProduit = Store::getCategoriesProduit();
    return view('categorie_produit', compact("categoriesProduit"));
});


Route::get('/produits', function () {
    $categoriesProduit = Store::getCategoriesProduit();
    $produits = Store::getProduits();
    return view('produit', compact("categoriesProduit", "produits"));
});

Route::get('/annonces', function () {
    $annonces = Store::getAnnonces();
    return view('annonce', compact("annonces"));
});

Route::get('/type_migration', function () {
    $typesMigrations = Store::getTypesMigration();
    return view('type_migration', compact("typesMigrations"));
});

Route::get('/migrations', function () {
    $distributeurs = Store::getDistributeurs();
    return view('migration', compact("distributeurs"));
});

Route::get('/migrations/{userId}', function () {
    $migrations = Store::getMigrations();
    $typesMigration = Store::getTypesMigration();
    $bureaux = Store::getBureaux();
    $distributeur = [
        "id_dist"=> 1,
        "nom_dist" => "Kamga",
        "prenom_dist" => "Rick",
        "matricule_dist" => "2303ED",
        "sexe_dist" => 1,
        "phone_dist" => 677229922,
        "mail_dist" => "mail@gmail.com",
        "datenaiss_dist" => "1992-02-16",
        "heritier_dist" => "202020FD",
        "ville" => ['titre_ville'=>'Douala', 'id'=>2],
        "type_user" => ['titre_typuser'=>"Type 1", 'id'=>2],
        "categorie_user" => ['titre_catuser'=>"Categorie 1", 'id'=>2]
    ];
    return view('migration_distributeur', compact("migrations", "typesMigration", "bureaux", "distributeur"));
});

Route::get('/requetes', function () {
    $requetes = Store::getRequetes();
    return view('requetes', compact("requetes"));
});

// MODIFIER TOUS LES ID POUR METRE LES BON (id => id_quart)