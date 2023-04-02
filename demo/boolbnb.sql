-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 02, 2023 at 09:30 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boolbnb`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `n_price` double(8,2) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double(10,8) NOT NULL DEFAULT '0.00000000',
  `longitude` double(11,8) NOT NULL DEFAULT '0.00000000',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_rooms` tinyint(3) UNSIGNED NOT NULL,
  `n_beds` tinyint(3) UNSIGNED NOT NULL,
  `n_bathrooms` tinyint(3) UNSIGNED NOT NULL,
  `square_meters` smallint(5) UNSIGNED NOT NULL,
  `is_visible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `user_id`, `slug`, `title`, `description`, `n_price`, `image`, `latitude`, `longitude`, `address`, `n_rooms`, `n_beds`, `n_bathrooms`, `square_meters`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 3, 'condo-in-montenapoleone-1', 'Condo in Montenapoleone', 'Beautiful apartment in the center of Milan within the fashion district, just renovated with pieces of art and design.\r\n                Ideal for a holiday or for work.\r\n                double bedroom with extra comfort mattress and 4 pillows . TV, living room with fully equipped kitchen, TV and sofa.', 50.00, 'condo-in-montenapoleone.jpg', 45.46831600, 9.19516100, 'Via Monte Napoleone, Milano', 2, 4, 1, 100, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(2, 3, 'confort-apartment-porta-genova-2', 'Confort apartment Porta Genova', 'You will be staying in the heart of Porta Genova, a bohemian neighborhood that stretches along the Naviglio Grande , boasts a rich selection of outdoor restaurants, pubs and aperitif bars. Convenient to get around with all the public transit nearby .', 67.00, 'porta-genova-mi.jpg', 45.45312000, 9.17019700, 'Porta Genova, Milano', 2, 2, 1, 75, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(3, 3, 'house-outside-milan-3', 'House outside Milan', 'Apartment in a dream location for a romantic stay. Located on the top floor, this two-room apartment offers stunning views of the valley. The couple\'s jacuzzi, located in front of the panoramic window, is ideal for admiring the starry sky at night or to surprise you with the blue shades of the sky, at every hour of the day, while the private balcony is just perfect for a sunset aperitif. The apartment can accommodate up to 2 adults. Children are not allowed', 136.00, 'villa-outside-mi.jpg', 45.51890300, 9.34697200, 'VIa Guido Miglioli, Cernusco sul naviglio', 6, 9, 4, 320, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(4, 3, 'condo-in-brera-4', 'Condo in Brera', 'Stylish and refined super penthouse Sunrise to Sunset located on the renowned Via Manzoni. Ideal for short stays in the name of luxury and privacy. The space: direct entrance to the sleeping area, extra comfortable sofa bed with 20 cm mattress, folding technology to open and close in one movement.\r\n                From the living/sleeping area you will have access to the kitchen equipped with microwave, coffee maker, kettle as well as a two-burner induction hob and everything you need to prepare your favorite meals. The kitchen connects to a small space with two armchairs. The solution makes the presence of two terraces unique: the main one served by comfortable seats thanks to the presence of several cushioned seats as well as a sofa two outdoor seats and a table with additional two chairs; the secondary one with an enchanting cathedral view is furnished with a two-seater wooden table. Please also contact us for information about the private parking in the area.', 56.00, 'brera-condo.jpg', 45.46929900, 9.18686800, 'Via ciovasso, Milano', 2, 2, 1, 50, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(5, 3, 'house-near-piazza-vittorio-mole-antonelliana-5', 'House near Piazza Vittorio & Mole Antonelliana', 'Splendid penthouse with panoramic terrace at the seventh floor of an elegant building, fully equipped and fully furnished.Idea for short term rent. Welcome in Milan! The apartment has two bedrooms and two bathrooms. The second bedroom is equipped with a sofa bed. The living room is large and bright and the terrace has a splendid view over the city.', 49.00, 'apartment-city-life.jpg', 45.06881200, 7.69837000, 'Via Giulia di Barolo, Torino', 2, 2, 1, 100, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(6, 3, 'dimora-natura-riserva-naturale-valle-di-bondo-6', 'Dimora Natura-Riserva Naturale Valle di Bondo', 'Natura è ciò che siamo. Soggiornare nella Riserva Naturale Valle di Bondo, tra ampi prati e verdi boschi che dominano il lago di Garda, è armonia. Lontani dalla folla, a 600m di altitudine, ma vicini alle sue spiagge, solo 9km, Tremosine sul Garda regala panorami mozzafiato, una cultura contadina e tanto sano sport. Pet-friendly significa che accettiamo gli animali, ma soprattutto che li amiamo.', 77.00, 'dimora-natura.jpg', 45.76420000, 10.74080000, 'Piazza Guglielmo Marconi, 1, Tremosine sul Garda, Brescia, Italia', 4, 4, 2, 60, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(7, 3, 'masseria-del-paradiso-7', 'Masseria del Paradiso', 'Il mio alloggio è situato in centro Sicilia, immerso nella campagna dell\'entroterra Siciliano.\r\n                Se cerchi un alloggio dove rilassarti, lontano dal frastuono della città, intimo, dove respirare aria pulita e goderti i colori e i profumi della nostra bella isola, allora il mio alloggio è perfetto per te!\r\n                E\' adatto a coppie, avventurieri solitari e famiglie con bambini ed essendo situato al centro dell\'isola, offre una comoda soluzione per chi vuole raggiungere tutte le parti della Sicilia.', 110.00, 'masseria-del-paradiso.jpg', 37.43680000, 14.07690000, 'Contrada Roccella, SS122, Roccella, Caltanissetta, Italia', 5, 3, 2, 80, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(8, 3, 'classy-downtown-apartment-milan-8', 'Classy downtown apartment, Milan', 'Bright, completely renovated 100 m2 apartment, furnished in a modern style and equipped with every comfort.\r\n                It is located in a quiet area just a few minutes walk from the historic centre. The large living room is elegantly furnished and has\r\n                of a comfortable sofa, a flat screen TV and a dining area with a solid wood table. The modern and fully equipped kitchen\r\n                it is equipped with a fridge, freezer, oven, hob and dishwasher. The two bedrooms are spacious and comfortable,\r\n                both equipped with double beds with high quality mattresses and spacious wardrobes. The bathroom has been recently remodeled\r\n                and is equipped with a large shower, a modern sink and a WC. Furthermore, the apartment has a washing machine, a hair dryer,\r\n                an iron and a high-speed Wi-Fi connection. Ideal for a family or a group of friends who want to spend a\r\n                unforgettable holiday in the beautiful city of Milan.', 115.00, 'appartamento-elegante-vicino-al-centro.jpg', 45.47890000, 9.22540000, 'Via Verdi 12, Milano', 5, 2, 1, 100, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(9, 3, 'apartment-gorgeous-view-9', 'Apartment gorgeous view', 'Large 150 m2 apartment with a spectacular view of the city and the surrounding mountains. It has a large equipped terrace and private parking. Located in a quiet and well served residential area, the apartment has been recently renovated and furnished in a modern and elegant style. The large living room is bright and welcoming, with a large window offering a breathtaking view of the city. The dining area features a large solid wood table and comfortable upholstered chairs. The modern and fully equipped kitchen comes with all necessary appliances including a fridge, freezer, oven, hob and dishwasher. The three bedrooms are spacious and comfortable, all featuring double beds with high quality mattresses and large wardrobes. The two bathrooms have been recently refurbished and are equipped with a shower, modern sink and WC. Furthermore, the apartment has a washing machine, a hair dryer, an iron and a high-speed Wi-Fi connection. Ideal for a family or a group of friends who want to spend an unforgettable holiday in the splendid city of Trento.', 125.00, 'appartamento-panoramico-con-terrazza.jpg', 46.06630000, 11.11660000, 'Via dei Tigli 22, Trento', 6, 3, 2, 150, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(10, 3, 'cozy-tiny-apartment-10', 'Cozy tiny apartment', 'Spacious and bright 80m2 apartment with 2 bedrooms and 2 bathrooms. Ideal for families or groups of friends who wish to stay in a quiet but well-served area. The apartment is located on the second floor of a modern building and consists of a large living room with dining area and fully equipped kitchenette, 2 double bedrooms with built-in wardrobes, 2 modern bathrooms with shower and a balcony overlooking the city . The apartment is tastefully furnished and equipped with every comfort, including air conditioning, flat screen TV, washing machine, dryer, iron, ironing board, hair dryer and high speed Wi-Fi connection. The location of the apartment is ideal for reaching the historic center of the city in just a few minutes, as well as the main shopping centers and green areas. An excellent choice for those who want a comfortable and relaxing stay.', 35.00, 'monolocale-accogliente-in-centro.jpg', 41.90280000, 12.49640000, 'Via del Corso 10, Roma', 2, 1, 1, 30, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(11, 3, 'sea-view-apartment-11', 'Sea view apartment', 'Delightful 50m2 one bedroom apartment with private terrace and panoramic view of the city. The apartment is located on the fourth floor of a historic building in the heart of the historic centre, a few steps from the main monuments and museums of the city. The apartment has been recently renovated and tastefully furnished, maintaining the original features of the building, such as the exposed wooden beams and the terracotta floor. The apartment consists of a living room with fully equipped kitchenette, a double bedroom and a modern bathroom with shower. The living room leads directly to the private terrace, equipped with table, chairs and deck chairs, ideal for enjoying the view over the city and relaxing in the sun. The apartment is equipped with air conditioning, flat screen TV, washing machine, hairdryer and high speed Wi-Fi connection. The location of the apartment is ideal for discovering the charm of the city on foot, strolling through the narrow streets of the historic center and savoring the local cuisine in the numerous restaurants and trattorias in the area. An unforgettable experience for those who want to experience the city in an authentic and romantic way.', 63.00, 'appartamento-con-vista-sul-mare.jpg', 43.73840000, 10.45140000, 'Via della Spiaggia 8, Livorno', 4, 2, 1, 80, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(12, 3, 'elegant-house-in-tortona-area-12', 'Elegant house in Tortona area', 'Elegant and refined apartment in the heart of Via Savona, one of the most fashionable and trendy areas of Milan, characterized by stores, trendy clubs, art galleries and restaurants with Italian and international cuisine. Opposite Mudec, a stone\'s throw from the Navigli and a few minutes from the Duomo, you\'ll be staying in a typical Milanese house, you\'ll be in the heart of the city, in one of the most served, vibrant and cosmopolitan areas of all Milan.', 132.00, 'appartamento-tortona.jpg', 45.45207600, 9.16380700, 'Via Tortona 27, Milano', 5, 4, 2, 95, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(13, 3, 'pop-studiotiny-and-cute-few-minutes-by-navigli-13', 'PoP Studio,tiny and cute-few minutes by Navigli', 'Tiny but cozy and joyful flat studio facing the Naviglio Canal,only few minutes of tram by the heart of Naviglia/Darsena. Small but cozy Flat Studio in front of Naviglio(canal)in Via Lodovico il Moro,10 minutes by tram from the hear of city mondanity,Navigli,and the new renovated old port of Milan,\'Darsena\',that became again the favourite area of tourists and citizen for taking a walk outside,cause of many events,all the nice bar and restaurants happening there. The flat is full of colours to transfer you some more joyness and good vibrations.It\'s pretty small(30mq),but you got everything you will need you in short stay,from kitchen to waching machine ecc.', 132.00, 'appartamento-navigli.jpg', 45.44486220, 9.14307000, 'Via Lodovico il Moro, Milano', 5, 4, 2, 95, 1, '2023-04-02 19:27:50', '2023-04-02 19:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_service`
