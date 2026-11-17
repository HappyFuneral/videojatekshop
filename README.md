# Online Videójáték Webshop

## A projektről

Az **Online Videójáték Webshop** egy Laravel-alapú webáruház, amely videójátékok és kapcsolódó termékek online bemutatását és értékesítését valósítja meg. A rendszerben a vásárlók böngészhetik a termékeket, kosárba tehetik a kiválasztott árukat, majd rendelést adhatnak le. Az alkalmazás emellett adminisztrációs és raktárkezelési funkciókat is biztosít.

A projekt **közös, csapatban készített záró-/vizsgamunka** keretében készült. Célja nem csupán egy működő webáruház létrehozása volt, hanem a webalkalmazás-fejlesztés során felmerülő gyakorlati feladatok – többek között a frontend és backend összekapcsolása, az adatbázis-kezelés, a jogosultságkezelés, a szerveroldali műveletek és a közös fejlesztőmunka – megismerése és alkalmazása.

### Készítők

- Jankó Márton
- Maroevich Milán
- Simon Péter

**Intézmény:** BMSZC Bláthy Ottó Titusz Informatikai Technikum  
**Benyújtás éve:** 2024  
**Konzulens tanár:** Dr. Péter-Szabó Richárd

## Főbb funkciók

### Vásárlói felület

- Termékek böngészése és részletes adatlapjuk megtekintése.
- Termékek kosárba helyezése.
- Kosárban szereplő termékek mennyiségének módosítása és eltávolítása.
- Rendelés leadása szállítási adatok megadásával.
- Korábbi rendelések és azok részleteinek megtekintése.

### Adminisztráció és munkatársi feladatok

A rendszer három szerepkört különböztet meg:

- **Admin:** teljes körű adminisztrációs jogosultság.
- **Manager / dolgozó:** meghatározott termék-, raktár- és rendelési adatok megtekintése, illetve egyes műveletek elvégzése.
- **Customer / vásárló:** vásárlás, saját kosár és saját rendelések kezelése.

A jogosultságok a felületen és a szerveroldali műveleteknél is korlátozzák az elérhető funkciókat.

Az adminisztrációs funkciók többek között:

- Termékek kezelése: létrehozás, módosítás, törlés.
- Kiadók, platformok és terméktípusok kezelése.
- Raktárak és raktárkészlet kezelése.
- Beérkező termékmennyiségek rögzítése.
- Rendelések megtekintése és állapotuk módosítása.
- Szerződések és szerződéstípusok nyilvántartása, PDF-fájlok feltöltésével.
- Felhasználók adatainak adminisztrációs megtekintése.

A törölt rekordok a dokumentáció szerint logikai törléssel kerülnek eltávolításra, és a megfelelő adminisztrációs felületen visszaállíthatók.

## Felhasznált technológiák és eszközök

A projekt dokumentációjában felsorolt technológiák és eszközök:

- **Backend:** PHP, Laravel
- **Frontend:** HTML, CSS, JavaScript, Bootstrap, jQuery
- **Adatbázis:** SQL
- **Fejlesztői és adatbázis-eszközök:** Composer, XAMPP, DBeaver
- **Külső erőforrások:** Fonts Bunny, Font Awesome, DataTables CDN, jsDelivr

## Adatkezelés és főbb adatbázis-entitások

Az alkalmazás relációs adatbázist használ. A dokumentációban szereplő fontosabb táblák:

| Terület | Táblák |
|---|---|
| Felhasználók és jogosultságok | `users`, `roles` |
| Termékkatalógus | `products`, `product_types`, `publishers`, `platforms` |
| Raktárkezelés | `storages`, `storage_products` |
| Rendelések | `orders`, `order_products`, `order_states` |
| Szerződések | `contracts`, `contract_types` |

A rendszer a fontosabb rekordoknál létrehozási, módosítási és törlési információkat, valamint az ezeket végrehajtó felhasználó azonosítóját is nyilvántartja.

## Telepítés és helyi futtatás

Az alábbi lépések a projekt eredeti dokumentációjában leírt XAMPP-alapú fejlesztői környezetet követik. A parancsokat a projekt gyökérkönyvtárában kell futtatni.

### Szükséges eszközök

- XAMPP (Apache, PHP és adatbázis-szolgáltatás)
- Composer
- Node.js és npm
- Visual Studio Code vagy más kódszerkesztő

### 1. A projekt elhelyezése

