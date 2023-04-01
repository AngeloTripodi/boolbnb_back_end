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
                'title' => 'Condo in Montenapoleone',
                'description' => "Beautiful apartment in the center of Milan within the fashion district, just renovated with pieces of art and design.
                Ideal for a holiday or for work.
                double bedroom with extra comfort mattress and 4 pillows . TV, living room with fully equipped kitchen, TV and sofa.",
                'n_price' => 50,
                'image' => 'condo-in-montenapoleone.jpg',
                'latitude' => '45.468316',
                'longitude' => '9.195161',
                'address' => 'Via Monte Napoleone, Milano',
                'n_rooms' => 2,
                'n_beds' => 4,
                'n_bathrooms' => 1,
                'square_meters' => 100,
                'is_visible' => true,
            ],
            [
                'title' => 'Confort apartment Porta Genova',
                'description' => "You will be staying in the heart of Porta Genova, a bohemian neighborhood that stretches along the Naviglio Grande , boasts a rich selection of outdoor restaurants, pubs and aperitif bars. Convenient to get around with all the public transit nearby .",
                'n_price' => 67,
                'image' => 'porta-genova-mi.jpg',
                'latitude' => '45.453120',
                'longitude' => '9.170197',
                'address' => "Porta Genova, Milano",
                'n_rooms' => 2,
                'n_beds' => 2,
                'n_bathrooms' => 1,
                'square_meters' => 75,
                'is_visible' => true,
            ],
            [
                'title' => 'House outside Milan',
                'description' => "Apartment in a dream location for a romantic stay. Located on the top floor, this two-room apartment offers stunning views of the valley. The couple's jacuzzi, located in front of the panoramic window, is ideal for admiring the starry sky at night or to surprise you with the blue shades of the sky, at every hour of the day, while the private balcony is just perfect for a sunset aperitif. The apartment can accommodate up to 2 adults. Children are not allowed",
                'n_price' => 136,
                'image' => 'villa-outside-mi.jpg',
                'latitude' => '45.518903',
                'longitude' => '9.346972',
                'address' => 'VIa Guido Miglioli, Cernusco sul naviglio',
                'n_rooms' => 6,
                'n_beds' => 9,
                'n_bathrooms' => 4,
                'square_meters' => 320,
                'is_visible' => true,
            ],
            [
                'title' => 'Condo in Brera',
                'description' => "Stylish and refined super penthouse Sunrise to Sunset located on the renowned Via Manzoni. Ideal for short stays in the name of luxury and privacy. The space: direct entrance to the sleeping area, extra comfortable sofa bed with 20 cm mattress, folding technology to open and close in one movement.
                From the living/sleeping area you will have access to the kitchen equipped with microwave, coffee maker, kettle as well as a two-burner induction hob and everything you need to prepare your favorite meals. The kitchen connects to a small space with two armchairs. The solution makes the presence of two terraces unique: the main one served by comfortable seats thanks to the presence of several cushioned seats as well as a sofa two outdoor seats and a table with additional two chairs; the secondary one with an enchanting cathedral view is furnished with a two-seater wooden table. Please also contact us for information about the private parking in the area.",
                'n_price' => 56,
                'image' => 'brera-condo.jpg',
                'latitude' => '45.469299',
                'longitude' => '9.186868',
                'address' => 'Via ciovasso, Milano',
                'n_rooms' => 2,
                'n_beds' => 2,
                'n_bathrooms' => 1,
                'square_meters' => 50,
                'is_visible' => true,
            ],
            [
                'title' => "House near Piazza Vittorio & Mole Antonelliana",
                'description' => "Splendid penthouse with panoramic terrace at the seventh floor of an elegant building, fully equipped and fully furnished.Idea for short term rent. Welcome in Milan! The apartment has two bedrooms and two bathrooms. The second bedroom is equipped with a sofa bed. The living room is large and bright and the terrace has a splendid view over the city.",
                'n_price' => 49,
                'image' => 'apartment-city-life.jpg',
                'latitude' => '45.068812',
                'longitude' => '7.698370',
                'address' => 'Via Giulia di Barolo, Torino',
                'n_rooms' => 2,
                'n_beds' => 2,
                'n_bathrooms' => 1,
                'square_meters' => 100,
                'is_visible' => true,
            ],
            [
                'title' => "Dimora Natura-Riserva Naturale Valle di Bondo",
                'description' => "Natura è ciò che siamo. Soggiornare nella Riserva Naturale Valle di Bondo, tra ampi prati e verdi boschi che dominano il lago di Garda, è armonia. Lontani dalla folla, a 600m di altitudine, ma vicini alle sue spiagge, solo 9km, Tremosine sul Garda regala panorami mozzafiato, una cultura contadina e tanto sano sport. Pet-friendly significa che accettiamo gli animali, ma soprattutto che li amiamo.",
                'image' => 'dimora-natura.jpg',
                'n_price' => 77,
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
                'n_price' => 110,
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
                'n_price' => 115,
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
                'n_price' => 125,
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
                'n_price' => 35,
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
                'n_price' => 63,
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
            $newApartment->n_price = $apartment['n_price'];
            $newApartment->save();
            $newApartment->slug = $newApartment->slug . "-$newApartment->id";
            $newApartment->update();
        }
    }
}
