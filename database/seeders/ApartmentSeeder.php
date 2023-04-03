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
                'title' => 'Classy downtown apartment, Milan',
                'description' => "Bright, completely renovated 100 m2 apartment, furnished in a modern style and equipped with every comfort.
                It is located in a quiet area just a few minutes walk from the historic centre. The large living room is elegantly furnished and has
                of a comfortable sofa, a flat screen TV and a dining area with a solid wood table. The modern and fully equipped kitchen
                it is equipped with a fridge, freezer, oven, hob and dishwasher. The two bedrooms are spacious and comfortable,
                both equipped with double beds with high quality mattresses and spacious wardrobes. The bathroom has been recently remodeled
                and is equipped with a large shower, a modern sink and a WC. Furthermore, the apartment has a washing machine, a hair dryer,
                an iron and a high-speed Wi-Fi connection. Ideal for a family or a group of friends who want to spend a
                unforgettable holiday in the beautiful city of Milan.",
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
                'title' => 'Apartment gorgeous view',
                'description' => "Large 150 m2 apartment with a spectacular view of the city and the surrounding mountains. It has a large equipped terrace and private parking. Located in a quiet and well served residential area, the apartment has been recently renovated and furnished in a modern and elegant style. The large living room is bright and welcoming, with a large window offering a breathtaking view of the city. The dining area features a large solid wood table and comfortable upholstered chairs. The modern and fully equipped kitchen comes with all necessary appliances including a fridge, freezer, oven, hob and dishwasher. The three bedrooms are spacious and comfortable, all featuring double beds with high quality mattresses and large wardrobes. The two bathrooms have been recently refurbished and are equipped with a shower, modern sink and WC. Furthermore, the apartment has a washing machine, a hair dryer, an iron and a high-speed Wi-Fi connection. Ideal for a family or a group of friends who want to spend an unforgettable holiday in the splendid city of Trento.",
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
                'title' => 'Cozy tiny apartment',
                'description' => "Spacious and bright 80m2 apartment with 2 bedrooms and 2 bathrooms. Ideal for families or groups of friends who wish to stay in a quiet but well-served area. The apartment is located on the second floor of a modern building and consists of a large living room with dining area and fully equipped kitchenette, 2 double bedrooms with built-in wardrobes, 2 modern bathrooms with shower and a balcony overlooking the city . The apartment is tastefully furnished and equipped with every comfort, including air conditioning, flat screen TV, washing machine, dryer, iron, ironing board, hair dryer and high speed Wi-Fi connection. The location of the apartment is ideal for reaching the historic center of the city in just a few minutes, as well as the main shopping centers and green areas. An excellent choice for those who want a comfortable and relaxing stay.",
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
                'title' => 'Sea view apartment',
                'description' => "Delightful 50m2 one bedroom apartment with private terrace and panoramic view of the city. The apartment is located on the fourth floor of a historic building in the heart of the historic centre, a few steps from the main monuments and museums of the city. The apartment has been recently renovated and tastefully furnished, maintaining the original features of the building, such as the exposed wooden beams and the terracotta floor. The apartment consists of a living room with fully equipped kitchenette, a double bedroom and a modern bathroom with shower. The living room leads directly to the private terrace, equipped with table, chairs and deck chairs, ideal for enjoying the view over the city and relaxing in the sun. The apartment is equipped with air conditioning, flat screen TV, washing machine, hairdryer and high speed Wi-Fi connection. The location of the apartment is ideal for discovering the charm of the city on foot, strolling through the narrow streets of the historic center and savoring the local cuisine in the numerous restaurants and trattorias in the area. An unforgettable experience for those who want to experience the city in an authentic and romantic way.",
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
            ],
            [
                'title' => 'Elegant house in Tortona area',
                'description' => "Elegant and refined apartment in the heart of Via Savona, one of the most fashionable and trendy areas of Milan, characterized by stores, trendy clubs, art galleries and restaurants with Italian and international cuisine. Opposite Mudec, a stone's throw from the Navigli and a few minutes from the Duomo, you'll be staying in a typical Milanese house, you'll be in the heart of the city, in one of the most served, vibrant and cosmopolitan areas of all Milan.",
                'n_price' => 132,
                'image' => 'appartamento-tortona.jpg',
                'latitude' => '45.452076',
                'longitude' => '9.163807',
                'address' => 'Via Tortona 27, Milano',
                'n_rooms' => 5,
                'n_beds' => 4,
                'n_bathrooms' => 2,
                'square_meters' => 95,
                'is_visible' => true
            ],
            [
                'title' => 'PoP Studio,tiny and cute-few minutes by Navigli',
                'description' => "Tiny but cozy and joyful flat studio facing the Naviglio Canal,only few minutes of tram by the heart of Naviglia/Darsena. Small but cozy Flat Studio in front of Naviglio(canal)in Via Lodovico il Moro,10 minutes by tram from the hear of city mondanity,Navigli,and the new renovated old port of Milan,'Darsena',that became again the favourite area of tourists and citizen for taking a walk outside,cause of many events,all the nice bar and restaurants happening there. The flat is full of colours to transfer you some more joyness and good vibrations.It's pretty small(30mq),but you got everything you will need you in short stay,from kitchen to waching machine ecc.",
                'n_price' => 132,
                'image' => 'appartamento-navigli.jpg',
                'latitude' => '45.4448622',
                'longitude' => '9.143070',
                'address' => 'Via Lodovico il Moro, Milano',
                'n_rooms' => 5,
                'n_beds' => 4,
                'n_bathrooms' => 2,
                'square_meters' => 95,
                'is_visible' => true
            ],


        ];

        foreach ($apartments as $apartment) {

            $newApartment = new Apartment();
            // $newApartment->user_id = FACCIAMOLO!
            // $newApartment->user_id = User::inRandomOrder()->first()->id;
            $newApartment->user_id = User::where('email', 'm.debona@boolbnb.com')->first()->id;
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
