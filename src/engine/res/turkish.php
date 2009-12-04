<?php

/**
 * Localization
 *
 * This module contains prompts translated in Turkish.
 * All the prompts are in ISO-8859-9 encoding.
 *
 * @package Engine
 * @subpackage Localization
 * @author Muhammet Kara
 */

//--------------------------------------------------------------------------------------------------
//
//  eTraxis - Records tracking web-based system.
//  Copyright (C) 2008-2009 by Artem Rodygin
//
//  This program is free software; you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation; either version 2 of the License, or
//  (at your option) any later version.
//
//  This program is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License along
//  with this program; if not, write to the Free Software Foundation, Inc.,
//  51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
//
//--------------------------------------------------------------------------------------------------
//  Author                  Date            Description of modifications
//--------------------------------------------------------------------------------------------------
//  Muhammet Kara           2008-04-11      new-692: Turkish localization.
//  Muhammet Kara           2008-04-30      bug-699: Views // Names of custom columns are duplicated in the list of available columns, when there are two fields of different types with the same name.
//  Muhammet Kara           2008-05-01      new-715: Show creation time in the list of records.
//  Muhammet Kara           2008-08-14      new-729: [SF2008579] Mark all records as read
//  Muhammet Kara           2008-11-13      new-749: Guest access for unauthorized users.
//  Muhammet Kara           2009-01-09      new-774: 'Anyone' system role permissions.
//  Artem Rodygin           2009-04-12      bug-806: German translation causes two ambiguous "zuruck" buttons.
//  Artem Rodygin           2009-04-26      new-817: Field permissions dialog refactoring.
//  Artem Rodygin           2009-04-26      new-818: Change buttons layout on viewing record page.
//--------------------------------------------------------------------------------------------------

