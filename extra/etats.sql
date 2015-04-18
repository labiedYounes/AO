INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"choices":["Notification"],"dateField":{"displayedString":"Date", "type":"date", "value":null}}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"choices":["Copie du Marché","Visé","Enregistré"]}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"choices":["Ordre de Service"],"dateField":{"displayedString":"Date", "type":"date", "value":null}}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"choices":["Bons de Commande Achat :"],"dateField":{"displayedString":"Date", "type":"date" ,"value":null}}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"delay":{"displayedString":"Délai d’exécution","value":null,"type":"number","suffix":"jours"},"dateField":{"displayedString":"Date Fin d’exécution prévue ", "type":"date", "value":null}}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"choices":["Caution Définitive"],"dateField":{"displayedString":"Date", "type":"date" ,"value":null},"quantity":{"displayedString":"Montant","type":"double" ,"value":null}}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"choices":["Retour Caut.  Prov."] ,"dateField":{"displayedString":"Date", "type":"date" ,"value":null},"quantity":{"displayedString":"Montant","type":"double" ,"value":null}}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"choices":["BL Fournisseurs :  "],"dateField":{"displayedString":"Date", "type":"date" ,"value":null}}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"choices":["Bon de Livraison","Daté","Signé"]}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"choices":["PV de RP"], "dateField":{"displayedString":"Date", "type":"date" ,"value":null}}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"choices":["Caution R.G	"], "dateField":{"displayedString":"Date", "type":"date" ,"value":null},"quantity":{"displayedString":"Montant","type":"double" ,"value":null}}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"choices":["Facture (Décompte) ","Signé"]}');
INSERT into etat(displayedString,modelEtats_id,valuesArray) values('',2,'{"dateField":{"displayedString":"Date", "type":"date" ,"value":null}, "quantity":{"displayedString":"N°","type":"number" ,"value":null}');
INSERT into etat(displayedString,modelEtats_id,orderNum,valuesArray) values('soumission',1,1,'{"type":"choice","label":"Soumission","options":{"choices":["Oui ","Non"],"checked":null}}');
INSERT into etat(displayedString,modelEtats_id,orderNum,valuesArray) values('si non Motif',1,2,'{"type":"text","label":"Si non","text":null}');
INSERT into etat(displayedString,modelEtats_id,orderNum,valuesArray) values('avant vente',1,3,'{"type":"choice","label":"Avant vente","options":{"choices":["Oui ","Non"],"checked":null}}');
INSERT into etat(displayedString,modelEtats_id,orderNum,valuesArray) values('soumissionaires',1,4,'{"type":"link","label":"Soumissionnaires","targetEntity":"medaSysAOBundle:entreprise","targetsArray":[]}');
