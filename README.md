# searchRecords

Język: PHP, Mysql 
Framework: Laravel lub Symfony 

Proszę stworzyć bazę danych a w niej tabelę „records”.
W tabeli tej znajdą się kolumny id, title, description, created_at. 
Proszę wypełnić tabelę losowymi danymi (około 100 rekordów). Następnie trzeba napisać wyszukiwarkę, która wyszuka po id, title, description, created_at dane rekordy i zwróci je w postaci tablicy json. Frontend nie jest konieczny, wystarczy samo zapytanie api.
Request powinien działać w taki sposób aby wyszukiwanie po wyżej wspomnianych polach było uzależnione od przesłanego parametru (przykład na końcu). W wiadomości zwrotnej z kodem proszę o info jaki request wysłać aby otrzymać wynik. Proszę pamiętać że tabela razem z rekordami powinna dać się łatwo zainstalować osobie która będzie sprawdzała zadanie.
Oceniany będzie sposób wykonania i jakość kodu.

Przykład:
127.0.0.1:8000?title=”test”&description=”opis” – ten request ma wyszukać rekordy które zawierają w title słowo „test” i w description słowo „opis”. Słowo to może wystąpić na początku, w środku lub na końcu. Może być również fragmentem wyrazu.

Zachęcam do korzystania z serwisów, interfejsów, repozytoriów.

# setup
1) git clone https://github.com/DamianKilian/searchRecords.git
2) php bin/console doctrine:database:create
3) php bin/console doctrine:migrations:migrate
4) php bin/console doctrine:fixtures:load

Parametry get wyglądają następująco: /?id=1&title=record%200&description=elit&created_at=2021-11-21