$resource_turkish = array
(
    RES_SECTION_ALERTS =>
    /* 200 */
    'Gerekli olarak i�aretlenmi� t�m alanlar doldurulmal�d�r.',
    'Varsay�lan de�er, %1 ile %2 aras�nda olmal�d�r.',
    'Hesap kapal�.',
    'Hesap kilitli.',
    'Ge�ersiz kullan�c� ad�.',
    'Girilen kullan�c� ad�yla bir hesap zaten var.',
    'Ge�ersiz e-posta.',
    'Parolalar uyu�muyor.',
    'Parola en az %1 karakter uzunlu�unda olmal�d�r.',
    'Girilen adda bir proje zaten var.',
    /* 210 */
    'Girilen adda bir grup zaten var.',
    'Girilen ad ya da �n ekle bir �ablon zaten var.',
    'Girilen ad ya da k�saltmayla bir durum zaten var.',
    'Girilen adda bir alan zaten var.',
    'Ge�ersiz tam say� de�eri.',
    'Tam say� de�eri %1 ile %2 aras�nda olmal�d�r.',
    '"%1" de�eri %2 ile %3 aras�nda olmal�d�r.',
    'En y�ksek de�er, en d���k de�erden daha b�y�k olmal�d�r.',
    'Y�klenen dosya "php.ini"deki "upload_max_filesize" y�nergesini a��yor.',
    'Y�klenen dosyan�n boyutu %1 Kbytetan daha b�y�k olamaz.',
    /* 220 */
    'Y�klenen dosya sadece k�smen y�klenmi�.',
    'Hi� dosya y�klenmedi.',
    'Ge�ici bir klas�r eksik.',
    'Girilen adda bir ek zaten var.',
    'Kay�t bulunamad�.',
    'Girilen adda bir filtre zaten var.',
    'Ge�ersiz tarih de�eri.',
    'Tarih de�eri %1 ile %2 aras�nda olmal�d�r.',
    'Ge�ersiz saat de�eri.',
    'Saat de�eri %1 ile %2 aras�nda olmal�d�r.',
    /* 230 */
    'Girilen adda bir abonelik zaten var.',
    'Girilen adda bir hat�rlat�c� zaten var.',
    'Hat�rlat�c� ba�ar�yla g�nderildi.',
    'Girilen adda bir g�r�n�m zaten var.',
    'Girilen adda bir s�tun zaten var.',
    'Dosyan�n diske yaz�m� ba�ar�s�z oldu.',
    'Dosya y�klemesi bir uzant� taraf�ndan durduruldu.',
    'JavaScript etkin olmal�d�r.',
    'Bu otomatik bir mesajd�r, l�tfen yan�tlamay�n�z.',
    'Belirtilen alt kay�t zaten var.',
    /* 240 */
    'Girilen adda bir filtreler k�mesi zaten var.',
    'G�r�n�m�n s�tun say�s� %1 den fazla olamaz.',
    '"%1" de�eri bi�im kontrol�n� ge�emedi.',
    'Kullan�c� yetkili de�il.',
    'Bilinmeyen kullan�c� ad� ya da yanl�� parola.',
    'Bilinmeyen kimlik do�rulama tipi.',
    'Bilinmeyen hata.',
    'XML ayr��t�r�c� hatas�.',
    'Veri taban� ba�lant� hatas�.',

    RES_SECTION_CONFIRMS =>
    /* 300 */
    'Se�ile t�m g�r�n�mleri silmek istedi�inizden emin misiniz?',
    'Bu hesab� silmek istedi�inizden emin misiniz?',
    'Bu projeyi silmek istedi�inizden emin misiniz?',
    'Bu grubu silek istedi�inizden emin misiniz?',
    'Bu �ablonu silmek istedi�inizden emin misiniz?',
    'Bu durumu silmek istedi�inizden emin misiniz?',
    'Bu alan� silmek istedi�inizden emin misiniz?',
    'Bu kayd� ertelemek istedi�inizden emin misiniz?',
    'Bu kayd� devam ettirmek istedi�inizden emin misiniz?',
    'Bu kayd� atamak istedi�inizden emin misiniz?',
    /* 310 */
    'Se�ilen t�m filtreleri silmek istedi�inizen emin misiniz?',
    'Se�ilen t�m abonelikleri silmek istedi�inizden emin misiniz?',
    'Bu hat�rlat�c�y� g�ndermek istedi�inizden emin misiniz?',
    'Bu hat�rlat�c�y� silmek istedi�inizden emin misiniz?',
    'Bu s�tunu silmek istedi�inizden emin misiniz?',
    '��kmak istedi�inizden emin misiniz?',
    'Se�ilen t�m filtre k�melerini silmek istedi�inizden emin misiniz?',
    'Bu kayd� silmek istedi�inizden emin misiniz?',

    RES_SECTION_PROMPTS =>
    /* 1000 */
    'T�rk�e',
    'Giri�',
    '  Tamam  ',
    'Vazge�',
    'Kaydet',
    'Geri',
    '�leri',
    'Olu�tur',
    'De�i�tir',
    'Sil',
    /* 1010 */
    'Kay�tlar',
    'Hesaplar',
    'Projeler',
    'Parolay� de�i�tir',
    '"%1" durumunun alanlar�',
    'yok',
    'Toplam:',
    'parolay� kaydet',
    'Hesap bilgileri',
    'Kullan�c� ad�',
    /* 1020 */
    'Tam ad�',
    'E-posta',
    'Haklar',
    'y�netici',
    'kullan�c�',
    'Tan�m',
    'Parola',
    'Do�rulama',
    'kapal�',
    'kilitli',
    /* 1030 */
    'Yeni hesap',
    '"%1" hesab�',
    'Proje bilgileri',
    'Proje ad�',
    'Ba�lama zaman�',
    'ask�da',
    'Yeni proje',
    '"%1" Projesi',
    'Gruplar',
    'Grup bilgileri',
    /* 1040 */
    'Grup ad�',
    'Yeni grup',
    '"%1" grubu',
    '�yelik',
    'Di�erleri',
    '�yeler',
    '�ablonlar',
    '�ablon bilgileri',
    '�ablon ad�',
    '�n ek',
    /* 1050 */
    'Yeni �ablon',
    '"%1" �ablonu',
    'Durumlar',
    'Durum bilgileri',
    'Durum ad�',
    'K�saltma',
    'Durum tipi',
    'ilk',
    'orta',
    'son',
    /* 1060 */
    'Sorumlu',
    'de�i�meden kalan',
    'ata',
    'kald�r',
    'Yeni durum',
    '"%1" Durumu',
    'Orta olu�tur',
    'Sonu� olu�tur',
    'Ge�i�ler',
    '�zinler',
    /* 1070 */
    '�lk yap',
    '�zin Verilen',
    'Alanlar',
    'Alan bilgileri',
    'S�ra',
    'Alan ad�',
    'Alan tipi',
    'numara',
    'dizge',
    '�ok sat�rl� metin',
    /* 1080 */
    'Gerekli',
    'evet',
    'hay�r',
    'Min.de�er',
    'Maks.de�er',
    'Maks.uzunluk',
    'gerekli',
    'Yeni alan (ad�m: %1/%2)',
    '"%1" Alan�',
    'salt-okunur',
    /* 1090 */
    'okuma ve yazma',
    'Genel bilgiler',
    'ID',
    'Proje',
    '�ablon',
    'Durum',
    'D�nem',
    'Yeni kay�t (ad�m: %1/%2)',
    '"%1" Kayd�',
    'Git',
    /* 1100 */
    'Ge�mi�',
    'Ertele',
    'Devam Ettir',
    'Ata',
    'Durum de�i�tir',
    'Tarih bilgisi',
    '��karan',
    'Kay�t, "%1" durumunda olu�turuldu.',
    'Kay�t, atand�: %1.',
    'Kay�t de�i�tirildi.',
    /* 1110 */
    'Durum, "%1" olarak de�i�tirildi.',
    'Kay�t, %1 tarihine ertelendi.',
    'Kay�t devam ettirildi.',
    '"%1" dosyas� eklendi.',
    '"%1" dosyas� kald�r�ld�.',
    'kay�tlar olu�turma izni',
    'kay�tlar� de�i�tirme izni',
    'kay�tlar� erteleme izni',
    'kay�tlar� devam ettirme izni',
    'atanm�� kay�tlar� yeniden atama izni',
    /* 1120 */
    'atanm�� kay�tlar�n durumunu de�i�tirme izni',
    'dosyalar ekleme izni',
    'dosyalar� kald�rma izni',
    'Dil',
    'Yorum ekle',
    'Yorum eklendi.',
    'yorumlar ekleme izni',
    'Yorum',
    'Dosya ekle',
    'Dosyay� kald�r',
    /* 1130 */
    'Ek',
    'Ek ad�',
    'Ekli dosya',
    'Ekler',
    'Alan yok.',
    'Kritik d�nem',
    'Dondurulmu� zaman',
    'De�i�en',
    'Eski de�er',
    'Yeni de�er',
    /* 1140 */
    'onay kutusu',
    'kay�t',
    'liste',
    '�geleri listele',
    '%1 Kb',
    'Filtreler',
    'Filtre ad�',
    'T�m projeler',
    'T�m �ablonlar',
    'T�m durumlar',
    /* 1150 */
    'Kayd� g�ster',
    'Sadece �unun taaf�ndan olu�turulanlar: ...',
    'Sadece �una atananlar: ...',
    'sadece kapanmam��lar� g�ster',
    'Konu',
    'Ara',
    'Arama parametreleri',
    'Arama sonu�lar� (filtrelendi)',
    'Aranacak metin',
    'alanlarda ara',
    /* 1160 */
    'yorumlarda ara',
    'Durum',
    'aktif',
    'Abonelikler',
    'kay�t olu�turuldu�u zaman haber ver',
    'kay�t atand��� zaman haber ver',
    'kay�t de�i�tirildi�i zaman haber ver',
    'durum de�i�tirildi�i zaman haber ver',
    'kay�t ertelendi�i zaman haber ver',
    'kay�t devam ettirildi�i zaman haber ver',
    /* 1170 */
    'yorum eklendi�i zaman haber ver',
    'dosya eklendi�i zaman haber ver',
    'dosya kald�r�ld��� zaman haber ver',
    'gerekli',
    'Ertelendi',
    'Son tarih',
    'Varsay�lan de�er',
    'a��k',
    'kapal�',
    'Metrik',
    /* 1180 */
    'A��lan kay�tlar',
    'Kapanma\'ya kar�� Olu�turma',
    'hafta',
    'numara',
    'Klonla',
    'Kay�t, "%1"den klonlanm��.',
    '��k��',
    'kay�t klonland��� zaman haber ver',
    'Ayarlar',
    'Sayfa ba��na sat�rlar',
    /* 1190 */
    'Sayfa ba��na yer imleri',
    'Kilitle',
    'Kilidi A�',
    'Grup tipi',
    'global',
    'yerel',
    'Yap�land�rma',
    'Yerel k�k yolu',
    'Web k�k yolu',
    'G�venlik',
    /* 1200 */
    'En az parola uzunlu�u',
    'En fazla giri� denemeleri say�s�',
    'Kilitleme zaman a��m� (dak.)',
    'Veri taban�',
    'Veri taban� tipi',
    'Oracle',
    'MySQL',
    'Microsoft SQL Server',
    'Veri taban� sunucu',
    'Veri taban� ad�',
    /* 1210 */
    'Veri taban� kullan�c�s�',
    'Aktif Dizin',
    'LDAP sunucu',
    'Port numaras�',
    'Hesap ara',
    'Temel DN',
    'Y�neticiler',
    'E-posta bildirimleri',
    'En fazla boyut',
    'Hata ay�kla',
    /* 1220 */
    'Hata ay�klama kipi',
    'etkinle�tirildi (�zel veriler olmaks�z�n)',
    'etkinle�tirildi (t�m veriler)',
    'Hata ay�klama g�nl�kleri',
    'Etkinle�tirildi',
    'Etkisizle�tirildi',
    '%1 dak',
    'sadece kay�tlar� g�r�nt�leme izni',
    'T�m�n� se�',
    'Yazar',
    /* 1230 */
    'tarih',
    's�re',
    'sadece ertelenmi� olanlar� g�ster',
    'Abonelik ad�',
    'Olaylar',
    'S�r�m: %1',
    'rol',
    'Abone ol',
    'Abonelikten ayr�l',
    'Hat�rlat�c�lar',
    /* 1240 */
    'Hat�rlat�c� ad�',
    'Hat�rlat�c�n�n konusu',
    'Hat�rlat�c�y� alacaklar',
    'Yeni hat�rlat�c� (ad�m: %1/%2)',
    '"%1" Hat�rlat�c�s�',
    'hat�rlat�c�lar g�nderme izni',
    'G�nder',
    'Yeni filtre',
    '"%1" Filtresi',
    'Yeni abonelik',
    /* 1250 */
    '"%1" Aboneli�i',
    'LDAP parolan�z',
    '"rec#" ve numaras�n� belirterek (�r: "rec#305") ba�ka bir kayda ba�lant� ekleyebilirsiniz.',
    'Sadece durumlara ta��nanlar� g�ster: ...',
    '�ununla payla�: ...',
    'D��a aktar',
    'Ba�kalar�n� abone yap...',
    'Abone olundu',
    '%1 sizi kayda abone yapt�.',
    '%1 abonelikten ayr�ld�.',
    /* 1260 */
    'Karbon kopya',
    'Bellek',
    'LDAP �zniteli�i',
    'G�r�nt�lemeler',
    'Bilgileri g�r�nt�le',
    'Ad� g�r�nt�le',
    'Yeni g�r�nt�leme (ad�m: %1/%2)',
    '"%1" G�r�n�m�',
    'G�r�n�m yok',
    'Ayarla',
    /* 1270 */
    'S�tunlar',
    'S�tun bilgileri',
    'S�tun ba�l���',
    'Yeni s�tun',
    '"%1" S�tunu',
    'Hizalama',
    'sol',
    'orta',
    'sa�',
    '%1 ile %2 aras�nda hizmet verilemeyecektir (%3)',
    /* 1280 */
    'Bana atananlar�n t�m�',
    'Benim taraf�mdan olu�turulanlar�n t�m�',
    'T�m�n�n se�imini kald�r',
    'm/d/yyyy',
    '��p',
    'Alt kay�tlar',
    'Alt kay�t olu�tur',
    'Alt kay�t ekle',
    'Alt kayd� kald�r',
    'Alt kay�t kimlik no (ID)',
    /* 1290 */
    '"%1" alt kayd� eklendi.',
    '"%1" alt kayd� kald�r�ld�.',
    'alt kay�tlar ekleme izni',
    'alt kay�tlar� kald�rma izni',
    'alt kay�t eklendi�inde haber ver',
    'alt kay�t kald�r�ld���nda haber',
    'olu�turulan kay�tlar',
    'kapat�lan kay�tlar',
    'Ki�iye �zel',
    'Ki�iye �zel yorum ekle',
    /* 1300 */
    'ki�iye �zel yorumlar ekleme/okuma izni',
    'Ki�iye �zel yorum eklendi.',
    'Ebeveyn kimlik no (ID)',
    'ba��ml�l�k',
    'sakl�',
    'Ayra� ekle',
    'CSV s�n�rlay�c�',
    'CSV kodlama',
    'CSV sat�r sonlar�',
    'Arama sonu�lar� (filtresiz)',
    /* 1310 */
    'Filtreleri etkinle�tir',
    'Filtreleri etkisizle�tir',
    '�u anki filtre k�mesi',
    'Filtre k�mesini kaydet',
    'Filtre k�meleri',
    'Filtre k�mesi ad�',
    '"%1" filtre k�mesi',
    '�u anki g�r�n�m',
    'G�r�n�m� kaydet',
    'T�m�n� geni�let',
    /* 1320 */
    'T�m�n� daralt',
    'Varsay�lanlara s�f�rla',
    'L/E',
    'Alan de�erlerini denetleyecek PCRE',
    'Alan de�erlerini d�n��t�recek PCRE ara',
    'Alan de�erlerini d�n��t�recek PCRE de�i�tir',
    'Varsay�lan olarak sonraki durum',
    'Durumu ertele',
    't�m�n� g�ster',
    'sadece aktif olanlar� g�ster',
    /* 1330 */
    'Olay',
    'Filtre k�mesi yok',
    'Konuk eri�imi',
    'Yok.',
    '',
    'Konuk',
    '��e Aktar',
    'kay�tlar� silme izni',
    'Kimlik do�rulama tipi',
    'Varsay�lan dil',
    /* 1340 */
    'Parola zaman a��m� (g�nler)',
    'Oturum zaman a��m� (dak.)',
    'LDAP numaralamas�',
    'PostgreSQL',
    'numaralar listesi',
    'dizgeler listesi',
    'Olu�turuldu',
    'Okundu olarak i�aretle',
    'Kay�tl�',
);

?>