--

CREATE TABLE `apartment_service` (
  `apartment_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apartment_service`
--

INSERT INTO `apartment_service` (`apartment_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 7, NULL, NULL),
(1, 11, NULL, NULL),
(1, 12, NULL, NULL),
(1, 14, NULL, NULL),
(2, 2, NULL, NULL),
(2, 4, NULL, NULL),
(2, 7, NULL, NULL),
(2, 8, NULL, NULL),
(2, 9, NULL, NULL),
(3, 1, NULL, NULL),
(3, 3, NULL, NULL),
(3, 7, NULL, NULL),
(3, 10, NULL, NULL),
(3, 13, NULL, NULL),
(4, 1, NULL, NULL),
(4, 3, NULL, NULL),
(4, 6, NULL, NULL),
(4, 9, NULL, NULL),
(4, 12, NULL, NULL),
(5, 2, NULL, NULL),
(5, 6, NULL, NULL),
(5, 9, NULL, NULL),
(5, 12, NULL, NULL),
(5, 14, NULL, NULL),
(6, 2, NULL, NULL),
(6, 3, NULL, NULL),
(6, 5, NULL, NULL),
(6, 13, NULL, NULL),
(6, 14, NULL, NULL),
(7, 5, NULL, NULL),
(7, 7, NULL, NULL),
(7, 10, NULL, NULL),
(7, 13, NULL, NULL),
(7, 14, NULL, NULL),
(8, 1, NULL, NULL),
(8, 2, NULL, NULL),
(8, 3, NULL, NULL),
(8, 5, NULL, NULL),
(8, 14, NULL, NULL),
(9, 1, NULL, NULL),
(9, 6, NULL, NULL),
(9, 8, NULL, NULL),
(9, 9, NULL, NULL),
(9, 10, NULL, NULL),
(10, 3, NULL, NULL),
(10, 7, NULL, NULL),
(10, 8, NULL, NULL),
(10, 10, NULL, NULL),
(10, 12, NULL, NULL),
(11, 1, NULL, NULL),
(11, 5, NULL, NULL),
(11, 9, NULL, NULL),
(11, 11, NULL, NULL),
(11, 14, NULL, NULL),
(12, 1, NULL, NULL),
(12, 5, NULL, NULL),
(12, 6, NULL, NULL),
(12, 7, NULL, NULL),
(12, 10, NULL, NULL),
(13, 1, NULL, NULL),
(13, 3, NULL, NULL),
(13, 6, NULL, NULL),
(13, 9, NULL, NULL),
(13, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apartment_sponsorship`
--

CREATE TABLE `apartment_sponsorship` (
  `apartment_id` bigint(20) UNSIGNED NOT NULL,
  `sponsorship_id` bigint(20) UNSIGNED NOT NULL,
  `starting_date` datetime DEFAULT NULL,
  `ending_date` datetime DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apartment_sponsorship`
--

INSERT INTO `apartment_sponsorship` (`apartment_id`, `sponsorship_id`, `starting_date`, `ending_date`, `id`, `created_at`, `updated_at`) VALUES
(8, 1, '2011-07-15 05:42:20', '2023-04-09 21:27:50', 1, NULL, NULL),
(2, 3, '1989-10-07 15:14:07', '2023-04-09 21:27:50', 2, NULL, NULL),
(4, 3, '2011-08-03 18:58:42', '2023-04-09 21:27:50', 3, NULL, NULL),
(7, 3, '1999-04-22 01:40:19', '2023-04-09 21:27:50', 4, NULL, NULL),
(10, 1, '1995-07-03 05:15:09', '2023-04-09 21:27:50', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `apartment_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `apartment_id`, `name`, `email`, `phone_number`, `message`, `created_at`, `updated_at`) VALUES
(1, 4, 'Paolo', 'paolo@gmail.com', '+393490005000', 'Salve, sono ammessi i cani?', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(2, 11, 'Anna', 'anna@gmail.com', NULL, 'Salve, è possibile avere uno sconto?', '2023-04-02 19:27:50', '2023-04-02 19:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_16_112656_add_columns_to_users_table', 1),
(6, '2023_03_16_143648_create_apartments_table', 1),
(7, '2023_03_16_150949_create_messages_table', 1),
(8, '2023_03_16_152725_create_stats_table', 1),
(9, '2023_03_16_161419_create_services_table', 1),
(10, '2023_03_16_161721_create_apartment_service_table', 1),
(11, '2023_03_16_162726_create_sponsorships_table', 1),
(12, '2023_03_16_163159_create_apartment_sponsorship_table', 1),
(13, '2023_03_16_164822_add_apartment_id_column_to_messages_table', 1),
(14, '2023_03_16_165311_add_user_id_to_apartments_table', 1),
(15, '2023_03_16_165712_add_apartment_id_column_to_stats_table', 1),
(16, '2023_04_01_073457_add_n_price_column_to_apartments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'wi-fi', 'wi-fi', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(2, 'parking', 'parking', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(3, 'pool', 'pool', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(4, 'reception', 'reception', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(5, 'self-check-in', 'self check in', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(6, 'free-cancellation', 'free cancellation', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(7, 'hair-dryer', 'hair dryer', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(8, 'shower-gel', 'shower gel', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(9, 'essentials', 'essentials', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(10, 'iron', 'iron', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(11, 'air-conditioning', 'air conditioning', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(12, 'refrigerator', 'refrigerator', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(13, 'cooking-basics', 'cooking basics', '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(14, 'lockbox', 'lockbox', '2023-04-02 19:27:50', '2023-04-02 19:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `sponsorships`
--

CREATE TABLE `sponsorships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double(3,2) NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsorships`
--

INSERT INTO `sponsorships` (`id`, `price`, `name`, `duration`, `created_at`, `updated_at`) VALUES
(1, 2.99, 'basic', 24, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(2, 5.99, 'premium', 72, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(3, 9.99, 'elite', 144, '2023-04-02 19:27:50', '2023-04-02 19:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `apartment_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_view` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `date_of_birth`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Angelo', 'Tripodi', '1994-05-07', 'angelo@boolbnb.com', NULL, '$2y$10$Lote.CqM8e0AcBMeIwkozOekGvLZErFr/byXlFP/slvnvkfbxY34K', NULL, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(2, 'Tizio', 'Caio', '1998-01-01', 'tizio@boolbnb.com', NULL, '$2y$10$GI1VTZeIITeVZVIsxeKKTOUPOw77MLpXxieNZf/KKGIL8wbGNooiK', NULL, '2023-04-02 19:27:50', '2023-04-02 19:27:50'),
(3, 'Monica', 'De Bona', '1991-09-11', 'm.debona@boolbnb.com', NULL, '$2y$10$Q7dzkLOPiaN7SPdp0g6.QOpvt4UzcXaqKscWF2T9P/wvy.wd1CPve', NULL, '2023-04-02 19:27:50', '2023-04-02 19:27:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartments_user_id_foreign` (`user_id`);

--
-- Indexes for table `apartment_service`
--
ALTER TABLE `apartment_service`
  ADD PRIMARY KEY (`apartment_id`,`service_id`),
  ADD KEY `apartment_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `apartment_sponsorship`
--
ALTER TABLE `apartment_sponsorship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_sponsorship_apartment_id_foreign` (`apartment_id`),
  ADD KEY `apartment_sponsorship_sponsorship_id_foreign` (`sponsorship_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_apartment_id_foreign` (`apartment_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsorships`
--
ALTER TABLE `sponsorships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stats_apartment_id_foreign` (`apartment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `apartment_sponsorship`
--
ALTER TABLE `apartment_sponsorship`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sponsorships`
--
ALTER TABLE `sponsorships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartments`
--
ALTER TABLE `apartments`
  ADD CONSTRAINT `apartments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apartment_service`
--
ALTER TABLE `apartment_service`
  ADD CONSTRAINT `apartment_service_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apartment_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apartment_sponsorship`
--
ALTER TABLE `apartment_sponsorship`
  ADD CONSTRAINT `apartment_sponsorship_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apartment_sponsorship_sponsorship_id_foreign` FOREIGN KEY (`sponsorship_id`) REFERENCES `sponsorships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `stats_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