1. Klónozd a repositoryt, vagy töltsd le a projektet ZIP-fájlként.
2. A projekt mappáját helyezd az XAMPP `htdocs` könyvtárába.
3. Indítsd el az XAMPP vezérlőpultját, és kapcsold be a szükséges szolgáltatásokat.

### 2. Adatbázis létrehozása

1. Nyisd meg az XAMPP-hoz tartozó adatbázis-kezelő felületet.
2. Hozz létre egy adatbázist a projekthez.
3. Állítsd be a projekt `.env` fájljában az adatbázis-kapcsolat adatait.

> **Megjegyzés:** A mellékelt záródolgozat az adatbázis létrehozását említi, de nem rögzíti az adatbázis pontos nevét, a szükséges kezdőadatok importálását vagy a migrációk teljes menetét. Ezeket a repositoryban található `.env.example`, migrációs és seed fájlok alapján kell ellenőrizni.

### 3. PHP-függőségek és Laravel UI

A dokumentáció a Laravel UI csomag telepítéséhez az alábbi parancsot adja meg:

```bash
composer require laravel/ui
```

Ha a repository már tartalmaz `composer.lock` fájlt és telepített csomagokhoz tartozó konfigurációt, a projekt függőségeinek telepítésekor a repositoryhoz illő Composer-eljárást kövesd.

### 4. Frontend-függőségek

A projekt gyökérkönyvtárában futtasd:

```bash
npm install
npm run dev
```

Az `npm run dev` parancsot hagyd futni, amíg a fejlesztői felületen dolgozol.

### 5. Laravel alkalmazás indítása

Egy másik terminálban futtasd:

```bash
php artisan serve
```

A terminál által kiírt helyi címen böngészőből megnyitható az alkalmazás.

### 6. Tároló szimbolikus linkje

A dokumentáció a feltöltött fájlok nyilvános eléréséhez az alábbi Laravel-parancsot írja elő:

```bash
php artisan storage:link
```

Ezt a projekt gyökérkönyvtárából futtasd. A parancs a `public/storage` hivatkozást hozza létre a Laravel tárolókönyvtárához.

## Tesztelési információk

A záródolgozat tesztelési fejezete kitér a vásárlói termékoldal és a kosárba helyezés tesztelésére. A dokumentált teszt során jogosultsági hiba merült fel a termék adatlapjának elérésénél; ezt a `routes/web.php` fájlban a termékoldal útvonalának minden felhasználó számára történő engedélyezésével javították.

A dokumentáció további, későbbi fejlesztésre javasolt területeket is felsorol; ezek nem tekintendők a jelenlegi rendszer igazoltan megvalósított funkcióinak.

## Ismert korlátozások és továbbfejlesztési lehetőségek

A dokumentáció alapján a bankkártyás fizetés nincs beépítve, mert annak megvalósításához banki megállapodás és külső fizetési integráció szükséges.

A záródolgozatban megjelölt lehetséges továbbfejlesztések:

- Regisztrációs és rendelési e-mail értesítések.
- Részletesebb termékszűrés.
- Bankkártyás fizetés integrálása.
- Kétlépcsős azonosítás.
- A vásárlói profiladatok részletesebb szerkesztése.
- Felhasználói belépések és aktivitások naplózása.
- Rendeléskezelési folyamatok bővítése.
- Adminisztrációs statisztikák és Excel-export.

## Tesztfelhasználók

A záródolgozat az alábbi mintafelhasználókat sorolja fel:

| Szerepkör | E-mail | Jelszó |
|---|---|---|
| Admin | `admin@example.com` | `1234` |
| Manager | `manager@example.com` | `1234` |
| Customer | `customer@example.com` | `1234` |

Ezek a dokumentációban szereplő tesztadatok. Nyilvánosan elérhető vagy éles környezetben ne használj ilyen egyszerű jelszavakat; telepítés után változtasd meg vagy tiltsd le a mintafiókokat.

## A projektről és a dokumentációról

A README a 2024-ben benyújtott közös záródolgozat alapján készült. A projekt oktatási és vizsgamunka céljából, csapatmunkában jött létre; a leírás a dolgozatban ismertetett funkciókat és fejlesztési környezetet foglalja össze.

A pontos, aktuális telepítési lépésekhez és a repositoryban ténylegesen szereplő fájlokhoz érdemes a forráskódot is ellenőrizni, különösen az adatbázis-migrációkat, seed fájlokat és környezeti változókat.
