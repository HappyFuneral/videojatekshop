-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Máj 07. 23:43
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `videojatekshop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_name` varchar(255) NOT NULL,
  `contract_owner` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `contract_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `contract_types`
--

CREATE TABLE `contract_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_13_201312_create_product_types_table', 1),
(7, '2024_03_13_210040_create_contract_types_table', 1),
(8, '2024_03_13_210042_create_publishers_table', 1),
(9, '2024_03_13_210043_create_products_table', 1),
(10, '2024_03_13_210050_create_contracts_table', 1),
(11, '2024_03_13_210130_create_order_states_table', 1),
(12, '2024_03_13_210131_create_orders_table', 1),
(13, '2024_03_13_210436_create_storages_table', 1),
(14, '2024_03_13_211421_create_storage_products_table', 1),
(15, '2024_03_13_212531_create_order_products_table', 1),
(16, '2024_03_27_093916_create_roles_table', 1),
(17, '2024_04_07_145750_add_role_id_users_table', 1),
(18, '2024_05_06_150719_create_platforms_table', 1),
(19, '2024_05_06_151158_add_platform_id_products_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_details` varchar(255) DEFAULT NULL,
  `postal` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `orderState_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `price`, `delivery_date`, `delivery_details`, `postal`, `country`, `province`, `city`, `address`, `orderState_id`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 18000, NULL, 'Foxpost', 1077, 'Magyarország', 'Pest', 'Budapest', 'Wesselényi utca 47', 5, '2024-05-07 14:55:39', '2024-05-07 18:24:45', NULL, 1, 1, NULL),
(2, 1, 18000, NULL, 'Foxpost', 1077, 'Magyarország', 'Pest', 'Budapest', 'Wesselényi utca 47', 2, '2024-05-07 14:56:58', '2024-05-07 14:56:58', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `storage_product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `storage_product_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, 3, '2024-05-07 14:55:39', '2024-05-07 14:55:39', NULL, NULL, NULL, NULL),
(2, 2, 1, 3, '2024-05-07 14:56:58', '2024-05-07 14:56:58', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_states`
--

CREATE TABLE `order_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `order_states`
--

INSERT INTO `order_states` (`id`, `state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Törölve', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(2, 'Megrendelve', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(3, 'Szállítás alatt', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(4, 'Félretéve', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(5, 'Kézbesítve', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(6, 'Megerősítve', '2024-05-07 18:19:48', '2024-05-07 18:19:48', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `platforms`
--

CREATE TABLE `platforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `platforms`
--

INSERT INTO `platforms` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'PC', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(2, 'Xbox 360', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(3, 'Xbox One', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(4, 'Play Station 4', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(5, 'Play Station 5', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(6, 'Nintendo Switch', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(7, 'Xbox Series', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `releaseDate` date NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `tariff_number` double NOT NULL,
  `tariff_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_type_id` bigint(20) UNSIGNED NOT NULL,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `platform_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `product_img`, `description`, `price`, `releaseDate`, `quantity`, `tariff_number`, `tariff_description`, `created_at`, `updated_at`, `product_type_id`, `publisher_id`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `platform_id`) VALUES
