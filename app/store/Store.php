<?php
/**
 * Created by PhpStorm.
 * User: Ross
 * Date: 2/21/2020
 * Time: 11:24 PM
 */
namespace App\store;
class Store
{
    public static function getDistributeurs(){
        $distributeurs = [];
        for($i = 1; $i < 5;$i++){
            array_push($distributeurs, [
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
                "type_user" => ['titre_typuser'=>"Type $i", 'id'=>2],
                "categorie_user" => ['titre_catuser'=>"Categorie $i", 'id'=>2]
            ]);
        }
        return $distributeurs;
    }

    public static function getBureaux(){
        $bureaux = [];
        for($i = 1; $i < 5;$i++){
            array_push($bureaux, ['titre_bureau'=>"Bureau $i", 'id'=>2, 'type_bureau'=>['titre_typburr'=>"Bureau type $i", 'id'=>2],
                'quartier' => ['titre_quart'=>"Ndogpassi $i", 'id'=>2, 'ville'=>['titre_ville'=>'Douala', 'id'=>2]]]);
        }
        return $bureaux;
    }

    public static function getTypesBureau(){
        $typebureaux = [];
        for($i = 1; $i < 5;$i++){
            array_push($typebureaux, ['titre_typburr'=>"Bureau type $i", 'id'=>2]);
        }
        return $typebureaux;
    }

    public static function getVilles(){
        $villes = [];
        for($i = 1; $i < 5;$i++){
            array_push($villes, ['titre_ville'=>'Douala', 'id'=>2]);
        }
        return $villes;
    }

    public static function getQuartiers(){
        $quartiers = [];
        for($i = 1; $i < 5;$i++){
            array_push($quartiers, ['titre_quart'=>"Ndogpassi $i", 'id'=>2, 'ville'=>['titre_ville'=>'Douala', 'id'=>2]]);
        }
        return $quartiers;
    }

    public static function getCategoriesUser(){
        $categoriesUser = [];
        for($i = 1; $i < 5;$i++){
            array_push($categoriesUser, ['titre_catuser'=>"Categorie $i", 'id'=>2]);
        }
        return $categoriesUser;
    }

    public static function getCategoriesProduit(){
        $categoriesProduit = [];
        for($i = 1; $i < 5;$i++){
            array_push($categoriesProduit, ['titre_catpro'=>"Categorie $i", 'id_catpro'=>2,
                "categorie_produit" => ['titre_catpro'=>"Categorie parent $i", 'id_catpro'=>2]]);
        }
        return $categoriesProduit;
    }

    public static function getProduits(){
        $produits = [];
        for($i = 1; $i < 5;$i++){
            array_push($produits, ['nom_prod'=>"Produit $i", 'id_prod'=>2, "reference_prod"=>"282323ED",
            "description_prod"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, architecto aut consectetur cum, ducimus ea, facilis laboriosam laudantium molestiae non provident quia quidem sequi suscipit tempore. Atque, quibusdam, quos? Ratione.",
                "prix_prod"=>20000, "qtestock_prod"=> 10, "stockalerte_prod"=>2, "stockappro_prod"=>10,
                "categorie_produit" => ['titre_catpro'=>"Categorie parent $i", 'id_catpro'=>2]]);
        }
        return $produits;
    }

    public static function getTypesUser(){
        $typesUser = [];
        for($i = 1; $i < 5;$i++){
            array_push($typesUser, ['titre_typuser'=>"Type $i", 'id'=>2]);
        }
        return $typesUser;
    }

    public static function getTypesMigration(){
        $typesMigration = [];
        for($i = 1; $i < 5;$i++){
            array_push($typesMigration, ['titre_typmig'=>"Type n° $i", 'id_typmig'=>2]);
        }
        return $typesMigration;
    }

    public static function getMigrations(){
        $migrations = [];
        for($i = 1; $i < 5;$i++){
            array_push($migrations, ['rang_migrat'=>"VI", "type_migration"=>['titre_typmig'=>"Titre n° $i", 'id_typmig'=>2],
                "bureau"=> ['titre_bureau'=>"Bureau $i", 'id_bureau'=>2, 'type_bureau'=>['titre_typburr'=>"Bureau type $i", 'id'=>2],
                    'quartier' => ['titre_quart'=>"Ndogpassi $i", 'id'=>2, 'ville'=>['titre_ville'=>'Douala', 'id'=>2]]],
                "date_migrat"=> "22-01-2020",'id_migrat'=>2]);
        }
        return $migrations;
    }

    public static function getAnnonces(){
        $annonces = [];
        for($i = 1; $i < 5;$i++){
            array_push($annonces, ['titre_anno'=>"Titre $i", "media_anno" => "/assets/img/sidebar-3.jpg",
                "description_anno"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur explicabo id. Ab dolores doloribus eveniet fuga ipsam iure laborum nihil quae quam rem rerum, suscipit temporibus totam ut voluptate!", 'id_anno'=>2]);
        }
        return $annonces;
    }

    public static function getCommandes(){
        $commandes = [];
        for($i = 1; $i < 5;$i++){
            array_push($commandes, ["id_command"=>$i, 'date_command'=>"2020-02-20", "numero_command" => "0002234",
                "quantite_command"=>2, "montant_command"=>20000,"totalttc_command"=>20150 ,"etat_command" => 1, "mode_payement" => ['id_modpay'=>2, "titre_modpay"=>"Orange Money"]]);
        }
        return $commandes;
    }

    public static function getLigneCdes(){
        $commandes = [];
        $produit = ['nom_prod'=>"Produit 2", 'id_prod'=>2, "reference_prod"=>"282323ED",
            "description_prod"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, architecto aut consectetur cum, ducimus ea, facilis laboriosam laudantium molestiae non provident quia quidem sequi suscipit tempore. Atque, quibusdam, quos? Ratione.",
            "prix_prod"=>20000, "qtestock_prod"=> 10, "stockalerte_prod"=>2, "stockappro_prod"=>10,
            "categorie_produit" => ['titre_catpro'=>"Categorie parent 1", 'id_catpro'=>2]];
        for($i = 1; $i < 5;$i++){
            array_push($commandes, ["id_lcde"=>$i, 'qte_lcde'=>10, "pu_lcde" => 2000,
                "montant_lcde"=>20000, "reference_lcde"=>"EFL00023", "mode_payement" => ['id_modpay'=>2, "titre_modpay"=>"Orange Money",
                    ], "produits" => $produit]);
        }
        return $commandes;
    }

    public static function getRequetes(){
        $requetes = [];
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
        for($i = 1; $i < 10;$i++){
            array_push($requetes, ['titre_req'=>"Problème d'authentification $i",
                "description_req"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur explicabo id. Ab dolores doloribus eveniet fuga ipsam iure laborum nihil quae quam rem rerum, suscipit temporibus totam ut voluptate!",
                'id_req'=>2, "distributeur" => $distributeur]);
        }
        return $requetes;
    }
}