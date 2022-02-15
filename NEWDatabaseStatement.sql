SELECT gericht.GerichtID gericht.nutzer_NutzerID, nutzer.NutzerID, nutzer.User
        FROM gericht
        INNER JOIN nutzer ON gericht.nutzer_NutzerID=nutzer.NutzerID
        WHERE 1 = gericht.GerichtID;