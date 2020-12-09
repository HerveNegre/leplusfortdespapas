<?php

use App\Product;
use Illuminate\Database\Seeder;
use App\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'        => 'Thermomètre de bain Raton Laveur',
            'slug'        => 'raton',
            'details'     => 'Thermomètre de bain avec témoin d\'alerte et écran d\'affichage',
            'price'       => 11.99,
            'description' => 'Le thermomètre de bain Raton laveur de la marque Badabulle est indispensable pour donner son bain à bébé en toute sécurité ! 
            Vous serez alerté si l\'eau est trop chaude ou trop froide afin d\'éviter les accidents. 
            - 2 en 1 : peut indiquer la température ambiante ou la température de l\'eau.
            - Haute précision.
            - Alerte de température si l\'eau est trop chaude ou trop froide.
            - Affichage digital.
            - Batterie longue durée de 2 ans (à raison de 30 minutes d\'utilisation par jour).
            - Angles arrondis et matière souple : pas de risque de blessure.
            - Sans phtalates.
            Dimensions : 15 x 3 x 20 cm',
            'category_id' => Category::all()->random()->id,
            'image'       => 'thermom_racoon.jpg',
        ]);
        Product::create([
            'name'        => 'Baignoire économique',
            'slug'        => 'baignoire',
            'details'     => 'Baignoire économe et sécurisée',
            'price'       => 35,
            'description' => 'Utilisable de la naissance jusqu\'à ses 1 an environ, elle soutiendra bébé en place grâce à l\'assise lui permettant de se sentir en sécurité pendant son bain.
            Son petit volume permet de la remplir avec très peu d’eau (2 litres minimum).
            Dossier en mousse pour plus de confort
            Pied en maoutchouc pour ne pas glisser
            Taille compacte pour s\'adapter à la plupart des éviers, baignoires et douches
            Assise en bosse pour aider à soutenir bébé dans l\'eau
            Dimensions : L. 34 x l. 25,5 x H. 35 cm',
            'category_id' => Category::all()->random()->id,
            'image'       => 'baignoire.jpg',
        ]);
        Product::create([
            'name'        => 'Baby Phone Numérique',
            'slug'        => 'babyphone',
            'details'     => 'Moniteur de vidéo surveillance", ',
            'price'       => 146.99,
            'description' => 'Permet de maintenir en permanence une connexion privée et sécurisée avec votre bébé. Écoutez-le en bénéficiant d\'une excellente qualité sonore et regardez-le sur un écran offrant une image ultra-nette (LCD 2,7"), de jour comme de nuit.
            Sensibilité sonore réglable
            Compatible Android, iOS, tablette 
            Vision nocturne infrarouge automatique 
            Autonomie de la batterie, unité-parents : Jusqu\'à 10 heures
            Portée intérieure jusqu\'à 50 m
            Portée extérieure jusqu\'à 300 m',
            'category_id' => Category::all()->random()->id,
            'image'       => 'babyphone.jpeg',
        ]);
        Product::create([
            'name'        => 'Chancelière',
            'slug'        => 'chanceliere',
            'details'     => 'Chancelière 6/12 Mois',
            'price'       => 65.99,
            'description' => 'Protège du vent, du froid et entoure votre bébé de douceur. 
            Cette couverture ergonomique multi-usages s\'adapte partout, dans un siège auto, une nacelle, un porte-bébé, un transat ou tout simplement dans vos bras !  
            Elle permet d\'emmitoufler bébé rapidement et facilement. 
            Elle allie protection grâce à sa matière déperlante, chaleur et confort avec son garnissage Thermolite et sa doublure en fourrure synthétique polaire. 
            Ultra pratique dans tous vos déplacements, le Babynomade Tendresse est adapté dès la sortie de la maternité.',
            'category_id' => Category::all()->random()->id,
            'image'       => 'chanceliere.jpeg',
        ]);
        Product::create([
            'name'        => 'Robot Multi fonction BabyCook',
            'slug'        => 'babycook',
            'details'     => 'Mixeur et Cuiseur vapeur',
            'price'       => 119.99,
            'description' => 'Pour une cuisine saine et équilibrée, 100% diversifiée en toute simplicité pour 100% de moments partagés avec bébé…
            1 bouton = 1 fonction
            4 appareils en 1: Chauffe-biberon, Stérilisateur, Cuiseur-vapeur, et Mixeur
            Evolutif: l\'unité de cuisson peut s\'utiliser seule (idéal avant la naissance et ensuite, pour toute la famille)
            Paniers, bols et accessoires passent au lave-vaisselle
            Plateaux et Couvercles en PP (sans BPA)
            Dimensions produit: 38 x 28 x 22 cm, Poids: 2,7 kg',
            'category_id' => Category::all()->random()->id,
            'image'       => 'babycook.jpeg',
        ]);
        Product::create([
            'name'        => 'Biberon 160 ml',
            'slug'        => 'biberon',
            'details'     => 'Biberon de 100 à 200 ml, Débit lent',
            'price'       => 7.99,
            'description' => 'Destiné aux nourrissons dès leur naissance. Toutefois, il sera également l\'accessoire idéal à un âge plus avancé, au moment de l\'instauration de l\'alternance à l\'allaitement.
            Grâce à son débit lent adapté aux nouveaux nés, il permet au petit d’apprendre à boire à son rythme, en toute décontraction et sans interruption, fidèle à la tétée naturelle. 
            De plus, MAMA l\'a équipé d\’un bouchon anti-fuite qui s\'avère idéal lorsqu\'il s\'agit d\'éviter un accident durant un transport ou lors de l\’agitation de la préparation.',
            'category_id' => Category::all()->random()->id,
            'image'       => 'biberon.jpeg',
        ]);
        Product::create([
            'name'        => 'Mouche Bébé électrique nomade',
            'slug'        => 'mouche_bébé',
            'details'     => 'Mouche bébé électrique évolutif',
            'price'       => 37.99,
            'description' => 'Age d\'utilisation : Dès la naissance
            - Mouche bébé évolutif : Accompagne l\’enfant dans sa croissance grâce à ses différents embouts.
            - Aspiration en quelques secondes : Facilité accrue en obstruant la narine opposée.
            - Embout nourrisson (0 à 3 mois) : Forme affinée .
            - Embout sécrétions normales et embout sécrétions épaisses : S\’adaptent à l\’évolution de l\’encombrement nasal de l’enfant.
            - Embout silicone : Matière souple et douce.
            - Tête amovible : Démontage et nettoyage facilités.
            - Accessoires : Pochette de rangement. 3 embouts évolutifs stérilisables. Un joint en silicone supplémentaire. 2 piles LR6 (AA) (fournies)',
            'category_id' => Category::all()->random()->id,
            'image'       => 'mouche_bébé.jpeg',
        ]);
        Product::create([
            'name'        => 'Ourson Dodo Nuit Etoilée',
            'slug'        => 'ourson',
            'details'     => 'Une veilleuse musicale avec variations de couleurs et capteur sonore',
            'price'       => 26.99,
            'description' => '
            Une veilleuse musicale avec variations de couleurs et capteur sonore
            Projection étoilée avec variations de couleurs (rouge, jaune, vert et bleu).
            Lorsque bébé se réveille et pleure, un capteur sonore déclenche automatiquement des mélodies
            Contenu très riche : 7 histoires, 12 sons de la nature, 60 mélodies et 3 berceuses.
            Minuterie de 15, 30 et 45 min.',
            'category_id' => Category::all()->random()->id,
            'image'       => 'oursonétoilé.jpg',
        ]);
        Product::create([
            'name'        => 'Set d\'accessoires promenade',
            'slug'        => 'promenade',
            'details'     => 'Ce coffret regroupe l’indispensable des accessoires promenade pour bébé',
            'price'       => 19.99,
            'description' => '- Un lot de 2 doubles crochets poussette
            - Un porte gobelet
            - Un lot de 2 pinces poussette, très pratique pour accrocher lange, couverture, doudou, sac…
            - Un support de téléphone poussette',
            'category_id' => Category::all()->random()->id,
            'image'       => 'set_accessoires_poussette.jpeg',
        ]);
        Product::create([
            'name'        => 'Cloisons isolantes phoniques',
            'slug'        => 'cloisons',
            'details'     => 'Panneaux de 25x25 cm, isolants du son',
            'price'       => 39.99,
            'description' => 'Panneaux de 25x25 cm, isolants le son, hypoallergénique, sans odeur, retardateur de flamme.
            Composition : 100% mousse polyurethane, une éponge anti bruit qui est très facile et rapide à installer. 
            Application parfaite sur plafond, mur, porte et autres surfaces.',
            'category_id' => Category::all()->random()->id,
            'image'       => 'cloisons_isophoniques.jpeg',
        ]);
        Product::create([
            'name'        => 'Trousse de soin bébé',
            'slug'        => 'trousse',
            'details'     => 'Neuf articles essentiels pour bébé regroupés dans une trousse pratique',
            'price'       => 20.99,
            'description' => 'Le kit contient 
            1 x thermomètre oral numérique*, 
            1 x brosse, 1 x peigne, 
            1 x paire de ciseaux, 
            1 x coupe-ongles, 
            2 x limes à ongles, 
            1 x brosse à dents, 
            1 x aspirateur nasal ',
            'category_id' => Category::all()->random()->id,
            'image'       => 'trousse_soin.jpeg',
        ]);
    }
}
