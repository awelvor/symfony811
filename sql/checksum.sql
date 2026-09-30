carte bleu
select id, date, libelle, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="septembre2026" 
  order by date;

select id, date, libelle, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="aout2026" 
  order by date;
select round(sum(debit),2) 
  from bitcoin 
  where compte="cb boursorama" and budget="aout2026";
select * from bitcoin
  where compte="cc boursorama" and budget="aout2026"
  order by date;
select * from bitcoin
  where compte="cc boursorama" and date between '2026-08-01' and '2026-08-31' and budget="virement"
  order by date;
