<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Product::create([
            'code' => '3307216100522',
            'name' => 'Far Cry New Dawn',
            'product_img' => 'product_farcrynewdawn_pc.jpg',
            'description' => 'A Far Cry 5 közvetlen folytatásában visszatérhetsz Hope County-ba, amit jórészt elpusztított egy atomcsapás. 17 évvel az események után a természet kezdi visszahódítani a tájat, amit elfajzott bandák uralnak összetákolt fegyvereikkel és járműveikkel. A nukleáris pusztaságban rajtad áll, hogy felvedd a harcot a legfélelmetesebb bandával, és békét hozz az emberek számára.
            A Far Cry: New Dawn ugyanazt a nyílt világú játékmenetet és gyönyörű grafikát nyújtja, amit a sorozattól megszoktunk és megszerettünk. Mindezt a Ubisoft fejlesztői vadonatúj mechanikákkal, fantáziadús fegyverekkel és járművekkel dobták fel, és bemutatkozik számos új karakter is, de visszatérő arcokkal is találkozhatunk a Far Cry 5-ből. Ez a harc lesz a végső? Csak rajtad áll!',
            'price' => 6000,
            'releaseDate' => '2019-02-15',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 6,
            'platform_id' => 1,
        ]);

        Product::create([
            'code' => '3307216100523',
            'name' => 'Far Cry New Dawn',
            'product_img' => 'product_farcrynewdawn_xboxone.jpg',
            'description' => 'A Far Cry 5 közvetlen folytatásában visszatérhetsz Hope County-ba, amit jórészt elpusztított egy atomcsapás. 17 évvel az események után a természet kezdi visszahódítani a tájat, amit elfajzott bandák uralnak összetákolt fegyvereikkel és járműveikkel. A nukleáris pusztaságban rajtad áll, hogy felvedd a harcot a legfélelmetesebb bandával, és békét hozz az emberek számára.
            A Far Cry: New Dawn ugyanazt a nyílt világú játékmenetet és gyönyörű grafikát nyújtja, amit a sorozattól megszoktunk és megszerettünk. Mindezt a Ubisoft fejlesztői vadonatúj mechanikákkal, fantáziadús fegyverekkel és járművekkel dobták fel, és bemutatkozik számos új karakter is, de visszatérő arcokkal is találkozhatunk a Far Cry 5-ből. Ez a harc lesz a végső? Csak rajtad áll!',
            'price' => 6000,
            'releaseDate' => '2019-02-15',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 6,
            'platform_id' => 3,
        ]);

        Product::create([
            'code' => '3307216100524',
            'name' => 'Far Cry New Dawn',
            'product_img' => 'product_farcrynewdawn_ps4.jpg',
            'description' => 'A Far Cry 5 közvetlen folytatásában visszatérhetsz Hope County-ba, amit jórészt elpusztított egy atomcsapás. 17 évvel az események után a természet kezdi visszahódítani a tájat, amit elfajzott bandák uralnak összetákolt fegyvereikkel és járműveikkel. A nukleáris pusztaságban rajtad áll, hogy felvedd a harcot a legfélelmetesebb bandával, és békét hozz az emberek számára.
            A Far Cry: New Dawn ugyanazt a nyílt világú játékmenetet és gyönyörű grafikát nyújtja, amit a sorozattól megszoktunk és megszerettünk. Mindezt a Ubisoft fejlesztői vadonatúj mechanikákkal, fantáziadús fegyverekkel és járművekkel dobták fel, és bemutatkozik számos új karakter is, de visszatérő arcokkal is találkozhatunk a Far Cry 5-ből. Ez a harc lesz a végső? Csak rajtad áll!',
            'price' => 6000,
            'releaseDate' => '2019-02-15',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 6,
            'platform_id' => 4,
        ]);

        Product::create([
            'code' => '3307216100525',
            'name' => 'The Witcher 3: Wild Hunt Game of The Year Edition (GOTY)',
            'product_img' => 'product_witcher3_pc.jpg',
            'description' => 'Geralt továbbra is a jól ismert vaják mesterséget űzi, ám míg a korábbi két részben leginkább emlékei után kutatott, addig a The Witcher 3 Wild Hunt története szerint a klasszikus witcher-létbe nyerhetünk bepillantást, amelynek során oda repít minket a szél, ahol a legnagyobb szükség van egy szörnyvadász szolgálataira. Az óriási harcok mellett azonban ezúttal sem csak az acél dönti el minden ütközetünket, így lesz, amikor csavaros észjárásunk, különleges főzeteink, vagy a vajákok speciális varázslatai fognak kihúzni minket a pácból.
            A The Witcher 3-ban egyébiránt lényegesen dinamikusabb harcrendszer vár ránk, az alkímia pedig minden korábbinál fontosabb szerepet kap, a hatalmas bejárható világnak köszönhetően ráadásul immáron lóháton is közlekedhetünk a különféle helyszínek között. Geralt segítségével tehát egy igazi next-gen szerepjátékba csöppenhetünk, ami nem csak milliónyi lehetőséget, hanem csodaszép küllemet is tartogat számunkra.',
            'price' => 6000,
            'releaseDate' => '2020-01-01',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 8,
            'platform_id' => 1,
        ]);

        Product::create([
            'code' => '3307216100526',
            'name' => 'Minecraft: Nintendo Switch Edition',
            'product_img' => 'product_minecraft_nintendo.jpg',
            'description' => 'A legendás építkezős játék végre Nintendo Switch-re is elérhető! Egy kaland, amely apró kockákból épül fel, de epikus, legendás világokba és történetekhez vezet!
            Fedezz fel véletlenszerűen generált világokat, és építs csodálatos dolgokat az egyszerű otthonoktól a hatalmas kastélyokig. Játssz kreatív módban korlátlan erőforrással, vagy áss mélyre túlélő módban, amelyben fegyvereket kell kovácsolnod a veszélyes szörnyek legyőzéséhez.',
            'price' => 11000,
            'releaseDate' => '2017-01-12',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 1,
            'platform_id' => 6,
        ]);

        Product::create([
            'code' => '3307216160526',
            'name' => 'Minecraft Starter Collection',
            'product_img' => 'product_minecraft_ps4.jpg',
            'description' => 'Ugorj fejest a Minecraft világába ezzel a kezdőcsomaggal, amely tartalmazza az alapjátékot, és hozzá egy csomó kiegészítő tartalmat, a legjobbak közül válogatva. A Minecraftban tényleg bármit felépíthetsz, amit csak el tudsz képzelni, vagy felfedezheted a végtelen világokat és óceánokat. Ebben a csomagban ráadásul 700 Minecoin-t is kapsz! Ezeket az érméket a játék saját piacterén költheted el, ahol további kiegészítőket, textúra- és skincsomagokat, minijátékokat és sok mást is vehetsz. Ezen kívül a csomagban megkapod a Starter Pack DLC-t, amely a Greek Mythology Mash-up, Plastic Texture Pack, Skin Pack 1 és Villains Skin Pack kiegészítőket foglalja magában. Tökéletes indulócsomag minden Minecraft játékos részére!',
            'price' => 11000,
            'releaseDate' => '2014-09-04',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 1,
            'platform_id' => 4,
        ]);

        Product::create([
            'code' => '3307216560526',
            'name' => 'Minecraft Dungeons Ultimate Edition',
            'product_img' => 'product_minecraftdungeon_nintendo.jpg',
            'description' => 'Ugorj fejest a Minecraft világába ezzel a kezdőcsomaggal, amely tartalmazza az alapjátékot, és hozzá egy csomó kiegészítő tartalmat, a legjobbak közül válogatva. A Minecraftban tényleg bármit felépíthetsz, amit csak el tudsz képzelni, vagy felfedezheted a végtelen világokat és óceánokat. Ebben a csomagban ráadásul 700 Minecoin-t is kapsz! Ezeket az érméket a játék saját piacterén költheted el, ahol további kiegészítőket, textúra- és skincsomagokat, minijátékokat és sok mást is vehetsz. Ezen kívül a csomagban megkapod a Starter Pack DLC-t, amely a Greek Mythology Mash-up, Plastic Texture Pack, Skin Pack 1 és Villains Skin Pack kiegészítőket foglalja magában. Tökéletes indulócsomag minden Minecraft játékos részére!',
            'price' => 16000,
            'releaseDate' => '2014-09-04',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 1,
            'platform_id' => 6,
        ]);

        Product::create([
            'code' => '3307216100527',
            'name' => 'New Super Mario Bros U Deluxe',
            'product_img' => 'product_newsupermariobrosudeluxe_nintendo.jpg',
            'description' => 'A Microsoft világsikert aratott építkezős játéka, a Minecraft egy felülnézetes mellékszálat kapott! A Minecraft Dungeons játékban véletlenszerűen generált barlangokon küzdheted át magad, új fegyvereket és felszereléseket szerezhetsz, hogy végült legyőzd a fosztogatók nagyurát, az Arch-Illagert. A játék olyan, mintha a Minecraft és a Diablo keresztezése lenne, játszhatod egyedül, vagy akár négyfős kooperatív módban, helyi és online megoldással is. Az akciódús, kincsekkel és titkokkal megrakott pályák különböző környezetekben játszódnak, amelyeket az alapjáték mellett az összes megjelent kiegészítővel bővíthetsz ki az Ultimate Editionnek köszönhetően!
            Fedezz fel új fegyvereket és tárgyakat, amelyek segítenek legyőzni a hullámokban támadó ellenfeleket. Kalandozz mocsárban, kanyonban, és természetesen bányákban, majd vesd bele magad a két kiegészítőbe a megjelenésük napján! Egy gyönyörű kockavilág vár, ahogyan még sosem láthattad.
            A Minecraft Dungeons Ultimate Edition tartalmazza az alapjátékot, és mind a 6, korábban megjelent bővítményt. Így minden eddiginél változatosabb tájakon és barlangokban küzdhetsz új ellenfelekkel, egyedül, vagy barátaid oldalán',
            'price' => 21000,
            'releaseDate' => '2019-01-01',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 9,
            'platform_id' => 6,
        ]);

        Product::create([
            'code' => '3307216100528',
            'name' => 'Elden Ring',
            'product_img' => 'product_eldenring_pc.jpg',
            'description' => 'A japán From Software (Dark Souls sorozat, Bloodborne) és George R.R. Martin (a Trónok Harca írója) új, közös produkciója az Elden Ring, egy nagyszabású fantasy szerepjáték, amelyben te magad is Nagyúrrá válhatsz, kihasználva az Elden Gyűrű erejét egy sötét, pusztulásra ítélt világban.
            Ezt a különleges világot Marika Királynő, az Örökéletű uralja, az Elden Gyűrű, az élet fája erejének a forrása pedig megsemmisült. A királynő gyermekei, akik maguk is félistenek, örökölték a gyűrű darabjait, ám hatalomvágyuk végül háborúhoz vezetett. Egyetlen harcos lehet csak, aki útját állhatja a pusztításnak. Egy kitaszított, félig élő, félig holt lovag, aki a tájat járja, és megpróbálja visszaszerezni a Gyűrű hatalmát.
            Az Elden Ring egy lenyűgöző fantasy világot tár eléd, amely George R.R. Martin és Hidetaka Miyazaki közös munkája. Óriási kihívást jelentő, mégis élvezetes harcrendszer, óriási ellenfelek és főellenségek, szörnyek, sárkányok és a világ megannyi rejtélye várja, hogy a bátor kalandorok felfedezzék. A játék további újítása a többjátékos kooperatív mód, amellyel új módokon is taktikákkal lehet szembeszállni a bestiákkal.
            Éld át te is ezt a soha nem látott, sötét fantasy eposzt, és élvezd a legendás alkotók eddigi legambiciózusabb munkáját, következő generációs látvánnyal és lehetőségekkel!',
            'price' => 18000,
            'releaseDate' => '2022-02-24',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 10,
            'platform_id' => 1,
        ]);

        Product::create([
            'code' => '3307216103528',
            'name' => 'Marvel\'s Spider-Man 2',
            'product_img' => 'product_marvelspiderman2_ps5.jpg',
            'description' => 'A Marvel’s Spider-Man 2 a kritikai sikert aratott Marvel’s Spider-Man franchise következő felvonása. Az Insomniac Games, a PlayStation és a Marvel Games közös produkciója kihasználja a PS5 konzol teljes erejét, miközben egy vadonatúj, izgalmas történetet mesél el Pókember legendás világában.
            Az új epizódban a két Spider-Man főhős, Peter Parker és Miles Morales kénytelen egyesíteni az erőiket, miután új, minden eddiginél nagyobb fenyegetés bukkan fel. A gonoszok között szerepel például Venom, de más meglepetésekre is számíthatunk. New York, sőt a világ sorsa múlik azon, hogy a különleges képességű Marvel hősök képesek-e megakadályozni a káosz uralmát.
            Az Insomniac Games, olyan legendás sorozatok alkotócsapata, mint a Ratchet & Clank és a Marvel’s Spider-Man, már számtalanszor bizonyította, hogy képes első osztályú PlayStation játékokat készíteni. Filmszerű grafikával, profi színészekkel és szinkronnal, kihasználva a legújabb grafikai technikákat, játékaik az iparág élvonalába tartoznak. A Marvel’s Spider-Man 2 még tovább emeli a tétet, olyan látványvilággal és csiszolt játékmenettel, amire még nem volt példa a videójátékok történetében. Ez egy olyan kaland, amit sem a Marvel rajongóknak, sem a nyílt világú akciójátékok kedvelőinek nem szabad kihagyni!',
            'price' => 19900,
            'releaseDate' => '2023-08-20',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 2,
            'platform_id' => 5,
        ]);

        Product::create([
            'code' => '3307216100529',
            'name' => 'Marvel\'s Spider-Man: Miles Morales',
            'product_img' => 'product_marvelspidermanmilesmorales_ps5.jpg',
            'description' => 'Legyél tanúja az új Pókember, Miles Morales felemelkedésének az Insomniac Games PS5 akciójátékában! A Spider-Man: Miles Morales egy teljesen különálló kiegészítő kaland, a nagysikerű Spider-Man játék utódja, amely egy új szuperhőst mutat be. Miles Morales felfedezi saját képességeit, és önmaga is Pókemberré válik ebben a nyílt világú, filmszerűen látványos akciójátékban. Járd be a téli, hóval borított New York City-t, és eredj a bűnözők nyomába új eszközökkel és mozdulatokkal, és bánj el velük eddig nem látott új képességekkel.
            A Spider-Man: Miles Morales nem folytatás, hanem egy különálló kaland, amely kizárólag PS5 és PS4 konzolra jelenik meg, kihasználva a Sony új konzoljának teljes erejét. Nyílt világú akciójáték még soha nem nézett ki ennyire jól!',
            'price' => 19900,
            'releaseDate' => '2020-11-12',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 2,
            'platform_id' => 5,
        ]);

        Product::create([
            'code' => '3307216100530',
            'name' => 'The Last of Us Part II',
            'product_img' => 'product_thelastofus2_ps5.jpg',
            'description' => 'Tovább folytatódik a Naughty Dog nagysikerű túlélő kalandja, amelyből megismerhetjük az összeomlott civilizáció utolsó segélykiáltását is. Mintegy 5 évvel az első rész eseményei után ugyanis a fertőzöttek még mindig komoly problémát okoznak a túlélők számára, de Joel és Ellie jól tudja, hogy gyakran sokkal nagyobb veszélyt jelentenek rájuk az egészségesen maradt emberek!
            A The Last of Us Part II-ben Ellie felett vehetjük át az irányítást egy újabb izgalmas és fordulatos történet keretein belül, amelyben ismét lehetőségünk nyílik részt venni fedezékalapú harcokban, őrült kalandokban, miközben felfedezhetünk egy elragadó, ám veszélyekkel teli poszt-apokaliptikus világot.',
            'price' => 14990,
            'releaseDate' => '2024-01-19',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 2,
            'platform_id' => 5,
        ]);

        Product::create([
            'code' => '3307216100531',
            'name' => 'Cyberpunk 2077',
            'product_img' => 'product_cyberpunk2077_ps4.jpg',
            'description' => 'A Cyberpunk 2077 egy nyílt világú akció-kaland-RPG, amely Night City metropoliszába vezet, ahol cyberpunk zsoldosként az események sodrában kell megharcolnod a túlélésért. Tovább csiszolt játékmenet és számos új ingyenes bónusztartalom vár! Szabd testre karakteredet és játékstílusodat melókat vállalva, hírnevet gyarapítva és fejlesztéseket feloldva. Meghozott döntéseid és kialakított kapcsolataid formálják majd a kalandot és a világot magad körül. Itt legendák születnek. A tiéd miről mesél majd?',
            'price' => 9900,
            'releaseDate' => '2021-06-21',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 11,
            'platform_id' => 4,
        ]);

        Product::create([
            'code' => '3307216100532',
            'name' => 'Cyberpunk 2077 Ultimate Edition',
            'product_img' => 'product_cyberpunk2077_pc.jpg',
            'description' => 'A CD Projekt RED (The Witcher 3) 2020-ban megjelent nagyszabású szerepjátéka a Cyberpunk 2077, amely minden idők egyik legepikusabb kalandját nyújtja a távoli jövő megavárosában. A főszereplő V, aki választható életutakból indulva beveszi magát Night City neonfényes városába, ahol egy balul sikerült akciót követően meg kell küzdenie a túlélésért.
            Szabd testre karakteredet és játékstílusodat melókat vállalva, hírnevet gyarapítva és fejlesztéseket feloldva. Meghozott döntéseid és kialakított kapcsolataid formálják majd a kalandot és a világot magad körül. Itt legendák születnek. A tiéd miről mesél majd?
            Fedezd fel a Cyberpunk 2077 lenyűgöző világát a 2.0-ás frissítéssel! Új és továbbfejlesztett játékmechanikák teszik lehetővé, hogy kiéld a legvadabb cyberpunk fantáziáidat. A játékba épített ingyenes frissítés új lehetőségeket nyit meg, például teljesen átalakított karakterfejlesztési és kiberver rendszert, izgalmas járműves harcokat és autós üldözéseket, teljesen felújított rendőrségi rendszert, javított ellenséges intelligenciát és sok minden mást. Night City tele van fő- és mellékküldetésekkel, amik összességében akár több száz óra játékidőt is garantálnak.
            A Cyberpunk 2077 Ultimate Edition az alapjáték mellett tartalmazza a Phantom Liberty kiegészítőt is. Fedezz fel egy vadonatúj kerületet Night City-n belül, és élj át egy hihetetlen történetet, amiben V túlélése a tét! Új mellékszereplők, ellenfelek, fegyverek, öltözékek és sok más extra vár ebben a nagyszabású kiegészítőben, amely nem pusztán kibővíti, hanem alapvetően megváltoztatja a Cyberpunk 2077 kalandját, döntéseid függvényében.
            Indulj izgalmas kalandokra a valaha látott legszebb virtuális nagyvárosban, építs kapcsolatokat felejthetetlen karakterekkel, és alakítsd a körülötted állók sorsát ebben a lenyűgöző, futurisztikus szerepjátékban!',
            'price' => 19890,
            'releaseDate' => '2023-12-05',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 11,
            'platform_id' => 1,
        ]);

        Product::create([
            'code' => '3307216100533',
            'name' => 'PlayStation 5 (Slim)',
            'product_img' => 'product_playstation5(slim).jpg',
            'description' => 'Ugyanaz a hihetetlen erő, kisebb méretben – az új PlayStation 5 konzol változatlan játékélményt kínál kisebb, alacsonyabb fogyasztású, praktikusabb formában.
            A világ legsikeresebb konzolja, a Sony PlayStation az ötödik generációjához érkezett a PlayStation 5-tel, amely a Sony által valaha gyártott legerősebb és leggyorsabb konzol, egyedi megoldásaival a játékok valóban új generációját hozta el játékosok milliói számára. A bivalyerős AMD Zen 2 és RDNA 2 architektúrájú processzort és videokártyát forradalmi 3D hangzással egészíti ki a különleges Tempest technológiának köszönhetően. A PlayStation 5 egyik legnagyobb innovációja a hihetetlenül gyors SSD tárhely, amely nagyobb sebességre képes, mint bármi, ami jelenleg elérhető, ezáltal szinte teljesen eltünteti a töltési időket. Nincs többé várakozás, a játékok egy pillanat alatt elindíthatók, a virtuális világok pedig nagyobbak és élethűbbek lehetnek, mint korábban bármikor.
            PlayStation 5 konzollal nem kell lemondanod PS4 játékaidról sem. A Sony kilencedik generációs konzolja visszafelé kompatibilis, és minden népszerű PlayStation 4 játékot lejátszik, a megvásárolt címeidet is tovább élvezheted a következő években is.
            A PlayStation 5 hardveres raytracing támogatással is rendelkezik. Ez az új technológia lehetővé teszi a teljesen élethű fények, árnyékok és tükröződések megjelenítését. A Sony által kifejlesztett egyedi, változó órajelű működést biztosító rendszer korábban nem látott optimalizálást tesz lehetővé, így a konzol teljesítménye magas lehet, miközben csendes hűtést kaphat a legintenzívebb játékok közben is. Ezekkel az innovációkkal a játékfejlesztők könnyen kihasználhatják a gépben rejlő teljesítményt, kreatívabbak lehetnek, mint korábban bármikor, és új élményeket hozhatnak létre.',
            'price' => 217890,
            'releaseDate' => '2023-11-24',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 3,
            'publisher_id' => 2,
            'platform_id' => 4,
        ]);

        Product::create([
            'code' => '3307216100534',
            'name' => 'Nintendo Switch (Piros-Kék)',
            'product_img' => 'product_nintendoswitchpiroskek.jpg',
            'description' => 'A Nintendo legújabb otthoni konzoljával most egy egészen új oldalát ismerheted meg a videojátékok világának, hiszen segítésével soha többé nem kell abbahagynod a virtuális kalandozást, otthonodból kilépve ugyanis ott folytathatod a játékot, ahol a kanapén ülve abbahagytad.
            A Nintendo Switch egy soha nem látott koncepció révén otthoni- és hordozható konzolként is funkcionál egyszerre, hiszen lehetőséget ad a speciális dokkoló által a televízió előtt ülve, kontrollerrel átélni kedvenc játékainkat, de ha indulnunk kell, a készülék lelkét egyszerűen csak kivesszük a helyéről, és a Wii U GamePad-hoz hasonló módon bárhol tovább folytathatjuk vele a félbehagyott élményt.
            Természetesen a konzolhoz rengeteg játék sorakozott fel már a háttérben, így a The Legend of Zelda: Breath of the Wild mellett újra megjelenik rá a Skyrim, a Mario Kart 8, de a későbbiekben új Mario-játékok, a FIFA-sorozat aktuális epizódjai és tonnányi belső fejlesztésű cím is befuthat hozzá.',
            'price' => 116999,
            'releaseDate' => '2020-01-01',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 3,
            'publisher_id' => 9,
            'platform_id' => 6,
        ]);

        Product::create([
            'code' => '3307216100535',
            'name' => 'Xbox Series X 1TB',
            'product_img' => 'product_xboxseriesx1tb.jpg',
            'description' => '',
            'price' => 198990,
            'releaseDate' => '2020-01-01',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 3,
            'publisher_id' => 1,
            'platform_id' => 7,
        ]);

        Product::create([
            'code' => '3307216100536',
            'name' => 'Xbox vezeték nélküli kontroller (Fekete)',
            'product_img' => 'product_xboxwireless_controller.jpg',
            'description' => 'A Microsoft a sokszoros díjnyertes Xbox Vezeték Nélküli Kontroller dizájnját továbbfejlesztette, hogy még kényelmesebb legyen! Az Xbox Series kontrollere nem csak alacsonyabb válaszidőt és jobb fogást kínál, de Xbox One konzolokkal is használható.
            A kontroller a megszokott és bevált Xbox kontrollerformát viszi tovább, kissé finomított ergonómiával, hogy még több méretű tenyérbe tökéletesen illeszkedjen. A matt felületű, textúrázott ütközőgombok és ravaszok minden helyzetben biztosabb tartást kínálnak. A kontroller alsó része változatlan, ezért minden Xbox One kiegészítővel kompatibilis (3.5 mm-es jack csatlakozós headsetek, adapterek, Chatpad).
            Újdonság az Xbox Series X kontrollerén a középső Share gomb, amellyel könnyedén és egy pillanat alatt oszthatsz meg képeket vagy videókat bármelyik játékból. Játszani is jobb vele, hiszen a tovább optimalizált, nagyon alacsony válaszidejű Xbox Vezeték Nélküli Protokollal az Xbox játékok pontosabbak és érzékenyebbek, mint valaha! Ráadásul teljesen a saját igényeidre szabhatod, hiszen a kontroller gombkiosztása az Xbox Accessories alkalmazásban szabadon átalakítható (az alkalmazás Xbox konzolokra és Windows 10 PC-re tölthető le).
            Érezd a játék minden rezdülését a rezgő ravaszokkal, maradj a célon a textúrázott, ergonomikus markolattal, és élvezd a gyors játékmenetet az alacsony válaszidőnek köszönhetően! A kontrollert Bluetooth kapcsolattal PC-hez és mobil eszközökhöz is könnyedén párosíthatod.',
            'price' => 21890,
            'releaseDate' => '2021-04-11',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 3,
            'publisher_id' => 1,
            'platform_id' => 7,
        ]);

        Product::create([
            'code' => '3307216100537',
            'name' => 'PlayStation®5 (PS5) DualSense™ kontroller (Cosmic Red)',
            'product_img' => 'product_playstation5dualsensered_controller.jpg',
            'description' => 'A Sony a díjnyertes és sokak által kedvelt DualShock 4-et továbbfejlesztve megalkotta a DualSense™ nevű kontrollert, amely a PlayStation®5 konzol alapértelmezett irányítója, és amely új szintre emeli a játékélményt!
            A futurisztikus dizájn a jól megszokott PlayStation gombkiosztást rejti, szimmetrikusan elhelyezett analóg karokkal, és a hosszú évek óta bevált funkciókkal. A kontroller alja és az elülső gombok finoman textúrázottak a még kényelmesebb fogásért, a PS4 kontrolleréről ismert touchpad (érintőpárna) is az eszköz közepén foglal helyet.
            A Share gombot leváltotta a Create (Alkotás) gomb, amely a PS5-nek köszönhetően még fejlettebb funkciókhoz biztosít hozzáférést! Most még könnyebb lesz nem csak képeket és videókat megosztani, de azokból valódi tartalmakat előállítani, így minden PS5 játékosból igazi tartalomgyártó válhat, egyetlen gombnyomással!
            A DualSense igazi varázslata a burkolat alatt rejlik. Az adaptív ravaszoknak köszönhetően még pontosabban érezheted, mi zajlik egy játékban! Például érezheted, ahogy az autók fékpedálja felkeményedik, vagy ahogy egyre nehezebb felhúzni egy íjat. A pontos rezgésnek köszönhetően még olyan részleteket is képes átadni a kontroller, amikor karaktereddel sárban haladsz vagy jégen csúszol. A DualSense™-nek köszönhetően már nem csak irányíthatod, hanem szó szerint érezheted a játékot!',
            'price' => 26890,
            'releaseDate' => '2021-06-18',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 3,
            'publisher_id' => 2,
            'platform_id' => 5,
        ]);

        Product::create([
            'code' => '3307216100538',
            'name' => 'Nintendo Switch AC Adapter (NSP120)',
            'product_img' => 'product_nintendoswitchacadapternsp120_accessories.jpg',
            'description' => 'Elromlott? Elveszett? Netán csak szeretnél tartalékba egyet utazáshoz? Ebben az esetben van egy jó hírünk a számodra, a Nintendo Switch hálózati töltője ugyanis most már külön is megvásárolható, aminek köszönhetően bármikor pótolhatod egy gyári adapterrel az eredeti dobozban talált kiegészítőt.
            Ez a Nintendo Switch hálózati töltő egyébiránt egy eredeti Nintendo-termék, amely tartósságát és minden paraméterét tekintve megegyezik a géphez kapott típussal, ezáltal tökéletesen illeszkedik a konzolhoz mind a csatlakozást, mind a töltéshez szükséges áramerősséget tekintve.',
            'price' => 11999,
            'releaseDate' => '2019-08-18',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 4,
            'publisher_id' => 9,
            'platform_id' => 6,
        ]);

        Product::create([
            'code' => '3307216100539',
            'name' => 'Xbox Series Play & Charge Kit',
            'product_img' => 'product_xboxseriesplaychargekit_accessories.jpg',
            'description' => 'Mondj búcsút az eldobható AA elemeknek, és használd Xbox kontrolleredet újratölthető akkumulátorral! Az új akkumulátor + USB-C Kábel csomag az új kontrollerekhez lett tervezve. Csak tedd be az akkumulátort a kontroller elemtartójába, és játszhatsz is! Akár 4 óra alatt teljesen feltölthető, az USB-C kábelt közvetlenül a konzolhoz lehet csatlakoztatni, így akár játék közben is tölthető, vagy utána, mikor a konzol készenléti állapotban van. A mellékelt kábel 2.5m hosszú, így kényelmes játékra ad lehetőséget töltés közben is, a tartós akkumulátor pedig hosszú időre ellát energiával a legintenzívebb játékok esetén is.',
            'price' => 9999,
            'releaseDate' => '2020-03-06',
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 4,
            'publisher_id' => 1,
            'platform_id' => 7,
        ]);

    }
}