(1, '3307216100522', 'Far Cry New Dawn', 'product_farcrynewdawn_pc.jpg', 'A Far Cry 5 közvetlen folytatásában visszatérhetsz Hope County-ba, amit jórészt elpusztított egy atomcsapás. 17 évvel az események után a természet kezdi visszahódítani a tájat, amit elfajzott bandák uralnak összetákolt fegyvereikkel és járműveikkel. A nukleáris pusztaságban rajtad áll, hogy felvedd a harcot a legfélelmetesebb bandával, és békét hozz az emberek számára.\n            A Far Cry: New Dawn ugyanazt a nyílt világú játékmenetet és gyönyörű grafikát nyújtja, amit a sorozattól megszoktunk és megszerettünk. Mindezt a Ubisoft fejlesztői vadonatúj mechanikákkal, fantáziadús fegyverekkel és járművekkel dobták fel, és bemutatkozik számos új karakter is, de visszatérő arcokkal is találkozhatunk a Far Cry 5-ből. Ez a harc lesz a végső? Csak rajtad áll!', 6000, '2019-02-15', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 6, NULL, NULL, NULL, NULL, 1),
(2, '3307216100523', 'Far Cry New Dawn', 'product_farcrynewdawn_xboxone.jpg', 'A Far Cry 5 közvetlen folytatásában visszatérhetsz Hope County-ba, amit jórészt elpusztított egy atomcsapás. 17 évvel az események után a természet kezdi visszahódítani a tájat, amit elfajzott bandák uralnak összetákolt fegyvereikkel és járműveikkel. A nukleáris pusztaságban rajtad áll, hogy felvedd a harcot a legfélelmetesebb bandával, és békét hozz az emberek számára.\n            A Far Cry: New Dawn ugyanazt a nyílt világú játékmenetet és gyönyörű grafikát nyújtja, amit a sorozattól megszoktunk és megszerettünk. Mindezt a Ubisoft fejlesztői vadonatúj mechanikákkal, fantáziadús fegyverekkel és járművekkel dobták fel, és bemutatkozik számos új karakter is, de visszatérő arcokkal is találkozhatunk a Far Cry 5-ből. Ez a harc lesz a végső? Csak rajtad áll!', 6000, '2019-02-15', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 6, NULL, NULL, NULL, NULL, 3),
(3, '3307216100524', 'Far Cry New Dawn', 'product_farcrynewdawn_ps4.jpg', 'A Far Cry 5 közvetlen folytatásában visszatérhetsz Hope County-ba, amit jórészt elpusztított egy atomcsapás. 17 évvel az események után a természet kezdi visszahódítani a tájat, amit elfajzott bandák uralnak összetákolt fegyvereikkel és járműveikkel. A nukleáris pusztaságban rajtad áll, hogy felvedd a harcot a legfélelmetesebb bandával, és békét hozz az emberek számára.\n            A Far Cry: New Dawn ugyanazt a nyílt világú játékmenetet és gyönyörű grafikát nyújtja, amit a sorozattól megszoktunk és megszerettünk. Mindezt a Ubisoft fejlesztői vadonatúj mechanikákkal, fantáziadús fegyverekkel és járművekkel dobták fel, és bemutatkozik számos új karakter is, de visszatérő arcokkal is találkozhatunk a Far Cry 5-ből. Ez a harc lesz a végső? Csak rajtad áll!', 6000, '2019-02-15', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 6, NULL, NULL, NULL, NULL, 4),
(4, '3307216100525', 'The Witcher 3: Wild Hunt Game of The Year Edition (GOTY)', 'product_witcher3_pc.jpg', 'Geralt továbbra is a jól ismert vaják mesterséget űzi, ám míg a korábbi két részben leginkább emlékei után kutatott, addig a The Witcher 3 Wild Hunt története szerint a klasszikus witcher-létbe nyerhetünk bepillantást, amelynek során oda repít minket a szél, ahol a legnagyobb szükség van egy szörnyvadász szolgálataira. Az óriási harcok mellett azonban ezúttal sem csak az acél dönti el minden ütközetünket, így lesz, amikor csavaros észjárásunk, különleges főzeteink, vagy a vajákok speciális varázslatai fognak kihúzni minket a pácból.\n            A The Witcher 3-ban egyébiránt lényegesen dinamikusabb harcrendszer vár ránk, az alkímia pedig minden korábbinál fontosabb szerepet kap, a hatalmas bejárható világnak köszönhetően ráadásul immáron lóháton is közlekedhetünk a különféle helyszínek között. Geralt segítségével tehát egy igazi next-gen szerepjátékba csöppenhetünk, ami nem csak milliónyi lehetőséget, hanem csodaszép küllemet is tartogat számunkra.', 6000, '2020-01-01', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 8, NULL, NULL, NULL, NULL, 1),
(5, '3307216100526', 'Minecraft: Nintendo Switch Edition', 'product_minecraft_nintendo.jpg', 'A legendás építkezős játék végre Nintendo Switch-re is elérhető! Egy kaland, amely apró kockákból épül fel, de epikus, legendás világokba és történetekhez vezet!\n            Fedezz fel véletlenszerűen generált világokat, és építs csodálatos dolgokat az egyszerű otthonoktól a hatalmas kastélyokig. Játssz kreatív módban korlátlan erőforrással, vagy áss mélyre túlélő módban, amelyben fegyvereket kell kovácsolnod a veszélyes szörnyek legyőzéséhez.', 11000, '2017-01-12', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 1, NULL, NULL, NULL, NULL, 6),
(6, '3307216160526', 'Minecraft Starter Collection', 'product_minecraft_ps4.jpg', 'Ugorj fejest a Minecraft világába ezzel a kezdőcsomaggal, amely tartalmazza az alapjátékot, és hozzá egy csomó kiegészítő tartalmat, a legjobbak közül válogatva. A Minecraftban tényleg bármit felépíthetsz, amit csak el tudsz képzelni, vagy felfedezheted a végtelen világokat és óceánokat. Ebben a csomagban ráadásul 700 Minecoin-t is kapsz! Ezeket az érméket a játék saját piacterén költheted el, ahol további kiegészítőket, textúra- és skincsomagokat, minijátékokat és sok mást is vehetsz. Ezen kívül a csomagban megkapod a Starter Pack DLC-t, amely a Greek Mythology Mash-up, Plastic Texture Pack, Skin Pack 1 és Villains Skin Pack kiegészítőket foglalja magában. Tökéletes indulócsomag minden Minecraft játékos részére!', 11000, '2014-09-04', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 1, NULL, NULL, NULL, NULL, 4),
(7, '3307216560526', 'Minecraft Dungeons Ultimate Edition', 'product_minecraftdungeon_nintendo.jpg', 'Ugorj fejest a Minecraft világába ezzel a kezdőcsomaggal, amely tartalmazza az alapjátékot, és hozzá egy csomó kiegészítő tartalmat, a legjobbak közül válogatva. A Minecraftban tényleg bármit felépíthetsz, amit csak el tudsz képzelni, vagy felfedezheted a végtelen világokat és óceánokat. Ebben a csomagban ráadásul 700 Minecoin-t is kapsz! Ezeket az érméket a játék saját piacterén költheted el, ahol további kiegészítőket, textúra- és skincsomagokat, minijátékokat és sok mást is vehetsz. Ezen kívül a csomagban megkapod a Starter Pack DLC-t, amely a Greek Mythology Mash-up, Plastic Texture Pack, Skin Pack 1 és Villains Skin Pack kiegészítőket foglalja magában. Tökéletes indulócsomag minden Minecraft játékos részére!', 16000, '2014-09-04', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 1, NULL, NULL, NULL, NULL, 6),
(8, '3307216100527', 'New Super Mario Bros U Deluxe', 'product_newsupermariobrosudeluxe_nintendo.jpg', 'A Microsoft világsikert aratott építkezős játéka, a Minecraft egy felülnézetes mellékszálat kapott! A Minecraft Dungeons játékban véletlenszerűen generált barlangokon küzdheted át magad, új fegyvereket és felszereléseket szerezhetsz, hogy végült legyőzd a fosztogatók nagyurát, az Arch-Illagert. A játék olyan, mintha a Minecraft és a Diablo keresztezése lenne, játszhatod egyedül, vagy akár négyfős kooperatív módban, helyi és online megoldással is. Az akciódús, kincsekkel és titkokkal megrakott pályák különböző környezetekben játszódnak, amelyeket az alapjáték mellett az összes megjelent kiegészítővel bővíthetsz ki az Ultimate Editionnek köszönhetően!\n            Fedezz fel új fegyvereket és tárgyakat, amelyek segítenek legyőzni a hullámokban támadó ellenfeleket. Kalandozz mocsárban, kanyonban, és természetesen bányákban, majd vesd bele magad a két kiegészítőbe a megjelenésük napján! Egy gyönyörű kockavilág vár, ahogyan még sosem láthattad.\n            A Minecraft Dungeons Ultimate Edition tartalmazza az alapjátékot, és mind a 6, korábban megjelent bővítményt. Így minden eddiginél változatosabb tájakon és barlangokban küzdhetsz új ellenfelekkel, egyedül, vagy barátaid oldalán', 21000, '2019-01-01', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 9, NULL, NULL, NULL, NULL, 6),
(9, '3307216100528', 'Elden Ring', 'product_eldenring_pc.jpg', 'A japán From Software (Dark Souls sorozat, Bloodborne) és George R.R. Martin (a Trónok Harca írója) új, közös produkciója az Elden Ring, egy nagyszabású fantasy szerepjáték, amelyben te magad is Nagyúrrá válhatsz, kihasználva az Elden Gyűrű erejét egy sötét, pusztulásra ítélt világban.\n            Ezt a különleges világot Marika Királynő, az Örökéletű uralja, az Elden Gyűrű, az élet fája erejének a forrása pedig megsemmisült. A királynő gyermekei, akik maguk is félistenek, örökölték a gyűrű darabjait, ám hatalomvágyuk végül háborúhoz vezetett. Egyetlen harcos lehet csak, aki útját állhatja a pusztításnak. Egy kitaszított, félig élő, félig holt lovag, aki a tájat járja, és megpróbálja visszaszerezni a Gyűrű hatalmát.\n            Az Elden Ring egy lenyűgöző fantasy világot tár eléd, amely George R.R. Martin és Hidetaka Miyazaki közös munkája. Óriási kihívást jelentő, mégis élvezetes harcrendszer, óriási ellenfelek és főellenségek, szörnyek, sárkányok és a világ megannyi rejtélye várja, hogy a bátor kalandorok felfedezzék. A játék további újítása a többjátékos kooperatív mód, amellyel új módokon is taktikákkal lehet szembeszállni a bestiákkal.\n            Éld át te is ezt a soha nem látott, sötét fantasy eposzt, és élvezd a legendás alkotók eddigi legambiciózusabb munkáját, következő generációs látvánnyal és lehetőségekkel!', 18000, '2022-02-24', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 10, NULL, NULL, NULL, NULL, 1),
(10, '3307216103528', 'Marvel\'s Spider-Man 2', 'product_marvelspiderman2_ps5.jpg', 'A Marvel’s Spider-Man 2 a kritikai sikert aratott Marvel’s Spider-Man franchise következő felvonása. Az Insomniac Games, a PlayStation és a Marvel Games közös produkciója kihasználja a PS5 konzol teljes erejét, miközben egy vadonatúj, izgalmas történetet mesél el Pókember legendás világában.\n            Az új epizódban a két Spider-Man főhős, Peter Parker és Miles Morales kénytelen egyesíteni az erőiket, miután új, minden eddiginél nagyobb fenyegetés bukkan fel. A gonoszok között szerepel például Venom, de más meglepetésekre is számíthatunk. New York, sőt a világ sorsa múlik azon, hogy a különleges képességű Marvel hősök képesek-e megakadályozni a káosz uralmát.\n            Az Insomniac Games, olyan legendás sorozatok alkotócsapata, mint a Ratchet & Clank és a Marvel’s Spider-Man, már számtalanszor bizonyította, hogy képes első osztályú PlayStation játékokat készíteni. Filmszerű grafikával, profi színészekkel és szinkronnal, kihasználva a legújabb grafikai technikákat, játékaik az iparág élvonalába tartoznak. A Marvel’s Spider-Man 2 még tovább emeli a tétet, olyan látványvilággal és csiszolt játékmenettel, amire még nem volt példa a videójátékok történetében. Ez egy olyan kaland, amit sem a Marvel rajongóknak, sem a nyílt világú akciójátékok kedvelőinek nem szabad kihagyni!', 19900, '2023-08-20', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 2, NULL, NULL, NULL, NULL, 5),
(11, '3307216100529', 'Marvel\'s Spider-Man: Miles Morales', 'product_marvelspidermanmilesmorales_ps5.jpg', 'Legyél tanúja az új Pókember, Miles Morales felemelkedésének az Insomniac Games PS5 akciójátékában! A Spider-Man: Miles Morales egy teljesen különálló kiegészítő kaland, a nagysikerű Spider-Man játék utódja, amely egy új szuperhőst mutat be. Miles Morales felfedezi saját képességeit, és önmaga is Pókemberré válik ebben a nyílt világú, filmszerűen látványos akciójátékban. Járd be a téli, hóval borított New York City-t, és eredj a bűnözők nyomába új eszközökkel és mozdulatokkal, és bánj el velük eddig nem látott új képességekkel.\n            A Spider-Man: Miles Morales nem folytatás, hanem egy különálló kaland, amely kizárólag PS5 és PS4 konzolra jelenik meg, kihasználva a Sony új konzoljának teljes erejét. Nyílt világú akciójáték még soha nem nézett ki ennyire jól!', 19900, '2020-11-12', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 2, NULL, NULL, NULL, NULL, 5),
(12, '3307216100530', 'The Last of Us Part II', 'product_thelastofus2_ps5.jpg', 'Tovább folytatódik a Naughty Dog nagysikerű túlélő kalandja, amelyből megismerhetjük az összeomlott civilizáció utolsó segélykiáltását is. Mintegy 5 évvel az első rész eseményei után ugyanis a fertőzöttek még mindig komoly problémát okoznak a túlélők számára, de Joel és Ellie jól tudja, hogy gyakran sokkal nagyobb veszélyt jelentenek rájuk az egészségesen maradt emberek!\n            A The Last of Us Part II-ben Ellie felett vehetjük át az irányítást egy újabb izgalmas és fordulatos történet keretein belül, amelyben ismét lehetőségünk nyílik részt venni fedezékalapú harcokban, őrült kalandokban, miközben felfedezhetünk egy elragadó, ám veszélyekkel teli poszt-apokaliptikus világot.', 14990, '2024-01-19', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 2, NULL, NULL, NULL, NULL, 5),
(13, '3307216100531', 'Cyberpunk 2077', 'product_cyberpunk2077_ps4.jpg', 'A Cyberpunk 2077 egy nyílt világú akció-kaland-RPG, amely Night City metropoliszába vezet, ahol cyberpunk zsoldosként az események sodrában kell megharcolnod a túlélésért. Tovább csiszolt játékmenet és számos új ingyenes bónusztartalom vár! Szabd testre karakteredet és játékstílusodat melókat vállalva, hírnevet gyarapítva és fejlesztéseket feloldva. Meghozott döntéseid és kialakított kapcsolataid formálják majd a kalandot és a világot magad körül. Itt legendák születnek. A tiéd miről mesél majd?', 9900, '2021-06-21', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 11, NULL, NULL, NULL, NULL, 4),
(14, '3307216100532', 'Cyberpunk 2077 Ultimate Edition', 'product_cyberpunk2077_pc.jpg', 'A CD Projekt RED (The Witcher 3) 2020-ban megjelent nagyszabású szerepjátéka a Cyberpunk 2077, amely minden idők egyik legepikusabb kalandját nyújtja a távoli jövő megavárosában. A főszereplő V, aki választható életutakból indulva beveszi magát Night City neonfényes városába, ahol egy balul sikerült akciót követően meg kell küzdenie a túlélésért.\n            Szabd testre karakteredet és játékstílusodat melókat vállalva, hírnevet gyarapítva és fejlesztéseket feloldva. Meghozott döntéseid és kialakított kapcsolataid formálják majd a kalandot és a világot magad körül. Itt legendák születnek. A tiéd miről mesél majd?\n            Fedezd fel a Cyberpunk 2077 lenyűgöző világát a 2.0-ás frissítéssel! Új és továbbfejlesztett játékmechanikák teszik lehetővé, hogy kiéld a legvadabb cyberpunk fantáziáidat. A játékba épített ingyenes frissítés új lehetőségeket nyit meg, például teljesen átalakított karakterfejlesztési és kiberver rendszert, izgalmas járműves harcokat és autós üldözéseket, teljesen felújított rendőrségi rendszert, javított ellenséges intelligenciát és sok minden mást. Night City tele van fő- és mellékküldetésekkel, amik összességében akár több száz óra játékidőt is garantálnak.\n            A Cyberpunk 2077 Ultimate Edition az alapjáték mellett tartalmazza a Phantom Liberty kiegészítőt is. Fedezz fel egy vadonatúj kerületet Night City-n belül, és élj át egy hihetetlen történetet, amiben V túlélése a tét! Új mellékszereplők, ellenfelek, fegyverek, öltözékek és sok más extra vár ebben a nagyszabású kiegészítőben, amely nem pusztán kibővíti, hanem alapvetően megváltoztatja a Cyberpunk 2077 kalandját, döntéseid függvényében.\n            Indulj izgalmas kalandokra a valaha látott legszebb virtuális nagyvárosban, építs kapcsolatokat felejthetetlen karakterekkel, és alakítsd a körülötted állók sorsát ebben a lenyűgöző, futurisztikus szerepjátékban!', 19890, '2023-12-05', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 1, 11, NULL, NULL, NULL, NULL, 1),
(15, '3307216100533', 'PlayStation 5 (Slim)', 'product_playstation5(slim).jpg', 'Ugyanaz a hihetetlen erő, kisebb méretben – az új PlayStation 5 konzol változatlan játékélményt kínál kisebb, alacsonyabb fogyasztású, praktikusabb formában.\n            A világ legsikeresebb konzolja, a Sony PlayStation az ötödik generációjához érkezett a PlayStation 5-tel, amely a Sony által valaha gyártott legerősebb és leggyorsabb konzol, egyedi megoldásaival a játékok valóban új generációját hozta el játékosok milliói számára. A bivalyerős AMD Zen 2 és RDNA 2 architektúrájú processzort és videokártyát forradalmi 3D hangzással egészíti ki a különleges Tempest technológiának köszönhetően. A PlayStation 5 egyik legnagyobb innovációja a hihetetlenül gyors SSD tárhely, amely nagyobb sebességre képes, mint bármi, ami jelenleg elérhető, ezáltal szinte teljesen eltünteti a töltési időket. Nincs többé várakozás, a játékok egy pillanat alatt elindíthatók, a virtuális világok pedig nagyobbak és élethűbbek lehetnek, mint korábban bármikor.\n            PlayStation 5 konzollal nem kell lemondanod PS4 játékaidról sem. A Sony kilencedik generációs konzolja visszafelé kompatibilis, és minden népszerű PlayStation 4 játékot lejátszik, a megvásárolt címeidet is tovább élvezheted a következő években is.\n            A PlayStation 5 hardveres raytracing támogatással is rendelkezik. Ez az új technológia lehetővé teszi a teljesen élethű fények, árnyékok és tükröződések megjelenítését. A Sony által kifejlesztett egyedi, változó órajelű működést biztosító rendszer korábban nem látott optimalizálást tesz lehetővé, így a konzol teljesítménye magas lehet, miközben csendes hűtést kaphat a legintenzívebb játékok közben is. Ezekkel az innovációkkal a játékfejlesztők könnyen kihasználhatják a gépben rejlő teljesítményt, kreatívabbak lehetnek, mint korábban bármikor, és új élményeket hozhatnak létre.', 217890, '2023-11-24', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 3, 2, NULL, NULL, NULL, NULL, 4),
(16, '3307216100534', 'Nintendo Switch (Piros-Kék)', 'product_nintendoswitchpiroskek.jpg', 'A Nintendo legújabb otthoni konzoljával most egy egészen új oldalát ismerheted meg a videojátékok világának, hiszen segítésével soha többé nem kell abbahagynod a virtuális kalandozást, otthonodból kilépve ugyanis ott folytathatod a játékot, ahol a kanapén ülve abbahagytad.\n            A Nintendo Switch egy soha nem látott koncepció révén otthoni- és hordozható konzolként is funkcionál egyszerre, hiszen lehetőséget ad a speciális dokkoló által a televízió előtt ülve, kontrollerrel átélni kedvenc játékainkat, de ha indulnunk kell, a készülék lelkét egyszerűen csak kivesszük a helyéről, és a Wii U GamePad-hoz hasonló módon bárhol tovább folytathatjuk vele a félbehagyott élményt.\n            Természetesen a konzolhoz rengeteg játék sorakozott fel már a háttérben, így a The Legend of Zelda: Breath of the Wild mellett újra megjelenik rá a Skyrim, a Mario Kart 8, de a későbbiekben új Mario-játékok, a FIFA-sorozat aktuális epizódjai és tonnányi belső fejlesztésű cím is befuthat hozzá.', 116999, '2020-01-01', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 3, 9, NULL, NULL, NULL, NULL, 6),
(17, '3307216100535', 'Xbox Series X 1TB', 'product_xboxseriesx1tb.jpg', '', 198990, '2020-01-01', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 3, 1, NULL, NULL, NULL, NULL, 7),
(18, '3307216100536', 'Xbox vezeték nélküli kontroller (Fekete)', 'product_xboxwireless_controller.jpg', 'A Microsoft a sokszoros díjnyertes Xbox Vezeték Nélküli Kontroller dizájnját továbbfejlesztette, hogy még kényelmesebb legyen! Az Xbox Series kontrollere nem csak alacsonyabb válaszidőt és jobb fogást kínál, de Xbox One konzolokkal is használható.\n            A kontroller a megszokott és bevált Xbox kontrollerformát viszi tovább, kissé finomított ergonómiával, hogy még több méretű tenyérbe tökéletesen illeszkedjen. A matt felületű, textúrázott ütközőgombok és ravaszok minden helyzetben biztosabb tartást kínálnak. A kontroller alsó része változatlan, ezért minden Xbox One kiegészítővel kompatibilis (3.5 mm-es jack csatlakozós headsetek, adapterek, Chatpad).\n            Újdonság az Xbox Series X kontrollerén a középső Share gomb, amellyel könnyedén és egy pillanat alatt oszthatsz meg képeket vagy videókat bármelyik játékból. Játszani is jobb vele, hiszen a tovább optimalizált, nagyon alacsony válaszidejű Xbox Vezeték Nélküli Protokollal az Xbox játékok pontosabbak és érzékenyebbek, mint valaha! Ráadásul teljesen a saját igényeidre szabhatod, hiszen a kontroller gombkiosztása az Xbox Accessories alkalmazásban szabadon átalakítható (az alkalmazás Xbox konzolokra és Windows 10 PC-re tölthető le).\n            Érezd a játék minden rezdülését a rezgő ravaszokkal, maradj a célon a textúrázott, ergonomikus markolattal, és élvezd a gyors játékmenetet az alacsony válaszidőnek köszönhetően! A kontrollert Bluetooth kapcsolattal PC-hez és mobil eszközökhöz is könnyedén párosíthatod.', 21890, '2021-04-11', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 3, 1, NULL, NULL, NULL, NULL, 7),
(19, '3307216100537', 'PlayStation®5 (PS5) DualSense™ kontroller (Cosmic Red)', 'product_playstation5dualsensered_controller.jpg', 'A Sony a díjnyertes és sokak által kedvelt DualShock 4-et továbbfejlesztve megalkotta a DualSense™ nevű kontrollert, amely a PlayStation®5 konzol alapértelmezett irányítója, és amely új szintre emeli a játékélményt!\n            A futurisztikus dizájn a jól megszokott PlayStation gombkiosztást rejti, szimmetrikusan elhelyezett analóg karokkal, és a hosszú évek óta bevált funkciókkal. A kontroller alja és az elülső gombok finoman textúrázottak a még kényelmesebb fogásért, a PS4 kontrolleréről ismert touchpad (érintőpárna) is az eszköz közepén foglal helyet.\n            A Share gombot leváltotta a Create (Alkotás) gomb, amely a PS5-nek köszönhetően még fejlettebb funkciókhoz biztosít hozzáférést! Most még könnyebb lesz nem csak képeket és videókat megosztani, de azokból valódi tartalmakat előállítani, így minden PS5 játékosból igazi tartalomgyártó válhat, egyetlen gombnyomással!\n            A DualSense igazi varázslata a burkolat alatt rejlik. Az adaptív ravaszoknak köszönhetően még pontosabban érezheted, mi zajlik egy játékban! Például érezheted, ahogy az autók fékpedálja felkeményedik, vagy ahogy egyre nehezebb felhúzni egy íjat. A pontos rezgésnek köszönhetően még olyan részleteket is képes átadni a kontroller, amikor karaktereddel sárban haladsz vagy jégen csúszol. A DualSense™-nek köszönhetően már nem csak irányíthatod, hanem szó szerint érezheted a játékot!', 26890, '2021-06-18', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 3, 2, NULL, NULL, NULL, NULL, 5),
(20, '3307216100538', 'Nintendo Switch AC Adapter (NSP120)', 'product_nintendoswitchacadapternsp120_accessories.jpg', 'Elromlott? Elveszett? Netán csak szeretnél tartalékba egyet utazáshoz? Ebben az esetben van egy jó hírünk a számodra, a Nintendo Switch hálózati töltője ugyanis most már külön is megvásárolható, aminek köszönhetően bármikor pótolhatod egy gyári adapterrel az eredeti dobozban talált kiegészítőt.\n            Ez a Nintendo Switch hálózati töltő egyébiránt egy eredeti Nintendo-termék, amely tartósságát és minden paraméterét tekintve megegyezik a géphez kapott típussal, ezáltal tökéletesen illeszkedik a konzolhoz mind a csatlakozást, mind a töltéshez szükséges áramerősséget tekintve.', 11999, '2019-08-18', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 4, 9, NULL, NULL, NULL, NULL, 6),
(21, '3307216100539', 'Xbox Series Play & Charge Kit', 'product_xboxseriesplaychargekit_accessories.jpg', 'Mondj búcsút az eldobható AA elemeknek, és használd Xbox kontrolleredet újratölthető akkumulátorral! Az új akkumulátor + USB-C Kábel csomag az új kontrollerekhez lett tervezve. Csak tedd be az akkumulátort a kontroller elemtartójába, és játszhatsz is! Akár 4 óra alatt teljesen feltölthető, az USB-C kábelt közvetlenül a konzolhoz lehet csatlakoztatni, így akár játék közben is tölthető, vagy utána, mikor a konzol készenléti állapotban van. A mellékelt kábel 2.5m hosszú, így kényelmes játékra ad lehetőséget töltés közben is, a tartós akkumulátor pedig hosszú időre ellát energiával a legintenzívebb játékok esetén is.', 9999, '2020-03-06', 0, 95045000, 'Video game consoles and machines', '2024-05-07 14:53:21', '2024-05-07 14:53:21', 4, 1, NULL, NULL, NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Videójáték', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(2, 'Kontroller', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(3, 'Konzol', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(4, 'Tartozékok', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Microsoft', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(2, 'Sony Interactive', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(3, 'KOEI TECMO', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(4, 'Capcom', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(5, 'Bandai Namco Entertainment', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(6, 'Ubisoft', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(7, 'Trust', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(8, 'CD PROJEKT RED', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(9, 'Nintendo', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(10, 'From Software', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL),
(11, 'CD PROJEKT RED', '2024-05-07 14:53:21', '2024-05-07 14:53:21', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2024-05-07 14:53:21', '2024-05-07 14:53:21'),
(2, 'Manager', 'manager', '2024-05-07 14:53:21', '2024-05-07 14:53:21'),
(3, 'Customer', 'customer', '2024-05-07 14:53:21', '2024-05-07 14:53:21');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `storages`
--

CREATE TABLE `storages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `storageName` varchar(255) NOT NULL,
  `postal` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `storages`
--

INSERT INTO `storages` (`id`, `storageName`, `postal`, `country`, `province`, `city`, `address`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Budapesti bolt', 1042, 'Magyarország', 'Budapest', 'Budapest', 'Petőfi utca 16', '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(2, 'Veszprémi bolt', 8200, 'Magyarország', 'Veszprém', 'Veszprém', 'Budapesti út 20-28', '2024-05-07 14:58:12', '2024-05-07 14:58:12', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `storage_products`
--

CREATE TABLE `storage_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `storage_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `storage_products`
--

INSERT INTO `storage_products` (`id`, `quantity`, `product_id`, `storage_id`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '4', 1, 2, '2024-05-07 14:53:22', '2024-05-07 18:10:20', NULL, NULL, 1, NULL),
(2, '10', 2, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(3, '10', 3, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(4, '10', 4, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(5, '10', 5, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(6, '10', 6, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(7, '10', 7, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(8, '10', 8, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(9, '10', 9, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(10, '10', 10, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(11, '10', 11, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(12, '10', 12, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(13, '10', 13, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(14, '10', 14, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(15, '10', 15, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(16, '10', 16, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(17, '10', 17, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(18, '10', 18, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(19, '10', 19, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(20, '10', 20, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(21, '10', 21, 1, '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL),
(22, '20', 1, 2, '2024-05-07 14:58:28', '2024-05-07 14:58:28', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phoneNumber`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `role_id`) VALUES
(1, 'Admin', 'admin@example.com', '2024-05-07 14:53:21', '$2y$12$0wYw62d18nXDQ2/vP8EZsO5ius6iDjd7s2.JDxhdWYreBFFGOGl7S', 'X2RpJtJd0g', 'TWgecnVIrHYXlnMsc0L6GzMKatIO1KvoNr4NwNpBHcfe4AJIqn7TzZt9giPA', '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL, 1),
(2, 'Manager', 'manager@example.com', '2024-05-07 14:53:22', '$2y$12$0wYw62d18nXDQ2/vP8EZsO5ius6iDjd7s2.JDxhdWYreBFFGOGl7S', 'S3Ioq5PeRB', 'PTicQEvPDG', '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL, 2),
(3, 'Customer', 'customer@example.com', '2024-05-07 14:53:22', '$2y$12$0wYw62d18nXDQ2/vP8EZsO5ius6iDjd7s2.JDxhdWYreBFFGOGl7S', 'lySej8pspi', 'eImSOymfpdHSiEKLqwZWrZZDRaZ0aqaRi3jOygCYM5oUQL62N6xg0QoIeSyf', '2024-05-07 14:53:22', '2024-05-07 14:53:22', NULL, NULL, NULL, NULL, 3);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_contract_type_id_foreign` (`contract_type_id`),
  ADD KEY `contracts_created_by_foreign` (`created_by`),
  ADD KEY `contracts_updated_by_foreign` (`updated_by`),
  ADD KEY `contracts_deleted_by_foreign` (`deleted_by`);

--
-- A tábla indexei `contract_types`
--
ALTER TABLE `contract_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_types_created_by_foreign` (`created_by`),
  ADD KEY `contract_types_updated_by_foreign` (`updated_by`),
  ADD KEY `contract_types_deleted_by_foreign` (`deleted_by`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_orderstate_id_foreign` (`orderState_id`),
  ADD KEY `orders_created_by_foreign` (`created_by`),
  ADD KEY `orders_updated_by_foreign` (`updated_by`),
  ADD KEY `orders_deleted_by_foreign` (`deleted_by`);

--
-- A tábla indexei `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_storage_product_id_foreign` (`storage_product_id`),
  ADD KEY `order_products_created_by_foreign` (`created_by`),
  ADD KEY `order_products_updated_by_foreign` (`updated_by`),
  ADD KEY `order_products_deleted_by_foreign` (`deleted_by`);

--
-- A tábla indexei `order_states`
--
ALTER TABLE `order_states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_states_created_by_foreign` (`created_by`),
  ADD KEY `order_states_updated_by_foreign` (`updated_by`),
  ADD KEY `order_states_deleted_by_foreign` (`deleted_by`);

--
-- A tábla indexei `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- A tábla indexei `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- A tábla indexei `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `platforms_created_by_foreign` (`created_by`),
  ADD KEY `platforms_updated_by_foreign` (`updated_by`),
  ADD KEY `platforms_deleted_by_foreign` (`deleted_by`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_product_type_id_foreign` (`product_type_id`),
  ADD KEY `products_publisher_id_foreign` (`publisher_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_updated_by_foreign` (`updated_by`),
  ADD KEY `products_deleted_by_foreign` (`deleted_by`),
  ADD KEY `products_platform_id_foreign` (`platform_id`);

--
-- A tábla indexei `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_types_created_by_foreign` (`created_by`),
  ADD KEY `product_types_updated_by_foreign` (`updated_by`),
  ADD KEY `product_types_deleted_by_foreign` (`deleted_by`);

--
-- A tábla indexei `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publishers_created_by_foreign` (`created_by`),
  ADD KEY `publishers_updated_by_foreign` (`updated_by`),
  ADD KEY `publishers_deleted_by_foreign` (`deleted_by`);

--
-- A tábla indexei `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `storages`
--
ALTER TABLE `storages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `storages_created_by_foreign` (`created_by`),
  ADD KEY `storages_updated_by_foreign` (`updated_by`),
  ADD KEY `storages_deleted_by_foreign` (`deleted_by`);

--
-- A tábla indexei `storage_products`
--
ALTER TABLE `storage_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `storage_products_product_id_foreign` (`product_id`),
  ADD KEY `storage_products_storage_id_foreign` (`storage_id`),
  ADD KEY `storage_products_created_by_foreign` (`created_by`),
  ADD KEY `storage_products_updated_by_foreign` (`updated_by`),
  ADD KEY `storage_products_deleted_by_foreign` (`deleted_by`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_foreign` (`created_by`),
  ADD KEY `users_updated_by_foreign` (`updated_by`),
  ADD KEY `users_deleted_by_foreign` (`deleted_by`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `order_states`
--
ALTER TABLE `order_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `storages`
--
ALTER TABLE `storages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `storage_products`
--
ALTER TABLE `storage_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_contract_type_id_foreign` FOREIGN KEY (`contract_type_id`) REFERENCES `contract_types` (`id`),
  ADD CONSTRAINT `contracts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contracts_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contracts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `contract_types`
--
ALTER TABLE `contract_types`
  ADD CONSTRAINT `contract_types_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contract_types_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contract_types_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_orderstate_id_foreign` FOREIGN KEY (`orderState_id`) REFERENCES `order_states` (`id`),
  ADD CONSTRAINT `orders_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_products_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_products_storage_product_id_foreign` FOREIGN KEY (`storage_product_id`) REFERENCES `storage_products` (`id`),
  ADD CONSTRAINT `order_products_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `order_states`
--
ALTER TABLE `order_states`
  ADD CONSTRAINT `order_states_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_states_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_states_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `platforms`
--
ALTER TABLE `platforms`
  ADD CONSTRAINT `platforms_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `platforms_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `platforms_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `products_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `products_platform_id_foreign` FOREIGN KEY (`platform_id`) REFERENCES `platforms` (`id`),
  ADD CONSTRAINT `products_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`),
  ADD CONSTRAINT `products_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`),
  ADD CONSTRAINT `products_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `product_types`
--
ALTER TABLE `product_types`
  ADD CONSTRAINT `product_types_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `product_types_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `product_types_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `publishers`
--
ALTER TABLE `publishers`
  ADD CONSTRAINT `publishers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `publishers_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `publishers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `storages`
--
ALTER TABLE `storages`
  ADD CONSTRAINT `storages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `storages_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `storages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `storage_products`
--
ALTER TABLE `storage_products`
  ADD CONSTRAINT `storage_products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `storage_products_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `storage_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `storage_products_storage_id_foreign` FOREIGN KEY (`storage_id`) REFERENCES `storages` (`id`),
  ADD CONSTRAINT `storage_products_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
