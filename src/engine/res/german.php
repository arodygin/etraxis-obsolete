<?php

//------------------------------------------------------------------------------
//
//  eTraxis - Records tracking web-based system
//  Copyright (C) 2007-2010  Artem Rodygin
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
 * This module contains prompts translated in German.
 *
 * @package Engine
 * @subpackage Localization
 * @author Daniel Jungbluth
 */

$resource_german = array
(
    RES_SECTION_ALERTS =>
    /* 200 */
    'Die gekennzeichneten Felder [*] sind Pflichtfelder.',
    'Der vorgegebene Wert muss im Bereich von %1 bis %2 liegen.',
    'Konto ist deaktiviert.',
    'Konto ist gesperrt.',
    'Ungültiger Benutzername.',
    'Ein Konto mit diesem Benutzernamen existiert bereits.',
    'Ungültige Email-Adresse.',
    'Die Passwörter stimmen nicht überein.',
    'Das Passwort muss mindestens %1 Zeichen lang sein.',
    'Ein Projekt mit diesem Namen existiert bereits.',
    /* 210 */
    'Eine Gruppe mit diesem Namen existiert bereits.',
    'Eine Anfrageart mit diesem Namen oder Präfix existiert bereits.',
    'Ein Status mit diesem Namen oder Abkürzung existiert bereits.',
    'Ein Zusatz mit diesem Namen existiert bereits.',
    'Ungültiger Ganzzahlwert.',
    'Ganzzahlwert muss im Bereich von %1 bis %2 liegen.',
    'Der Wert von "%1" muss im Bereich von %2 bis %3 liegen.',
    'Das Maximum muss größer als das Minimum sein.',
    'Die hochgeladene Datei überschreitet die in der Direktive "upload_max_filesize" in "php.ini" festgelegte Dateigröße.',
    'Die Dateigröße darf %1 Kbytes nicht überschreiten.',
    /* 220 */
    'Die Datei wurde nur teilweise hochgeladen.',
    'Keine Datei hochgeladen.',
    'Temporärer Ordner fehlt.',
    'Ein Anhang mit diesem Namen existiert bereits.',
    'Anfrage nicht gefunden.',
    'Ein Filter mit diesem Namen existiert bereits.',
    'Ungültige Datumsangabe.',
    'Das Datum muss zwischen %1 und %2 liegen.',
    'Ungültige Uhrzeitangabe.',
    'Die Uhrzeit muss zwischen %1 und %2 liegen.',
    /* 230 */
    'Ein Abonnement mit diesem Namen existiert bereits.',
    'Eine Erinnerung mit diesem Namen existiert bereits.',
    'Die Erinnerung ist erfolgreich zugestellt worden.',
    'Eine Ansicht mit diesem Namen existiert bereits.',
    NULL,
    'Datei konnte nicht geschrieben werden.',
    'Das Hochladen wurde von einer Erweiterung beendet.',
    'JavaScript muss aktiviert sein.',
    'Bitte antworten Sie nicht auf diese automatisch generierte Nachricht.',
    NULL,
    /* 240 */
    NULL,
    'Maximal %1 Spalten pro Ansicht erlaubt.',
    'Regulärer Ausdruck in "%1" ist ungültig.',
    'Benutzer ist nicht autorisiert.',
    'Unbekannter Benutzername oder falsches Passwort.',
    'Unbekannter Fehler.',
    'XML-Parser fehlerhaft.',

    RES_SECTION_CONFIRMS =>
    /* 300 */
    'Möchten Sie alle ausgewählten Ansichten wirklich löschen?',
    'Möchten Sie dieses Konto wirklich löschen?',
    'Möchten Sie dieses Projekt wirklich löschen?',
    'Möchten Sie diese Gruppe wirklich löschen?',
    'Möchten Sie diese Anfrageart wirklich löschen?',
    'Möchten Sie diesen Status wirklich löschen?',
    'Möchten Sie diesen Zusatz wirklich löschen?',
    NULL,
    'Möchten Sie diese Anfrage wirklich wiederaufnehmen?',
    'Möchten Sie diese Anfrage wirklich jemandem zuordnen?',
    /* 310 */
    'Möchten Sie wirklich alle ausgewählten Filter löschen?',
    'Möchten Sie wirklich alle ausgewählten Abonnements löschen?',
    'Möchten Sie diese Erinnerung wirklich senden?',
    'Möchten Sie diese Erinnerung wirklich löschen?',
    'Möchten Sie wirklich beenden?',
    'Möchten Sie diese Anfrage wirklich löschen?',

    RES_SECTION_PROMPTS =>
    /* 1000 */
    'Deutsch',
    'Anmelden',
    'OK',
    'Abbrechen',
    'Speichern',
    'Zurück',
    'Weiter',
    'Erstellen',
    'Ändern',
    'Löschen',
    /* 1010 */
    'Anfragen',
    'Konten',
    'Projekte',
    'Passwort ändern',
    'Zusätze von Status "%1"',
    'keiner',
    'Gesamt:',
    'Aussehen',
    'Kontoinformationen',
    'Benutzername',
    /* 1020 */
    'Vollständiger Name',
    'Email-Adresse',
    'Standard',
    'Administrator',
    'Benutzer',
    'Beschreibung',
    'Passwort',
    'Passwort wiederholen',
    'deaktiviert',
    'gesperrt',
    /* 1030 */
    'Neues Konto',
    'Konto "%1"',
    'Projektinformationen',
    'Projektname',
    'Anfangszeit',
    'ausgesetzt',
    'Neues Projekt',
    'Projekt "%1"',
    'Gruppen',
    'Gruppeninformationen',
    /* 1040 */
    'Gruppenname',
    'Neue Gruppe',
    'Gruppe "%1"',
    'Mitgliedschaft',
    'Andere',
    'Mitglieder',
    'Anfragearten',
    'Informationen über Anfrageart',
    'Name der Anfrageart',
    'Präfix',
    /* 1050 */
    'Neue Anfrageart',
    'Anfrageart "%1"',
    'Status',
    'Statusinformationen',
    'Statusname',
    'Abkürzung',
    'Statusart',
    'Startstatus',
    'Zwischenstatus',
    'Endstatus',
    /* 1060 */
    'Bearbeiter(in)',
    'beibehalten',
    'zuordnen',
    'abziehen',
    'Neuer Status',
    'Status "%1"',
    'Status erstellen',
    'Endstatus erstellen',
    'Übergänge',
    'Berechtigungen',
    /* 1070 */
    'Als Startstatus',
    'Erlaubt',
    'Zusätze',
    'Zusatzinformationen',
    'Reihenfolge',
    'Zusatzname',
    'Zusatzart',
    'Zahl',
    'Text',
    'Mehrzeiliger Text',
    /* 1080 */
    '*',
    'Ja',
    'Nein',
    'Min. Wert',
    'Max. Wert',
    'Max. Länge',
    '*',
    'Neuer Zusatz (Schritt %1/%2)',
    'Zusatz "%1"',
    'nur lesen',
    /* 1090 */
    'lesen und schreiben',
    'Allgemeine Informationen',
    'ID',
    'Projekt',
    'Art der Anfrage',
    'Status',
    'Alter',
    'Neue Anfrage',
    'Anfrage "%1"',
    'Meine Anfragen',
    /* 1100 */
    'Historie',
    'Verzögern',
    'Wiederaufnehmen',
    'Zuweisen',
    'Status wechseln',
    'Zeitmarke',
    'Ersteller(in)',
    'Die Anfrage wird im Status "%1" erstellt.',
    'Die Anfrage wird %1 zugewiesen.',
    'Die Anfrage wird geändert.',
    /* 1110 */
    'Der Status wechselt nach "%1".',
    'Die Anfrage wird bis zum %1 verzögert.',
    'Die Anfrage wird wiederaufgenommen.',
    'Datei "%1" wird angehangen.',
    'Datei "%1" wird entfernt.',
    'Berechtigt, um Anfragen zu erstellen',
    'Berechtigt, um Anfragen zu ändern',
    'Berechtigt, um Anfragen hinauszuzögern',
    'Berechtigt, um Anfragen wiederaufzunehmen',
    'Berechtigt, um bereits zugeordnete Anfragen neu zuzuordnen',
    /* 1120 */
    'Berechtigt zum Ändern des Status von zugeordneten Anfragen',
    'Berechtigt, um Dateien anzuhängen',
    'Berechtigt, um Dateien zu entfernen',
    'Sprache',
    'Kommentar hinzufügen',
    'Kommentar hinzugefügt.',
    'Berechtigt zum Hinzufügen von Kommentaren',
    'Kommentar',
    'Datei anhängen',
    'Datei entfernen',
    /* 1130 */
    'Anhang',
    'Name des Anhangs',
    'Anzuhängende Datei',
    'Anhänge',
    'Keine Zusätze.',
    'Kritisches Alter',
    'Einfrieren nach Ende',
    'Änderungen',
    'Alter Wert',
    'Neuer Wert',
    /* 1140 */
    'Ankreuzfeld',
    'Anfrage',
    'Auswahlliste',
    'Listeneinträge',
    '%1 Kb',
    'Filter',
    'Filtername',
    'Alle Projekte',
    'Alle Anfragearten',
    'Jeder Status',
    /* 1150 */
    'Anfrage anzeigen',
    'Nur anzeigen, wenn erstellt von ...',
    'Nur anzeigen, wenn zugewiesen an ...',
    'Nur Offene anzeigen',
    'Betreff',
    'Suche',
    'Suchparameter',
    'Suchergebnis',
    'Zu suchender Text',
    'In Zusätzen suchen',
    /* 1160 */
    'In Kommentaren suchen',
    'Status',
    'Aktiv',
    'Abonnements',
    'Benachrichtigen, wenn Anfrage erstellt wird',
    'Benachrichtigen, wenn Anfrage jemandem zugeordnet wird',
    'Benachrichtigen, wenn Anfrage verändert wird',
    'Benachrichtigen, wenn Status gewechselt wird',
    'Benachrichtigen, wenn Anfrage hinausgezögert wird',
    'Benachrichtigen, wenn Anfrage wiederaufgenommen wird',
    /* 1170 */
    'Benachrichtigen, wenn Kommentar hinzugefügt wird',
    'Benachrichtigen, wenn Datei angehangen wird',
    'Benachrichtigen, wenn Datei entfernt wird',
    '*',
    'Hinausgezögert',
    'Fälligkeitstermin',
    'Vorgabewert',
    'an',
    'aus',
    'Metriken',
    /* 1180 */
    'Offene Anfragen',
    'Offen/Abgeschlossen',
    'Woche',
    'Anzahl',
    'Klonen',
    'Anfrage wird geklont von "%1".',
    'Abmelden',
    'Benachrichtigen, wenn Anfrage geklont wird',
    'Einstellungen',
    'Zeilen pro Seite',
    /* 1190 */
    'Lesezeichen pro Seite',
    'Sperren',
    'Freischalten',
    'Gruppenart',
    'global',
    'lokal',
    'Konfiguration',
    'Lokaler Pfad',
    'Basis-URL',
    'Sicherheit',
    /* 1200 */
    'Minimale Passwortlänge',
    'Maximale Anzahl von Anmeldeversuchen',
    'Sperren nach (Minuten)',
    'Datenbank',
    'Datenbankart',
    'Oracle',
    'MySQL',
    'Microsoft SQL Server',
    'Datenbankserver',
    'Datenbankname',
    /* 1210 */
    'Datenbankbenutzer',
    'Active Directory',
    'LDAP-Server',
    'Portnummer',
    'Konto suchen',
    'Basis-DN',
    'Administratoren',
    'Email-Benachrichtigungen',
    'Maximale Größe',
    'Debug',
    /* 1220 */
    'Debug-Modus',
    'aktiviert (ohne private Daten)',
    'aktiviert (alle Daten)',
    'Debug-Log',
    'Aktiviert',
    'Deaktiviert',
    NULL,
    'Berechtigt, um Anfragen nur anzuzeigen',
    'Alles auswählen',
    'Verfasser(in)',
    /* 1230 */
    'Datum',
    'Bearbeitungsdauer',
    'Nur Hinausgezögerte anzeigen',
    'Abonnementname',
    'Ereignisse',
    'Version %1',
    'Rolle',
    'Abonnieren',
    'Abbestellen',
    'Erinnerungen',
    /* 1240 */
    'Erinnerungsname',
    'Erinnerungsbetreff',
    'Erinnerungsempfänger',
    'Neue Erinnerung',
    'Erinnerung "%1"',
    'Berechtigt, um Erinnerungen zu senden',
    'Senden',
    'Neuer Filter',
    'Filter "%1"',
    'Neues Abonnement',
    /* 1250 */
    'Abonnement "%1"',
    NULL,
    'Man kann Verweise zu anderen Anfragen einfügen, indem man "rec#" und die entsprechende Nummer (z.B. "rec#305") angibt.',
    'Nur Anfragen anzeigen, die gewechselt sind nach Status ...',
    'Gemeinsam verwenden mit ...',
    'Exportieren',
    'Andere abonnieren...',
    'Abonniert',
    '%1 hat für Sie die Anfrage abonniert.',
    '%1 hat die Anfrage abbestellt.',
    /* 1260 */
    'CC',
    'Speicherort',
    'LDAP-Attribut',
    'Ansichten',
    NULL,
    'Ansichtname',
    'Neue Ansicht',
    'Ansicht "%1"',
    'Keine Ansicht',
    'Setzen',
    /* 1270 */
    'Spalten',
    'Warnung',
    'Information',
    'Fehler',
    'Frage',
    'Ausrichtung',
    'links',
    'zentriert',
    'rechts',
    'Dienst ist nicht verfügbar von %1 bis %2 (%3)',
    /* 1280 */
    'Alle mir Zugeordneten',
    'Alle von mir Erstellten',
    NULL,
    NULL,
    'Exportieren',
    'Unteranfrage',
    'Unteranfrage erstellen',
    'Unteranfrage hinzufügen',
    'Unteranfrage entfernen',
    'Unteranfrage-ID',
    /* 1290 */
    'Unteranfrage wird "%1" hinzugefügt.',
    'Unteranfrage wird von "%1" entfernt.',
    'Berechtigt, um Unteranfragen hinzuzufügen',
    'Berechtigt, um Unteranfragen zu entfernen',
    'Benachrichtigen, wenn Unteranfrage hinzugefügt wird',
    'Benachrichtigen, wenn Unteranfrage entfernt wird',
    'Erstellte Anfragen',
    'Geschlossene Anfragen',
    'Vertraulich',
    'Vertraulichen Kommentar hinzufügen',
    /* 1300 */
    'Berechtigt, um vertrauliche Kommentare hinzuzufügen und zu ändern',
    'Vertraulicher Kommentar wird hinzugefügt.',
    'Oberanfrage-ID',
    'Abhängigkeit',
    NULL,
    'Trennlinie hinzufügen',
    'CSV-Trennzeichen',
    'CSV-Kodierung',
    'CSV-Zeilenumbruch',
    NULL,
    /* 1310 */
    'Filter aktivieren',
    'Filter deaktivieren',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    'Alle erweitern',
    /* 1320 */
    'Alle reduzieren',
    NULL,
    'L.E.',
    'Erlaubte Werte als regulärer Ausdruck (PCRE)',
    'Suchmuster (PCRE) zum Umwandeln von Zusatzinformationen',
    'Ersetzungsmuster (PCRE) zum Umwandeln von Zusatzinformationen',
    'Standardmäßig nächster Zustand',
    'Zurückgestellte Anfragen',
    'Alle anzeigen',
    'Nur Aktive anzeigen',
    /* 1330 */
    'Ereignis',
    NULL,
    'Gastzugriff',
    'Keiner.',
    'Global gruppen',
    'Gast',
    'Importieren',
    'Berechtigt, um Anfragen zu löschen',
    NULL,
    'Voreinstellung Sprache',
    /* 1340 */
    'Maximales Passwortalter (Tage)',
    'Sitzungsende nach Inaktivität (Minuten)',
    'LDAP-Aufzählung',
    'PostgreSQL',
    'Liste an Indizes',
    'Liste an Werten',
    'Erstellt am',
    'Als gelesen markieren',
    'Registriert',
    'TLS',
    /* 1350 */
    'Kompression',
    'L.S.',
    'Kommentare',
    'Größe',
    'Erscheinungsbild',
    'CSV',
    'Einschalten',
    'Ausschalten',
    'Vorschau',
    'Eigentümer',
    /* 1360 */
    'Jeder.',
    'Als ungelesen markieren',
    'Übergeordnete Zugriffe',
);

?>
