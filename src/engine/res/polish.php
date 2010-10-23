<?php

//------------------------------------------------------------------------------
//
//  eTraxis - Records tracking web-based system
//  Copyright (C) 2010  Artem Rodygin
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
 * This module contains prompts translated in Polish.
 * All the prompts are in ISO-8859-2 encoding.
 *
 * @package Engine
 * @subpackage Localization
 * @author Rados�aw W�jtowicz
 */

$resource_polish = array
(
    RES_SECTION_ALERTS =>
    /* 200 */
    'Wszystkie pola zaznaczone jako wymagane powinny by� wype�nione.',
    'Warto�� domy�lna powinna by� z przedzia�u od %1 do %2.',
    'Konto jest wy��czone.',
    'Konto jest zablokowane.',
    'Nieprawid�owa nazwa u�ytkownika.',
    'Wprowadzona nazwa konta ju� istnieje.',
    'Nieprawid�owy adres email.',
    'Has�a nie s� identyczne.',
    'Has�o powinno mie� co najmniej %1 znak�w.',
    'Projekt o podanej nazwie ju� istnieje.',
    /* 210 */
    'Grupa o podanej nazwie ju� istnieje.',
    'Szablon o podanej nazwie lub prefixie ju� istnieje.',
    'Stan lub skr�t o tej nazwie ju� istnieje.',
    'Pole o podanej nazwie ju� istnieje.',
    'Nieprawid�owa warto�� liczbowa',
    'Warto�� liczbowa powinna by� z przedzia�u od %1 do %2.',
    'Warto�� "%1" powinna by� z przedzia�u od %2 do %3.',
    'Warto�� maksymalna powinna by� wi�ksza od warto�ci minimalnej.',
    'Zosta� przekroczony limit "upload_max_filesize" w pliku konfiguracyjnym "php.ini".',
    'Wielko�� wysy�anego pliku nie mo�e przekroczy� %1 Kbytes.',
    /* 220 */
    'Przesy�any plik nie zosta� do ko�ca przes�any.',
    'Nie przes�ano �adnego pliku.',
    'Brak tymczasowego folderu.',
    'Za��cznik o podanej nazwie ju� istnieje.',
    'Nie znaleziono rekordu.',
    'Filtr o podanej nazwie ju� istnieje.',
    'Nieprawid�owa warto�� daty.',
    'Data powinna by� z zakresu od %1 do %2.',
    'Nieprawid�owa warto�� czasu.',
    'Czas powinien by� z zakresu od %1 do %2.',
    /* 230 */
    'Powiadomienie o tej samej nazwie ju� istnieje.',
    'Przypomnienie o tej samej nazwie ju� istnieje.',
    'Przypomnienie zosta�o wys�ane.',
    'Widok o tej samej nazwie ju� istnieje.',
    'Kolumna o tej samej nazwie ju� istnieje.',
    'B��d zapisu na dysk.',
    'Upload pliku zosta� zatrzymany przez ro�sze�enie.',
    'Musi by� w��czna obs�uga JavaScript.',
    'To jest automatycznie generowana wiadomo��, prosz� na ni� nie odpowiada�.',
    'Wybrany subrekord ju� istnieje.',
    /* 240 */
    'Ustawienia filtra o podanej nazwie ju� istniej�.',
    'Widok nie mo�e mie� wi�cej ni� %1 kolumn.',
    'Sprawdzenie warto�ci "%1" nie powiod�o si�.',
    'U�ytkownik nie uzyska� autoryzacji.',
    'Nieprawid�owa nazwa u�ytkownika lub has�a.',
    'Nieznana nazwa autoryzacji.',
    'Nieznany b��d.',
    'B��d parsowania XMLa.',
    'B��d po��czenia do bazy danych.',

    RES_SECTION_CONFIRMS =>
    /* 300 */
    'Czy jeste� pewien, �e chcesz usun�� wszystkie widoki?',
    'Czy jeste� pewien, �e chesz usun�� wybrane konto?',
    'Czy jeste� pewien, �e chesz usun�� wybrany projekt?',
    'Czy jeste� pewien, �e chesz usun�� wybran� grup�?',
    'Czy jeste� pewien, �e chesz usun�� wybrany szablon?',
    'Czy jeste� pewien, �e chesz usun�� wybrany status?',
    'Czy jeste� pewien, �e chesz usun�� wybrane pole?',
    'Czy jeste� pewien, �e chesz usun�� wybrany rekord?',
    'Czy jeste� pewien, �e chesz wznowi� wybrany rekord?',
    'Czy jeste� pewien, �e chesz przydzieli� wybrany rekord?',
    /* 310 */
    'Czy jeste� pewien, �e chesz usun�� wszystkie zaznaczone filtry?',
    'Czy jeste� pewien, �e chesz usun�� wszytkie zaznaczone powiadomienia?',
    'Czy jeste� pewien, �e chesz wys�a� wybrane przypomnienie?',
    'Czy jeste� pewien, �e chesz usun�� wybrane przypomnienie?',
    'Czy jeste� pewien, �e chesz usun�� wybran� kolumn�?',
    'Czy jeste� pewien, �e chesz wyj��?',
    'Czy jeste� pewien, �e chesz usun�� wszystkie zaznaczone ustawienia filtr�w?',
    'Czy jeste� pewien, �e chesz usn�� wybrany rekord?',

    RES_SECTION_PROMPTS =>
    /* 1000 */
    'polski',
    'Logowanie',
    '  OK  ',
    'Anuluj',
    'Zapisz',
    'Powr�t',
    'Nast�pny',
    'Utw�rz',
    'Edytuj',
    'Usu�',
    /* 1010 */
    'Rekordy',
    'Konta',
    'Projekty',
    'Zmie� has�o',
    'Pole o stausie "%1"',
    'brak',
    'Ilo��:',
    'zapisz has�o',
    'Informacje o koncie',
    'Nazwa u�ytkownika',
    /* 1020 */
    'Pe�na nazwa',
    'E-mail',
    'Prawa',
    'administrator',
    'u�ytkownik',
    'Opis',
    'Has�o',
    'Potwierd� has�o',
    'wy��czony',
    'zablokowany',
    /* 1030 */
    'Nowe konto',
    'Konto "%1"',
    'Informacje o projekcie',
    'Nazwa projektu',
    'Data utworzenia',
    'zawieszony',
    'Nowy projekt',
    'Projekt "%1"',
    'Grupy',
    'Informacje o grupie',
    /* 1040 */
    'Nazwa grupy',
    'Nowa grupa',
    'Grupa "%1"',
    'Cz�onkowie',
    'Inni',
    'Cz�onek',
    'Szablony',
    'Informacje o szablonie',
    'Nazwa szablonu',
    'Prefix',
    /* 1050 */
    'Nowy szablon',
    'Szablon "%1"',
    'Stany',
    'Informacja o stanie',
    'Nazwa stanu',
    'Skr�t',
    'Typ stanu',
    'pocz�tkowy',
    'po�redni',
    'ko�cowy',
    /* 1060 */
    'Odpowiedzialny',
    'nie zmieniaj',
    'przydziel',
    'usu�',
    'Nowy stan',
    'Stan "%1"',
    'Utw�rz po�redni',
    'Utw�rz ko�cowy',
    'Przej�cia',
    'Uprawnienia',
    /* 1070 */
    'Utw�rz pocz�tkowy',
    'Dozwolony',
    'Pola',
    'Informacje o polu',
    'Kolejno��',
    'Nazwa pola',
    'Typ pola',
    'liczba',
    'tekst',
    'pole tekstowe',
    /* 1080 */
    'Wymagany',
    'tak',
    'nie',
    'Min.warto��',
    'Max.warto��',
    'Max.d�ugo��',
    'wymagany',
    'Nowe pole (krok %1/%2)',
    'Pole "%1"',
    'Pozwolenie na odczyt',
    /* 1090 */
    'Pozwolenie do zapisu',
    'Informacje og�lne',
    'ID',
    'Projekt',
    'Szablon',
    'Stan',
    'Wiek',
    'Nowy rekord (krok %1/%2)',
    'Rekord "%1"',
    'Id�',
    /* 1100 */
    'Historia',
    'Op�nij',
    'Wzn�w',
    'Przydziel',
    'Zmie� status',
    'Czas',
    'Autor',
    'Rekord zosta� utworzony ze statusem: "%1".',
    'Rekord zosta� przypisany do %1.',
    'Rekord zosta� zmodyfikowany.',
    /* 1110 */
    'Status zosta� zmieniony do "%1".',
    'Rekord op�ni si� do %1.',
    'Rekord zosta� wznowiony.',
    'Plik "%1" zosta� do��czony.',
    'Plik "%1" zosta� usuni�ty.',
    'pozwolenie na tworzenie rekord�w',
    'pozwolenie na modyfikowanie rekord�w',
    'pozwolenie na op�nianie rekord�w',
    'pozwolenie na wznowienie rekord�w',
    'pozwolenie na ponowne otwarcie rekord�w',
    /* 1120 */
    'pozwolenie na zmiane statusu rekordu',
    'pozwolenie na do��czanie plik�w',
    'pozwolenie na usuwanie plik�w',
    'J�zyki',
    'Dodaj komentarz',
    'Komentarz zosta� dodany.',
    'pozwolenie na dodawanie komentarzy',
    'Komentarz',
    'Dodaj plik',
    'Usu� plik',
    /* 1130 */
    'Za��cznik',
    'Nazwa za��cznika',
    'Plik za��cznika',
    'Za��czniki',
    'Brak p�l.',
    'Czas krytyczny',
    'Czas zamro�enia',
    'Zmiany',
    'Poprzednia warto��',
    'Nowa warto��',
    /* 1140 */
    'checkbox',
    'rekord',
    'lista',
    'Pozycje listy',
    '%1 Kb',
    'Filtry',
    'Nazwa filtru',
    'Wszystkie projekty',
    'Wszystkie szablony',
    'Wszystkie stany',
    /* 1150 */
    'Poka� rekord',
    'Poka� tylko utworzone przez ...',
    'Poka� tylko przydzielone do ...',
    'poka� tylko nie zako�czone',
    'Temat',
    'Szukaj',
    'Parametry wyszukiwania',
    'Wyniki wyszukiwania',
    'Tekst kt�ry chesz wyszuka�',
    'szukaj w polach',
    /* 1160 */
    'szukaj w komentarzach',
    'Status',
    'aktywny',
    'Powiadomienia',
    'powiadamiaj gdy utworzono nowy rekord',
    'powiadamiaj gdy przydzielono do rekordu',
    'powiadamiaj gdy rekord jest modyfikowany',
    'powiadamiaj gdy zmieni si� status rekordu',
    'powiadamiaj gdy rekord zostanie przesuni�ty',
    'powiadamiaj gdy rekord jest wznowiony',
    /* 1170 */
    'powiadamiaj gdy zostanie dodany komentarz',
    'powiadamiaj gdy zostanie dodany za��cznik',
    'powiadamiaj gdy plik zostanie usuni�ty',
    'wymagany',
    'Przesuni�ty',
    'Termin',
    'Waro�� domy�lna',
    'w��czony',
    'wy��czony',
    'Statystyki',
    /* 1180 */
    'Otwartych rekord�w',
    'Utworzonych do Zamknietych',
    'tydzie�',
    'liczba',
    'Kopiuj',
    'Rekord zosta� skopiowany z "%1".',
    'Wyloguj',
    'powiadamiaj je�li rekord jest kopiowany',
    'Ustawienia',
    'Rekord�w na stronie',
    /* 1190 */
    'Zak�adek na stronie',
    'Zablokuj',
    'Odblokuj',
    'Typ grupy',
    'globalna',
    'lokalna',
    'Konfiguracja',
    'Lokalna �cierzka',
    'Adres URL strony web',
    'Bezpiecze�stwo',
    /* 1200 */
    'Minimalna d�ugo�� has�a',
    'Maksymalna ilo�� pr�b zalogowania',
    'Czas blokowania (mins)',
    'Baza danych',
    'Typ bazy danych',
    'Oracle',
    'MySQL',
    'Microsoft SQL Server',
    'Serwer bazy danych',
    'Nazwa bazy danych',
    /* 1210 */
    'Nazwa u�ytkownika bazy danych',
    'Active Directory',
    'Serwer LDAP',
    'Numer portu',
    'Konto szukania',
    'Podstawowy DN',
    'Administratorzy',
    'Powiadamianie przez email',
    'Maksymalna wielko��',
    'Debugowanie',
    /* 1220 */
    'Tryb debugowania',
    'w��czony (bez prywatnych danych)',
    'w�aczony (wszystkie dane)',
    'Debug logs',
    'W��czony',
    'Wy��czony',
    '%1 min',
    'pozwolenie na przegl�danie rekord�w',
    'Zaznacz wszystko',
    'Autor',
    /* 1230 */
    'data',
    'czas',
    'poka� tylko przesuni�te',
    'Nazwa powiadomienia',
    'Zdarzenia',
    'Wersja %1',
    'role',
    'Powiadamiaj',
    'Nie powiadamiaj',
    'Przypomnienia',
    /* 1240 */
    'Nazwa przypomnienia',
    'Tytu� przypomnienia',
    'Odbiorcy przypomnienia',
    'Nowe przypomnienie (krok %1/%2)',
    'Przypomnienie "%1"',
    'pozwolenie do wysy�ania przypomnie�',
    'Wy�lij',
    'Nowy filtr',
    'Filtr "%1"',
    'Nowe powiadomienie',
    /* 1250 */
    'Powiadomienie "%1"',
    'Twoje has�o LDAP',
    'Mo�esz wstawi� link do innego rekordu wpisuj�c "rec#" i jego numer (np. "rec#305").',
    'Poka� tylko przeniesione do stanu ...',
    'Podziel si� z ...',
    'Eksportuj',
    'Inne powiadomienia...',
    'Dodany do powiadomie�',
    '%1 doda� Ci� do powiadomie� dla wybranego rekordu.',
    '%1 zosta� usuni�ty z powiadamiania.',
    /* 1260 */
    'Kopia do',
    'Magazyn',
    'Arybuty LDAP',
    'Widoki',
    'Informacje o widoku',
    'Nazwa widoku',
    'Nowy widok (krok %1/%2)',
    'Widok "%1"',
    'Nie wybrano widoku',
    'Ustaw',
    /* 1270 */
    'Kolumny',
    'Informacja o kolumnie',
    'Nazwa kolumny',
    'Nowa kolumna',
    'Kolumna "%1"',
    'Wyr�wanie',
    'z lewej',
    'wy�rodkowane',
    'z prawej',
    'Us�uga b�dzie niedost�pna od %1 do %2 (%3)',
    /* 1280 */
    'Wszystkie przydzielone mi',
    'Wszystkie utworzone przeze mnie',
    'Odznacz wsystkie',
    'yyyy.m.d',
    'Zrzu�',
    'Subrekordy',
    'Utw�rz subrekord',
    'Do��cz subrekord',
    'Usu� subrekord',
    'Subrekord ID',
    /* 1290 */
    'Subrekord "%1" zosta� dodany.',
    'Subrekord "%1" zosta� usuni�ty.',
    'pozwolenie na dodawnie subrekord�w',
    'pozwolenie na usuwanie subrekord�w',
    'powiadamiaj kiedy subrekord jest dodany',
    'powiadamiaj kiedy subrekord jest usuni�ty',
    'utworzonych rekord�w',
    'zamkni�tych rekord�w',
    'Poufne',
    'Dodaj poufny komentarz',
    /* 1300 */
    'pozwolenie na dodawnie/czytanie poufnych komentarzy',
    'Poufny komentarz zosta� dodany.',
    'Nadrz�dny ID',
    'zale�ny',
    'ukryty',
    'Dodaj separator',
    'CSV znak rozdzielenia',
    'CSV kodowanie',
    'CSV zako�czenie lini',
    'Wynik wyszukiwania (bez filtr�w)',
    /* 1310 */
    'W��cz filtry',
    'Wy��cz filtry',
    'Bie��cy filtr',
    'Zapisz ustawienia filtr�w',
    'Ustawienia filtr�w',
    'Nazwa ustawienia filtra',
    'Ustaw filtry "%1"',
    'Bie��cy widok',
    'Zapisz widok',
    'Rozwi� wszystkie',
    /* 1320 */
    'Zamknij wszystkie',
    'Przywr�� domy�lne',
    'Ost.Mod.',
    'PCRE do sprawdzenia warto�ci pola',
    'PCRE do przeszukiwania warto�ci pola',
    'PCRE do zast�pienia warto�ci pola',
    'Nast�pny status(domy�lny)',
    'Status op�nienia',
    'poka� wszystkie',
    'poka� tylko aktywne',
    /* 1330 */
    'Zdarzenia',
    'Nie wybrano filtru',
    'Dost�p anonimowy',
    'Brak.',
    'Grupy globalne',
    'Go��',
    'Import',
    'pozwolenie na kasowanie rekord�w',
    'Rodzaj autoryzacji',
    'Domy�lny j�zyk',
    /* 1340 */
    'Wyga�ni�cie has�a (dni)',
    'Wyga�ni�cie sesji (min)',
    'LDAP enumeration',
    'PostgreSQL',
    'lista indeks�w',
    'lista warto�ci',
    'Utworzony',
    'Zaznacz jako przeczytany',
    'Zarejestrowany',
    'TLS',
    /* 1350 */
    'Kompresja',
    'Ost.Stan',
    'Komentarze',
);

?>