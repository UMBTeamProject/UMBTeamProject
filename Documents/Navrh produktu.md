%Bee - Task manager
%... pracovať ako včelička :)
%Roman Mátyus

#Motivácia

Stále väčšie množstvo ľudí pracuje *na voľnej nohe* - freelancing. Takto pracujúci človek má často veľké množstvo zamestnávateľov, pre zamestnávateľov pracuje na viac ako jednom projekte a vrámci každého projektu rieši väčšie množstvo úloh. Čiastkové úlohy je potrebné niekdy outsourcovať - zveriť inému kolegovi a výsledok práce odkontrolovať.

Tento prístup k práci je náročný na interakcie a je zložité držať si o všetkom prehľad.

Navrhovaná služba by mala zmienené problémy riešiť.

#Cieľ projektu

Vytvoriť správcu úloh členov tímov. Správca má byť orientovaný na potreby freelancerov - každý člen môže pracovať na rôznych projektoch a tímy sa môžu prelínať.

Každý používateľ môže byť v neobmedzenom počte tímov (projektov) a zadania od ktoréhokoľvek spolupracovníka v tíme dostávať a aj prideľovať.

#Funkcionalita

V ďalších podkapitolách je rozpísaná funkcionalita podla funkčných jednotiek s ich vlastnými zobrazeniami alebo akciami.

Funkcionalita je úplne základná a jednoduchá. Rozšírenie funkcionality bude prebiehať až neskôr.

##Používateľ

###Registrácia

Pri registrácií je vyžadovaný iba kontaktný mail a heslo. Nič viac. Zložitá registrácia odrádza potenciálnych používateľov.

###Prihlásenie

Prihlásenie prostredníctvom mailu a hesla.

###Profil

Profil bude obsahovať:

- Celé meno
- O mne
- Referencie
- Schopnosti/zručnosti

###Úprava profilu

###Odhlásenie

##Projekt

###Vytvorenie

- Názov
- Popis

###Pozvať do projektu

Správca projektu môže do projektu pozývať nových členov.

###Prihlásiť sa do projektu

Používateľ mimo projektu sa môže prihlásiť do projektu. K prihláseniu dôjde až po schválení prihlášky správcom projektu.

###Členovia

Obsahuje členov tímu aj používateľov ktorí sú ešte iba pozvaný alebo sa snažia do projektu prihlásiť.

##Úloha

Úloha reprezentuje jedno zadanie v projekte.

###Vytvoriť úlohu

- Názov
- Popis
- Pridelený pracovník (člen tímu)

Úloha sa vytvorí so stavom "Nová"

###Zoznam úloh

###Zmeniť stav na *Rozpracovaná*

Stav nastavuje pracovník, ktorý má úlohu pridelenú, keď začína na úlohe pracovať.

###Zmeniť stav na *Spracovaná*

Stav nastavuje pracovník, ktorý má úlohu pridelenú, keď je podla neho práca hotová.

###Zmeniť stav na *Overená*

Stav nastavuje pracovník, ktorý úlohu pridelil ak je s výsledkom práce spokojný. Týmto práca na úlohe končí.

###Zmeniť stav na *Nutné prepracovať*

Stav nastavuje pracovník, ktorý úlohu pridelil ak je nutné prácu opraviť.

##Komentár

Ku každej úlohe je možné pridávať komentáre - diskutovať o zadaní.

###Nový komentár

###Zoznam komentárov

Zoznam komentárov pod úlohou.

#Dátová štruktúra

##User

- id
- email
- username
- password
- name
- about_me
- references
- skils
- date

##Project

- id
- name
- description
- owner (FK user.id)
- date

##Project_member

- user_id (FK user.id)
- project_id (FK project.id)

##Task

- id
- name
- description
- project_id (FK project.id)
- owner (FK user.id)
- worker (FK user.id)
- date

##Task_status
- id
- name
- task (FK task.id)
- author (FK user.id)
- date

##Comment

- id
- task (FK task.id)
- author (FK user.id)
- text
- date