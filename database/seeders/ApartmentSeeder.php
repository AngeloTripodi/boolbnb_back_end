<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $apartments = [
            [
                'title' => 'Elegante villa con piscina',
                'description' => "Casa vacanze immersa nel verde in una zona collinare lontana dal centro abitato. Fa parte di un grosso complesso storico edificato a partire dal XV secolo. Il contesto è prestigioso con ampi spazi, arredamento d'antiquariato e piscina. Lo spazio è disposto su due piani con accesso diretto al giardino. Gli spazi sono ampi con una grande cucina, una grande sala e un vasto patio dove mangiare in estate. La piscina è nella parte bassa del giardino a circa 20 metri dalla casa.",
                'image' => 'elegante-villa-con-piscina.jpg',
                'latitude' => '45.73162371',
                'longitude' => '9.4999649',
                'address' => 'Pontida, Lombardia, Italia',
                'n_rooms' => 8,
                'n_beds' => 12,
                'n_bathrooms' => 4,
                'square_meters' => 200,
                'is_visible' => true,
            ],
            [
                'title' => 'Appartamento con Vista sulle Dolomiti di Brenta',
                'description' => "La 'Casa Vacanze Orizzonti d'Anaunia' incorniciata dalle montagne del Brenta e dai prati coltivati a mele, si colloca al centro della Val di Non, nel tranquillo paese di Tassullo in provincia di Trento. L’edificio è nato agli inizi degli anni 30 come abitazione e attualmente ristrutturato e adibito all'ospitalità turistica.",
                'image' => 'appartamento-con-vista-sulle-dolomiti-di-brenta.jpg',
                'latitude' => '46.3274581',
                'longitude' => '11.02588072',
                'address' => "ville d'aunania, Trentino, Italia",
                'n_rooms' => 4,
                'n_beds' => 4,
                'n_bathrooms' => 1,
                'square_meters' => 75,
                'is_visible' => true,
            ],
            [
                'title' => 'TrivignoLife Ridente chalet in montagna',
                'description' => "Rilassati con tutta la famiglia in questo alloggio tranquillo.
                Trivigno 1700 m, vicino alla riserva naturale di Pian di Gembro, alle piste di sci ( Aprica) e al passo del Mortirolo, immerso nella natura tra boschi, prati e pascoli . Ampio giardino con posti auto , sauna finlandese, barbecue coperto , ampio soggiorno con camino , stufe a legna, soppalchi artigianali in legno, due balconi, due bagni , cucina , lavatrice.
                Un' esperienza incredibile in un contesto meraviglioso , provare per credere!",
                'image' => 'trivignolife-chalet.jpg',
                'latitude' => '46.219408',
                'longitude' => '10.166880',
                'address' => 'Via visoli, 16, Tirano',
                'n_rooms' => 6,
                'n_beds' => 9,
                'n_bathrooms' => 2,
                'square_meters' => 220,
                'is_visible' => true,
            ],
            [
                'title' => 'Riegelehof App 3',
                'description' => "Questo bellissimo appartamento si trova a Lajen ed è la sistemazione ideale per una vacanza rilassante. Si trova tra     Chiusa (Klausen) e Ortisei (St. Ulrich in Gröden).
                L'appartamento di 38 m² è composto da un soggiorno, una cucina ben attrezzata con lavastoviglie, 1 camera da letto e 1 bagno e può quindi ospitare 3 persone.
                I servizi aggiuntivi includono la connessione Wi-Fi.
                L'appartamento vacanze vanta un'area esterna privata con un balcone.",
                'image' => 'Riegelehof-App-3.jpg',
                'latitude' => '46.609165',
                'longitude' => '11.569198',
                'address' => 'Via Bergweg, 18, Laion',
                'n_rooms' => 3,
                'n_beds' => 2,
                'n_bathrooms' => 1,
                'square_meters' => 70,
                'is_visible' => true,
            ],
            [
                'title' => "Splendida Casa sull'Albero a Pochi Minuti da Firenze",
                'description' => "The TREEhouse is a romantic room immersed in the pine trees with fire place for the winter and AC for the summer. It offers a bedroom with a queen size bed, a small kitchenette with stove and fridge; a bathroom with shower, and a private outdoor terrace. And a fantastic view towards the Tuscan landscape!
                And if you want to see and know more about our passion for the interior design, the arts and crafts, and antiques you should come visit our design and make shop Riccardo Barthel in Via dei Serragli n. 234 r, in the Santo Spirito district of Florence!",
                'image' => 'casa-sull-albero.jpg',
                'latitude' => '43.7762',
                'longitude' => '11.2336',
                'address' => 'Via di Monteloro, 19, Firenze, Toscana, Italia',
                'n_rooms' => 2,
                'n_beds' => 2,
                'n_bathrooms' => 1,
                'square_meters' => 30,
                'is_visible' => true,
            ],
            [
                'title' => "Dimora Natura-Riserva Naturale Valle di Bondo",
                'description' => "Natura è ciò che siamo. Soggiornare nella Riserva Naturale Valle di Bondo, tra ampi prati e verdi boschi che dominano il lago di Garda, è armonia. Lontani dalla folla, a 600m di altitudine, ma vicini alle sue spiagge, solo 9km, Tremosine sul Garda regala panorami mozzafiato, una cultura contadina e tanto sano sport. Pet-friendly significa che accettiamo gli animali, ma soprattutto che li amiamo.",
                'image' => 'dimora-natura.jpg',
                'latitude' => '45.7642',
                'longitude' => '10.7408',
                'address' => 'Piazza Guglielmo Marconi, 1, Tremosine sul Garda, Brescia, Italia',
                'n_rooms' => 4,
                'n_beds' => 4,
                'n_bathrooms' => 2,
                'square_meters' => 60,
                'is_visible' => true,
            ],
            [
                'title' => "Masseria del Paradiso",
                'description' => "Il mio alloggio è situato in centro Sicilia, immerso nella campagna dell'entroterra Siciliano.
                Se cerchi un alloggio dove rilassarti, lontano dal frastuono della città, intimo, dove respirare aria pulita e goderti i colori e i profumi della nostra bella isola, allora il mio alloggio è perfetto per te!
                E' adatto a coppie, avventurieri solitari e famiglie con bambini ed essendo situato al centro dell'isola, offre una comoda soluzione per chi vuole raggiungere tutte le parti della Sicilia.",
                'image' => 'masseria-del-paradiso.jpg',
                'latitude' => '37.4368',
                'longitude' => '14.0769',
                'address' => 'Contrada Roccella, SS122, Roccella, Caltanissetta, Italia',
                'n_rooms' => 5,
                'n_beds' => 3,
                'n_bathrooms' => 2,
                'square_meters' => 80,
                'is_visible' => true,
            ],
            [
                'title' => 'Appartamento elegante vicino al centro',
                'description' => "Luminoso appartamento di 100 mq completamente ristrutturato, arredato con stile moderno e dotato di ogni comfort. 
                Si trova in una zona tranquilla a pochi minuti a piedi dal centro storico. L'ampio soggiorno è arredato con eleganza e dispone 
                di un comodo divano, una TV a schermo piatto e una zona pranzo con un tavolo in legno massello. La cucina moderna e completamente attrezzata 
                è dotata di frigorifero, freezer, forno, piano cottura e lavastoviglie. Le due camere da letto sono spaziose e confortevoli, 
                entrambe dotate di letti matrimoniali con materassi di alta qualità e armadi capienti. Il bagno è stato ristrutturato di recente 
                ed è dotato di una grande doccia, un lavabo moderno e un WC. Inoltre, l'appartamento dispone di una lavatrice, un asciugacapelli, 
                un ferro da stiro e una connessione Wi-Fi ad alta velocità. Ideale per una famiglia o un gruppo di amici che desidera trascorrere una 
                vacanza indimenticabile nella bellissima città di Milano.",
                'image' => 'appartamento-elegante-vicino-al-centro.jpg',
                'latitude' => '45.4789',
                'longitude' => '9.2254',
                'address' => 'Via Verdi 12, Milano',
                'n_rooms' => 5,
                'n_beds' => 2,
                'n_bathrooms' => 1,
                'square_meters' => 100,
                'is_visible' => true
            ],
            [
                'title' => 'Appartamento panoramico con terrazza',
                'description' => "Ampio appartamento di 150 mq con una spettacolare vista sulla città e sulle montagne circostanti. Dispone di una grande terrazza attrezzata e di un parcheggio privato. Situato in una zona residenziale tranquilla e ben servita, l'appartamento è stato ristrutturato di recente e arredato con stile moderno ed elegante. L'ampio soggiorno è luminoso e accogliente, con una grande finestra che offre una vista mozzafiato sulla città. La zona pranzo dispone di un grande tavolo in legno massello e di comode sedie imbottite. La cucina moderna e completamente attrezzata è dotata di tutti gli elettrodomestici necessari, tra cui un frigorifero, un freezer, un forno, un piano cottura e una lavastoviglie. Le tre camere da letto sono spaziose e confortevoli, tutte dotate di letti matrimoniali con materassi di alta qualità e di ampi armadi. I due bagni sono stati ristrutturati di recente e sono dotati di doccia, lavabo moderno e WC. Inoltre, l'appartamento dispone di una lavatrice, un asciugacapelli, un ferro da stiro e una connessione Wi-Fi ad alta velocità. Ideale per una famiglia o un gruppo di amici che desidera trascorrere una vacanza indimenticabile nella splendida città di Trento.",
                'image' => 'appartamento-panoramico-con-terrazza.jpg',
                'latitude' => '46.0663',
                'longitude' => '11.1166',
                'address' => 'Via dei Tigli 22, Trento',
                'n_rooms' => 6,
                'n_beds' => 3,
                'n_bathrooms' => 2,
                'square_meters' => 150,
                'is_visible' => true
            ],
            [
                'title' => 'Monolocale accogliente in centro',
                'description' => "Appartamento spazioso e luminoso di 80 mq con 2 camere da letto e 2 bagni. Ideale per famiglie o gruppi di amici che desiderano soggiornare in una zona tranquilla ma ben servita. L'appartamento si trova al secondo piano di un edificio moderno ed è composto da un ampio soggiorno con zona pranzo e angolo cottura completamente attrezzato, 2 camere da letto matrimoniali con armadi a muro, 2 bagni moderni con doccia e un balcone con vista sulla città. L'appartamento è arredato con gusto e dotato di ogni comfort, tra cui aria condizionata, TV a schermo piatto, lavatrice, asciugatrice, ferro da stiro, asse da stiro, asciugacapelli e connessione Wi-Fi ad alta velocità. La posizione dell'appartamento è ideale per raggiungere in pochi minuti il centro storico della città, nonché i principali centri commerciali e le aree verdi. Un'ottima scelta per chi desidera un soggiorno confortevole e rilassante.",
                'image' => 'monolocale-accogliente-in-centro.jpg',
                'latitude' => '41.9028',
                'longitude' => '12.4964',
                'address' => 'Via del Corso 10, Roma',
                'n_rooms' => 2,
                'n_beds' => 1,
                'n_bathrooms' => 1,
                'square_meters' => 30,
                'is_visible' => true
            ],
            [
                'title' => 'Appartamento con vista sul mare',
                'description' => "Delizioso bilocale di 50 mq con terrazzo privato e vista panoramica sulla città. L'appartamento è situato al quarto piano di un edificio storico nel cuore del centro storico, a pochi passi dai principali monumenti e musei della città. L'appartamento è stato recentemente ristrutturato e arredato con gusto, mantenendo le caratteristiche originali dell'edificio, come le travi in legno a vista e il pavimento in cotto. L'appartamento è composto da un soggiorno con angolo cottura completamente attrezzato, una camera da letto matrimoniale e un bagno moderno con doccia. Dal soggiorno si accede direttamente al terrazzo privato, attrezzato con tavolo, sedie e sdraio, ideale per godersi il panorama sulla città e rilassarsi al sole. L'appartamento è dotato di aria condizionata, TV a schermo piatto, lavatrice, asciugacapelli e connessione Wi-Fi ad alta velocità. La posizione dell'appartamento è ideale per scoprire il fascino della città a piedi, passeggiando tra i vicoli del centro storico e assaporando la cucina locale nei numerosi ristoranti e trattorie della zona. Un'esperienza indimenticabile per chi desidera vivere la città in modo autentico e romantico.",
                'image' => 'appartamento-con-vista-sul-mare.jpg',
                'latitude' => '43.7384',
                'longitude' => '10.4514',
                'address' => 'Via della Spiaggia 8, Livorno',
                'n_rooms' => 4,
                'n_beds' => 2,
                'n_bathrooms' => 1,
                'square_meters' => 80,
                'is_visible' => true
            ]

        ];

        foreach ($apartments as $apartment) {

            $newApartment = new Apartment();
            // $newApartment->user_id = FACCIAMOLO!
            $newApartment->user_id = User::inRandomOrder()->first()->id;
            $newApartment->title = $apartment['title'];
            $newApartment->slug = Str::slug($newApartment->title);
            $newApartment->description = $apartment['description'];
            $newApartment->image = $apartment['image'];
            $newApartment->latitude = $apartment['latitude'];
            $newApartment->longitude = $apartment['longitude'];
            $newApartment->address = $apartment['address'];
            $newApartment->n_rooms = $apartment['n_rooms'];
            $newApartment->n_beds = $apartment['n_beds'];
            $newApartment->n_bathrooms = $apartment['n_bathrooms'];
            $newApartment->square_meters = $apartment['square_meters'];
            $newApartment->is_visible = $apartment['is_visible'];
            $newApartment->save();
            $newApartment->slug = $newApartment->slug . "-$newApartment->id";
            $newApartment->update();
        }
    }
}
