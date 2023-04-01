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
            // Milano
            [
                'title' => 'Condo in Montenapoleone',
                'description' => "Beautiful apartment in the center of Milan within the fashion district, just renovated with pieces of art and design.
                Ideal for a holiday or for work.
                double bedroom with extra comfort mattress and 4 pillows . TV, living room with fully equipped kitchen, TV and sofa.",
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
                'image' => 'mountain-milan.jpg',
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
                'description' => "Stylish and refined super penthouse Sunrise to Sunset located on the renowned Via Manzoni. Ideal for short stays in the name of luxury and privacy. The space: direct entrance to the sleeping area, extra comfortable sofa bed with 20 cm mattress, folding technology to open and close in one movement.From the living/sleeping area you will have access to the kitchen equipped with microwave, coffee maker, kettle as well as a two-burner induction hob and everything you need to prepare your favorite meals. The kitchen connects to a small space with two armchairs. The solution makes the presence of two terraces unique: the main one served by comfortable seats thanks to the presence of several cushioned seats as well as a sofa two outdoor seats and a table with additional two chairs; the secondary one with an enchanting cathedral view is furnished with a two-seater wooden table. Please also contact us for information about the private parking in the area.",
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
                'title' => 'Loft in Milan',
                'description' => "Very spacious and unique loft, fully renovated in 2023 from the urban regeneration of a dismissed distillery. You'll find a fully equipped kitchen, fast Wi-fi, a spacious bedroom with wardrobe. The living room has a very comfy sofa-bed with 75 home cinema. It's a perfect choice for couples, families or a group of friends. The area is very central and safe, only 5 minutes walking far from De Angeli M1 subway station. You can find free parking on nearby streets, or use a nearby parking garage",
                'image' => 'loft-milan.jpg',
                'latitude' => '45.466580', 
                'longitude' => '9.172382',
                'address' => 'Via caradosso, Milano',
                'n_rooms' => 6,
                'n_beds' => 10,
                'n_bathrooms' => 3,
                'square_meters' => 450,
                'is_visible' => true,
            ],
            // Torino
            [
                'title' => "House near Piazza Vittorio & Mole Antonelliana",
                'description' => "Splendid penthouse with panoramic terrace at the seventh floor of an elegant building, fully equipped and fully furnished.Idea for short term rent. Welcome in Milan! The apartment has two bedrooms and two bathrooms. The second bedroom is equipped with a sofa bed. The living room is large and bright and the terrace has a splendid view over the city.",
                'image' => 'house-near-turin.jpg',
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
                'title' => "Casa Cernaia in the center of Turin",
                'description' => "Natura è ciò che siamo. Soggiornare nella Riserva Naturale Valle di Bondo, tra ampi prati e verdi boschi che dominano il lago di Garda, è armonia. Lontani dalla folla, a 600m di altitudine, ma vicini alle sue spiagge, solo 9km, Tremosine sul Garda regala panorami mozzafiato, una cultura contadina e tanto sano sport. Pet-friendly significa che accettiamo gli animali, ma soprattutto che li amiamo.",
                'image' => 'casa-turin.jpg',
                'latitude' => '45.072002',
                'longitude' => '7.672758',
                'address' => 'Via cernaia, Torino',
                'n_rooms' => 2,
                'n_beds' => 2,
                'n_bathrooms' => 1,
                'square_meters' => 77,
                'is_visible' => true,
            ],
            [
                'title' => "Paolina apartment",
                'description' => "Apartment Paolina is located in the district of San Salvario. It is one of the greenest central districts of Turin. It is famous for its Art Nouveau and Baroque style buildings. A strategic location:100 meters from the metro station, 4 stops from the Porta Nuova central station, 5 minutes walk from the famous Valentino Park, very close to the main hospitals of Turin,and University of Turin. Fully equipped with various supermarkets, public transport, restaurants, cafes.",
                'image' => 'paolina-apt.jpg',
                'latitude' => '45.047245', 
                'longitude' => '7.674120',
                'address' => 'Corso Dante, Torino',
                'n_rooms' => 4,
                'n_beds' => 4,
                'n_bathrooms' => 1,
                'square_meters' => 130,
                'is_visible' => true,
            ],
            // Roma
            [
                'title' => 'A stone\'s throw from the Colosseum',
                'description' => "Located in the center of Rome, a 15-minute walk from the Colosseum, 150 m from Termini Station, and only 2 km from Piazza di Spagna and Trevi Fountain.
                From the apartment you can enjoy a breathtaking view of the beautiful Roman Aquarium, now the House of Architecture of Rome.
                Inside the Termini Station is the Central Market, where you can taste a wide variety of local cuisines with typical Italian dishes, but also international offerings.",
                'image' => 'piazza-manf-rome.jpg',
                'latitude' => '41.897683', 
                'longitude' => '12.502221',
                'address' => 'Piazza Manfredo Fanti, Roma',
                'n_rooms' => 5,
                'n_beds' => 2,
                'n_bathrooms' => 1,
                'square_meters' => 170,
                'is_visible' => true
            ],
            [
                'title' => 'Contemporary loft with brick vaults.',
                'description' => "Perfect for couples who want to relax after visiting the city, the apartment while being in the heart of Trastevere is extremely quiet because it overlooks a quiet inner courtyard. Air conditioning, shower and a large bathtub offer extreme comfort.
                The apartment is also equipped with a fridge, induction plate, microwave and hood,  and a large table for lunch or work.",
                'image' => 'loft-trast-rome.jpg',
                'latitude' => '41.883590',
                'longitude' => '12.469335',
                'address' => 'Viale di trastevere, Roma',
                'n_rooms' => 2,
                'n_beds' => 2,
                'n_bathrooms' => 1,
                'square_meters' => 50,
                'is_visible' => true
            ],
            [
                'title' => 'Alice Vatican Family Room with St. Peter\'s view',
                'description' => "My accommodation is a 5-minute walk from S. Pietro, 300 meters from the metro stop Ottaviano-S. Pietro that connects it to Termini Station, Colosseum and Piazza di Spagna,  Castel Sant'Angelo, Piazza Navona and Trevi Fountain, are reachable, instead also on foot, with a pleasant walk. We are in the Prati district, famous for shopping and tastings of all kinds.",
                'image' => 'vatican-rome.jpg',
                'latitude' => '41.906039', 
                'longitude' => '12.458891',
                'address' => 'Piazza risorgimento, Roma',
                'n_rooms' => 3,
                'n_beds' => 5,
                'n_bathrooms' => 1,
                'square_meters' => 140,
                'is_visible' => true
            ],
            [
                'title' => 'Lovely apartment via sistina',
                'description' => "In the heart of the historical centre of Rome, very close to Piazza di Spagna, Piazza Barberini and Via Veneto, penthouse apartment on the 5th floor which consists of: living room with French pull-out bed and single bed, kitchen corner (in a closet) with three electric burners and microwave, bathroom with tub, little terrace . The apartment has just been refurbished; it is extremely” fresh”, cosy and full of light. White walls and green tapestry. Parquet floor. The apartment is on the top floor with lift and it composed from large living room,one sofa bed for two people, one single bed, little kitchen, bathroom with tub and wonderful terrace to make a breakfast!",
                'image' => 'via-sistina-rome.jpg',
                'latitude' => '41.904820', 
                'longitude' => '12.485630',
                'address' => 'Via sistina, Roma',
                'n_rooms' => 3,
                'n_beds' => 3,
                'n_bathrooms' => 1,
                'square_meters' => 103,
                'is_visible' => true
            ],
            [
                'title' => 'Pantheon Glam 1 - Pantheon',
                'description' => "Recently renovated, the flat is furnished with parquet and modern furniture and it is equipped with air conditioning and wifi. The living room can be used as an extra bedroom (with 2 extra comfortable beds) so the apartment is well suited for families of 4 persons. It is located in a beautiful building of 1600 that overlooks the back of the Pantheon. The apartment has been recently renovated and consists of 1 bedroom, living area with 2 single beds, bathroom and kitchen (operational).
                It has WI-FI internet connection, TV, air conditioning, heating, telephone and safe.
                The cleaning of the apartment is included in the price so guests will NOT have to pay any additional cost at the time of check-out (the only extra to pay is the tourist tourist tax of € 3.50 per person, per day as per current municipal legislation). The apartment is on a quiet street behind the Pantheon in the city's historic center. Walk to the Colosseum, Piazza Navona, and the Trevi Fountain for atmospheric evenings. The area is full of bars, restaurants, and shops. You can easily reach the city's main attractions by walking.
                The area is full of bars, shops and restaurants.
                In case, we can also organize private transfers from/to the airport/port.",
                'image' => 'panth-rome.jpg',
                'latitude' => '41.898024', 
                'longitude' => ' 12.476437',
                'address' => 'Via della rotonda, Roma',
                'n_rooms' => 3,
                'n_beds' => 2,
                'n_bathrooms' => 1,
                'square_meters' => 93,
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
