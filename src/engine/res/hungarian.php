<?php

//------------------------------------------------------------------------------
//
//  eTraxis - Records tracking web-based system
//  Copyright (C) 2011  Artem Rodygin
//
//  This program is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
//
//  This program is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License
//  along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
//------------------------------------------------------------------------------

/**
 * Localization
 *
 * This module contains prompts translated in Hungarian.
 *
 * @package Engine
 * @subpackage Localization
 * @author Szabolcs Tóth
 */

$resource_english = array
(
    RES_SECTION_ALERTS =>
    /* 200 */
    'Minden kötelező mezőt ki kell töltenie.',
    'Az alapértelmezett érték %1 és %2 közé kell, hogy essen.',
    'A felhasználót letiltották.',
    'A felhasználó ki lett zárva a rendszerből.',
    'Érvénytelen felhasználónév.',
    'Már létezik ilyen névvel ellátott felhasználó.',
    'Érvénytelen e-mail cím.',
    'A jelszavak nem egyeznek.',
    'A jelszónak legalább %1 hosszúságúnak kell lennie.',
    'Már létezik ilyen névvel ellátott projekt.',
    /* 210 */
    'Már létezik ilyen névvel ellátott csoport.',
    'Már létezik ilyen névvel ellátott sablon.',
    'Már létezik ilyen névvel ellátott mező vagy prefix.',
    'Már létezik ilyen névvel ellátott mező.',
    'A megadott egész szám érvénytelen.',
    'Az egész szám értéke %1 és %2 közé kell, hogy essen.',
    'A(z) "%1" értéke %2 és %3 közé kell, hogy essen.',
    'A maximum értéknek nagyobbnak kell lennie, mint 1.',
    'A feltöltött fájl mérete túllépte a "php.ini" fájlban megadott "upload_max_filesize" értékét.',
    'A feltölteni kívánt fájl mérete nem lehet nagyobb, mint %1 Kbyte.',
    /* 220 */
    'A fájl feltöltése csak részben sikerült.',
    'Még nem töltöttek fel fájlt.',
    'Az ideiglenes mappa nem található.',
    'Már létezik ilyen névvel ellátott csatolmány.',
    'A rekord nem található.',
    'Már létezik ilyen névvel ellátott szűrő.',
    'A megadott dátum érvénytelen.',
    'A dátum %1 és %2 közé kell, hogy essen.',
    'Az megadott idő érvénytelen.',
    'Az idő %1 és %2 közé kell, hogy essen.',
    /* 230 */
    'Már létezik ilyen névvel ellátott értesítő.',
    'Már létezik ilyen névvel ellátott emlékeztető.',
    'Az emlékeztető sikeresen elküldve.',
    'Már létezik ilyen névvel ellátott nézet.',
    'Kérjük adjon meg egy rövid leírást a rekordhoz.',
    'Hiba a fájl lemezre írása során.',
    'A fájl feltöltése leállítva.',
    'Engedélyeznie kell a JavaScriptet.',
    'Ez egy automatikusan generált üzenet. Kérjük, ne válaszoljon rá!',
    'Érvénytelen érték.',
    /* 240 */
    'A szám értéke %1 és %2 közé kell, hogy essen.',
    'A nézet nem tartalmazhat több, mint %1 mezőt.',
    'A(z) "%1" értéke nem felel meg a formai követelményeknek.',
    'A felhasználó nem rendelkezik a megfelelő hozzáféréssel.',
    'Ismeretlen felhasználónév vagy rossz jelszó.',
    'Ismeretlen hiba.',
    'XML értelmező hiba.',
    'A módosítások sikeresen elmentve.',

    RES_SECTION_CONFIRMS =>
    /* 300 */
    'Biztos törölni szeretné a kiválasztott nézeteket?',
    'Biztos törölni szeretné a felhasználót?',
    'Biztos törölni szeretné a projektet?',
    'Biztos törölni szeretné a csoportot?',
    'Biztos törölni szeretné a sablont?',
    'Biztos törölni szeretné az állapotot?',
    'Biztos törölni szeretné a mezőt?',
    'Biztos módosítani szeretné a rekord állapotát?',
    'Biztos folytatni szeretné a rekordot?',
    'Biztos ki szeretné választani a felelőst?',
    /* 310 */
    'Biztos törölni szeretné az összes kiválasztott szűrőt?',
    'Biztos törölni szeretné az összes kiválasztott értesítőt?',
    'Biztos el szeretné küldeni az emlékeztetőt?',
    'Biztos törölni szeretné az emlékeztetőt?',
    'Biztos ki szeretne lépni?',
    'Biztos törölni szeretné a rekordot?',

    RES_SECTION_PROMPTS =>
    /* 1000 */
    'Angol',
    'Bejelentkezés',
    'OK',
    'Mégsem',
    'Mentés',
    'Vissza',
    'Következő',
    'Létrehozás',
    'Módosítás',
    'Törlés',
    /* 1010 */
    'Rekordok',
    'Felhasználók',
    'Projektek',
    'Jelszó módosítása',
    'Az állapot mezői "%1"',
    'nincs',
    'Összesen:',
    'Téma',
    'A felhasználó tulajdonságai',
    'Felhasználónév',
    /* 1020 */
    'Teljes név',
    'E-mail',
    'Alapértelmezett',
    'adminisztrátor',
    'felhasználó',
    'Leírás',
    'Jelszó',
    'Megerősítés',
    'letiltott',
    'zárolt',
    /* 1030 */
    'Új felhasználó',
    'Felhasználó "%1"',
    'A projekt információi',
    'Projekt neve',
    'Kezdés ideje',
    'felfüggesztve',
    'Új csoport',
    'Projekt "%1"',
    'Csoportok',
    'A csoport információi',
    /* 1040 */
    'Csoport neve',
    'Új csoport',
    'Csoport "%1"',
    'Tagság',
    'További személyek',
    'Tagok',
    'Sablonok',
    'A sablon tulajdonságai',
    'Sablon neve',
    'Prefix',
    /* 1050 */
    'Új sablon',
    'Sablon "%1"',
    'Állapotok',
    'Az állapot tulajdonságai',
    'Állapot neve',
    'Rövidítés',
    'Állapot típusa',
    'kezdeti',
    'köztes',
    'végső',
    /* 1060 */
    'Felelős',
    'változatlan',
    'hozzárendelés',
    'eltávolítás',
    'Új állapot',
    'Állapot "%1"',
    'Köztes állapot létrehozása',
    'Végső állapot létrehozása',
    'Állapotváltás',
    'Engedélyek',
    /* 1070 */
    'Legyen ez a kezdő állapot',
    'Engedélyezett',
    'Mezők',
    'Mező információ',
    'Sorrend',
    'Mező neve',
    'Mező típusa',
    'szám',
    'szöveg',
    'Többsoros szöveg',
    /* 1080 */
    'Kötelező',
    'igen',
    'nem',
    'Min. érték',
    'Max. érték',
    'Max. hossz',
    'kötelező',
    'Új mező (lépés: %1/%2)',
    'Mező "%1"',
    'csak olvasható',
    /* 1090 */
    'olvasás és írás',
    'Általános információk',
    'ID',
    'Projekt',
    'Sablon',
    'Állapot',
    'Kor',
    'Új rekord',
    'Rekord "%1"',
    'Az én rekordjaim',
    /* 1100 */
    'Eseménynapló',
    'Elhalasztás',
    'Folytatás',
    'Felelős kiválasztása',
    'Állapot megváltoztatása',
    'Időpont',
    'Létrehozó',
    'Rekord létrehozva a következő állapottal: "%1".',
    'A rekord új felelőse: %1.',
    'Rekord módosítva.',
    /* 1110 */
    'A rekord állapota megváltozott: "%1".',
    'A rekord végrehajtása elhalasztva eddig: %1.',
    'A rekord folytatva.',
    'A(z) "%1" csatolva.',
    'A(z) "%1" nevű fájl törölve.',
    'engedély egy új rekord létrehozásához',
    'engedély a rekordok módosításához',
    'engedély a rekordok elhalasztásához',
    'engedély a rekordok folytatásához',
    'engedély új felelős kiválasztására a már kiadott feladatoknál',
    /* 1120 */
    'engedély a kiadott feladatok állapotának módosításához',
    'engedély fájlok beküldéséhez',
    'engedély fájlok eltávolításához',
    'Nyelv',
    'Hozzászólás beküldése',
    'Hozzászólás beküldve.',
    'engedély hozzászólás beküldéséhez',
    'Hozzászólás',
    'Fájl csatolása',
    'Fájl eltávolítása',
    /* 1130 */
    'Csatolmány',
    'Csatolmány neve',
    'Csatolandó fájl',
    'Csatolmányok',
    'Nincsenek mezők.',
    'Kritikus határidő',
    'Zárás után meddig módosítható',
    'Változások',
    'Régi érték',
    'Új érték',
    /* 1140 */
    'jelölő négyzet',
    'rekord',
    'lista',
    'Lista elemei',
    '%1 Kb',
    'Szűrők',
    'Szűrő neve',
    'Minden projekt',
    'Minden sablon',
    'Minden állapot',
    /* 1150 */
    'Rekord megtekintése',
    'Csak azon rekordok mutatása, amelyeket a következő személy hozott létre ...',
    'Csak azon rekordok mutatása, amelynek a felelőse ...',
    'Csak a nyitott rekordok mutatása',
    'Tárgy',
    'Keresés',
    'Keresés paraméterei',
    'A keresés eredménye',
    'Szöveg keresése a következőkben:',
    'keresés a mezőkben',
    /* 1160 */
    'keresés a hozzászólásokban',
    'Állapot',
    'aktív',
    'Értesítők',
    'értesítés, ha létrehoztak egy rekordot',
    'értesítés, ha kiválasztottak egy felelőst',
    'értesítés, ha a rekordot megváloztatták',
    'értesítés, ha megváltozott az állapot',
    'értesítés, ha elhalasztottak egy rekordot',
    'értesítés, ha folytatnak egy rekordot',
    /* 1170 */
    'értesítés, ha beküldtek egy hozzászólást',
    'értesítés, ha csatoltak egy fájlt',
    'értesítés, ha töröltek egy fájlt',
    'kötelező',
    'Elhalasztva',
    'Lejárat napja',
    'Alapértelmezett érték',
    'bekapcsolva',
    'kikapcsolva',
    'Metrics',
    /* 1180 */
    'Nyitott rekordok',
    'Létrehozás <-> Lezárás',
    'hét',
    'szám',
    'Másolat',
    'A rekord a következő másolata: "%1".',
    'Kijelentkezés',
    'értesítés, ha egy rekordról másolat készült',
    'Beállítások',
    'Sorok száma/lap',
    /* 1190 */
    'Könyvjelző/lap',
    'Zárol',
    'Felnyit',
    'Csoport típusa',
    'globális',
    'helyi',
    'Konfiguráció',
    'Helyi elérési út',
    'Webes elérési út',
    'Biztonság',
    /* 1200 */
    'Jelszó minimum hosszúsága',
    'Bejelentkezési kísérletek száma',
    'Kizárás ideje (percekben)',
    'Adatbázis',
    'Adatbázis típusa',
    'Oracle',
    'MySQL',
    'Microsoft SQL Server',
    'Adatbázis szerver',
    'Adatbázis neve',
    /* 1210 */
    'Adatbázishoz tartozó felhasználó',
    'Active Directory',
    'LDAP szerver',
    'Portszám',
    'Kereső felhasználónév',
    'Adatbázis tárolók',
    'Adminisztrátorok',
    'E-mail értesítők',
    'Maximális méret',
    'Hibakeresés',
    /* 1220 */
    'Hibakereső üzemmód',
    'engedélyezett (privát adatok nélkül)',
    'engedélyezett (minden adat)',
    'Log-ok a hibakereséshez',
    'Engedélyezett',
    'Letiltott',
    'tizedes',
    'engedély csak a rekordok megtekintéséhez',
    'Mind kijelölése',
    'Létrehozó',
    /* 1230 */
    'dátum',
    'időtartam',
    'csak az elhalasztottak mutatása',
    'Értesítő neve',
    'Események',
    'Verzió %1',
    'szerep',
    'Feliratkozás',
    'Leiratkozás',
    'Emlékeztetők',
    /* 1240 */
    'Az emlékeztető megnevezése',
    'Az emlékeztető tárgya',
    'Az emlékeztetőt megkapja',
    'Új emlékeztető',
    'Emlékeztető "%1"',
    'engedély az emlékeztetők küldéséhez',
    'Küldés',
    'Új szűrő',
    'Szűrő "%1"',
    'Új értesítés',
    /* 1250 */
    'Értesítés "%1"',
    'Sorok száma a többsoros mezőkben.',
    'Hozzáfűzhet más rekordokat a "rec#" prefix és a hozzátartozó szám megadásával (például "rec#305").',
    'Csak a megadott állapotú rekordok mutatása ...',
    'Megosztás a következő személy(ek) számára ...',
    'Export',
    'Értesítés más személyek számára...',
    'Feliratkozott',
    '%1 beállított Önnek értesítést a rekordról.',
    '%1 leiratkozott.',
    /* 1260 */
    'Másolatot kap',
    'Tároló',
    'LDAP tulajdonság',
    'Nézetek',
    'Bezárás',
    'Nézet neve',
    'Új nézet',
    'Nézet "%1"',
    'Nincs nézet',
    'Beállítás',
    /* 1270 */
    'Mezők',
    'Figyelmeztetés',
    'Információ',
    'Hiba',
    'Kérdés',
    'Elhelyezés',
    'bal',
    'közép',
    'jobb',
    'A szolgáltatás szünetel %1 és %2 (%3) között',
    /* 1280 */
    'A hozzám rendelt rekordok',
    'Az általam beküldöt rekordok',
    'Értesítőbe bekerüljön',
    'm/d/yyyy',
    'Dump',
    'Alrekordok',
    'Alrekord létrehozása',
    'Alrekord csatolása',
    'Alrekord törlése',
    'Alrekord ID',
    /* 1290 */
    'A(z) "%1" alrekord létrehozva.',
    'A(z) "%1" alrekord törölve.',
    'engedély alrekordok létrehozásához',
    'engedély alrekordok törléséhez',
    'értesítés, ha egy alrekordot létrehoztak',
    'értesítés, ha egy alrekord törlésre került',
    'létrehozott rekordok',
    'lezárd rekordok',
    'Bizalmas',
    'Bizalmas hozzászólás beküldése',
    /* 1300 */
    'engedély a bizalmas hozzászólások elolvasásához és beküldéséhez',
    'Bizalmas hozzászólás beküldve.',
    'Szülő ID',
    'függőség',
    NULL,
    'Elválasztó hozzáadása',
    'CSV mezőelválasztó',
    'CSV karakterkódolás',
    'CSV sorvégződések',
    NULL,
    /* 1310 */
    'Szűrők engedélyezése',
    'Szűrők letiltása',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    'Összes kinyitása',
    /* 1320 */
    'Összes bezárása',
    NULL,
    'Utolsó esemény (eltelt napok száma)',
    'PCRE a mező értékeinek ellenőrzéséhez',
    'Kereső PCRE a mező értékeinek átalakításához',
    'Lecserélő PCRE a mezők értékeinek átalakításához',
    'Alapértelmezett következő állapot',
    'Elhalasztás állapota',
    'mindegyik megjelenítése',
    'csak az aktívak megjelenítése',
    /* 1330 */
    'Esemény',
    NULL,
    'Vendég felhasználó',
    'Nincs.',
    'Globális csoportok',
    'Vendég',
    'Importálás',
    'engedély a rekordok törléséhez',
    NULL,
    'Alapértelmezett nyelv',
    /* 1340 */
    'Jelszó lejárati ideje (napokban)',
    'Session lejárati ideje (percekben)',
    'LDAP kilistázás',
    'PostgreSQL',
    'indexek listája',
    'értékek listája',
    'Létrehozva',
    'Megjelölés olvasottként',
    'Regisztrálva',
    'TLS',
    /* 1350 */
    'Tömörítés',
    'Utolsó állapotváltozás (eltelt napok száma)',
    'Hozzászólások',
    'Méret',
    'Megjelenés',
    'CSV',
    'Engedélyezés',
    'Letiltás',
    'Előnézet',
    'Tulajdonos',
    /* 1360 */
    'Mindenki.',
    'Megjelölés olvasatlanként',
    'Szülő rekordok',
);

?>
