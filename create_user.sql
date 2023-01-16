INSERT INTO users (username, password, role)
    VALUES ('Mitch', 'Nielsen', 'gast');

stel we hebben een stuk code bij de login pagina, waar we hun naam en wachtwoord
vragen, dan zal je 2 variabelen hebben, bijvoorbeeld $username en $password.
We gaan er automatisch uit dat ieder nieuw lid een gast is, aangezien we maar 1
admin gaan hebben. dan wordt de code om ze in de database te zetten dus:

INSERT INTO users (username, password, role)
    VALUES ($username, $password, 'gast');