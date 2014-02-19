#UMB Team Project

Tímový projekt UMB 2014.

##Cieľ

Do konca semestra vytvoriť jednoduchý produkt podla vymysleného zadania.

Výsledná služba bude obsahovať aspoň základnú dokumentáciu pre použitie (článok, video používania, ...).

Produkt bude aspoň trochu užitočný a použiteľný - v produkčnom nasadení (aspoň beta verzia).

V ideálnom prípade by malo zadanie pochádzať z nejakej firmy - reálny problém.

##Organizácia

###Scrum

Vývoj bude riadený metódou [Scrum](http://www.infoq.com/resource/news/2010/01/kanban-scrum-minibook/en/resources/KanbanAndScrum-Slovak.pdf). Takže krátke iterácie s maximálnym možným prínosom pre *používateľa*. Vzhľadom na krátky čas na vyriešenie projektu je nutné vojsť sa maximálne do štyroch iterácií s dĺžkou jedného týždňa.

Ako *team leader* budem zastávať dve z troch rolí pri vývoji produktu:

- Produktový vlastník (zodpovedný za víziu a priority),
- Scrum master (odstraňuje problémy a sleduje proces).

Zvyšný členovia budú mať rolu Tím (implementuje produkt).

Toto rozdelenie nebude 100% striktné. Členovia tímu sa budú podieľať aj na návrhu projektu a ja aj na implementácií.

###Párové programovanie

V rámci riešenia tímového projektu budeme preferovať [Párové programovanie](http://cs.wikipedia.org/wiki/Extr%C3%A9mn%C3%AD_programov%C3%A1n%C3%AD#P.C3.A1rov.C3.A9_programov.C3.A1n.C3.AD). Nemusí sa jednať iba o programovanie. V pároch (minimálne) by bolo vhodné riešiť všetky úlohy. Dôsledkom je premyslenejší návrh a menej vyčerpávajúca práca. *Viac hláv, viac rozumu.*

###Časová náročnosť

Všetci toho asi máme veľa iného a zostáva nám málo chuti venovať sa školskému projektu.

Splneniu projektu by sa každý člen tímu mal venovať maximálne 4 týždne po 4 hodiny. Je to relatívne dosť času (vzhľadom na iné predmety), tak túto časovú investíciu využime na vlastný rast.

Píšte si koľko času na projekte trávite a ako. Nie, nie je to preto že by nám niekto chcel čas preplatiť alebo že by boli (časovo) aktívnejší členovia lepšie hodnotený:) Považujem to za vhodné čisto z dôvodu štatistiky celkovej časovej náročnosti projektu. V ideálnom prípade použite nejaký *time tracker*. Bude možné analyzovať aj denné doby práce a podobne. Časy som začal písať do súboru `TimeTracker.md`.

###Coding standard

Všetky zdrojové kódy programu budú formátované podla zvoleného štandardu. V prípade zvolenia implementačného jazyka PHP bude dodržiavaný [Nette Coding Standard](http://doc.nette.org/en/2.1/coding-standard). Pri nedodržaní štandardu by v kóde vznikal chaos a nekonzistencia vzhľadu. Prezentujme sa na úrovni;)

Premenné, metódy, triedy komentáre a pod. (proste celý zdroják) budú v angličtine. *Nič nepôsobí horšie ako podivný mix slovensko-anglických premenných s anglickými funkciami.*

###Testy

Pri programovaní si vyskúšame [Test-driven development](http://en.wikipedia.org/wiki/Test-driven_development). Každá funkcia by mala mať svoj automatizovaný test, ideálne pred programovaním samotnej funkcionality.

###Dokumentácia

Dokumentácia k projektu sa bude nachádzať v priečinku *doc* v koreňovom adresári projektu. Formátovanie textov bude zabezpečovať syntax [Markdown](http://daringfireball.net/projects/markdown/syntax) rovnako ako je tomu pri tomto texte.

Pridávané fukcie by mali mať svoju dokumentáciu ideálne pripojenú priamo k zdrojovému kódu a testom.

###GitHub

Samotný vývoj bude organizovaný na serveri GitHub. Je to služba priamo určená na organizáciu vývoja softvérových produktov.

####Git

Systém Git je nosnou časťou projektu GitHub. Git je verzovací systém na správu (nie len) zdrojových kódov. Odporúčam aspoň zbežne preštudovať knihu [ProGit](http://knihy.nic.cz/files/nic/edice/scott_chacon_pro_git.pdf).

Každý člen tímu si na GitHube vytvorí účet a pod ním bude do projektu prispievať.

####Issue tracker

Veľmi užitočný nástroj pre správu hlásení o chybách, návrhoch na vylepšenia, diskusie a podobne.

Všetky diskusie o projekte prosím smerujte sem a nie na facebook a podobne.

###Stretnutie

Osobné stretnutie *pri pive* nenahradí žiadna online diskusia:) Preto som presvedčený o nutnosti sa stretnúť, prediskutovať potrebné náležitosti a prípadne začať aj pracovať. Čím skôr. Úplne každý má do projektu čím prispieť! Z produkt z ďaleka nie je iba *zdroják*.

####Náplň prvého stretnutia

- Stretnúť sa pri pive! :)
- Zistiť schopnosti, skúsenosti a ochotu členov tímu.
- Zozbierať problémy ktoré by produkt mohol riešiť.
- Vybrať realizovateľný problém.
- Detailne charakterizovať podstatu problému.
- Navrhnúť riešenia problému.
- Vybrať vhodné riešenie.
- Navrhnúť rozhranie.
- Zvoliť platformu.
- Navrhnúť postup pridávania funkcionality.
- Rozdeliť prácu.
- Voľný pokec a rozchod.

####Náplň druhého a ďalšieho stretnutia

- Stretnúť sa pri pive! :)
- Zhrnutie práce jednotlivých čiastkových tímov.
- Miniprezentácia niektorích členov tímu o (hlavne relevantných) technológiách, postupoch, skúsenostiach a pod. (voliteľne podla záujmu prezentujúcich a účastníkov)
- Naplánovanie ďalšej práce - upravenie plánov podla úspechu realizácie.
- Voľný pokec a rozchod.

##Spolupráca

Keďže máme na tímovom projekte pracovať ako tím, mali by sme naplno spolupracovať. Týmto zároveň ponúkam svoje vedomosti a skúsenosti všetkým ostatným členom tímu. Rovnako rád sa čokoľvek od kohokoľvek naučím!

##Motivácia

Snažil som sa nájsť dôvod, prečo by sme sa mali do tohoto projektu v skutočnosti pustiť. V piataku je asi každému jedno či dostane A alebo E:)

Skutočný prínos pre členov tímu:

- Otestovanie vlastných možností.
- Zistenie vhodnosti na prácu v tíme.
- Vyskúšanie nie celkom bežných techník práce (Scrum, Párové programovanie, TDD, ...).
- Prakticky posledná príležitosť naučiť sa niečo od spolužiakov.
- Referencia pre prípadného zamestnávateľa. Nie je to síce *skutočná* práca, ale môže to byť dobrá skúsenosť.

##Licencia

Licencia produktu a vlastne všetkej odpracovanej práce je MIT. Na zdrojovom kóde môže v budúcnosti ktokoľvek vytvoriť komerčnú službu alebo ich akokoľvek použiť. Pri takomto projekte nemá zmysel aby sa každý *hral na vlastnom piesočku*.

##Pripomienky

Celý tento dokument je písaný tak, ako aktuálne chcem aby spolupráca prebiehala. To nič nemení na tom, že som plne otvorený konštruktívnej kritike a nápadom. Prakticky nič z toho čo som sem napísal, nemusí byť vo výsledku takto. Záleží od spoločnej dohody. Tím by sa mal *tak nejak* samoorganizovať a práca prebiehať kontinuálne kvôli osobnej motivácií. *Tomu by rozhodne pomohla výplata:)*

Ak máš nejaké pripomienky k samotnému vedeniu projektu/tímu, sem s nimi. Zväčša som *vlk samotár* a nikdy som takto rozsiahly tím neviedol. Za návrhy na zlepšenie budem vďačný.

**Prosím o spätnú väzbu! S čím (ne)súhlasíš, čo by sa dalo navrhnúť lepšie, aký projekt zvoliť, koľko času si ochotný projektu venovať, aká je tvoja motivácia, aký programovací jazyk preferuješ?**