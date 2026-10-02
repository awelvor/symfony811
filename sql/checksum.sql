carte bleue
  
select id, date, libelle, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="septembre2026" 
  order by date;

select id, date, libelle, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="aout2026" 
  order by date;
select id, date, libelle, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="juillet2026" 
  order by date;

select id, date, libelle, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="juin2026" 
  order by date;

select id, date, libelle, credit, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="mai2026" 
  order by date;

select id, date, libelle, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="avril2026" 
  order by date;

select id, date, libelle, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="mars2026" 
  order by date;

select id, date, libelle, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="fevrier2026" 
  order by date;

select id, date, libelle, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="janvier2026" 
  order by date;

select id, date, libelle, debit 
  from bitcoin 
  where compte="cb boursorama" and budget="decembre2025" 
  order by date;



select round(sum(debit),2) 
  from bitcoin 
  where compte="cb boursorama" and budget="septembre2026";
select round(sum(debit),2) 
  from bitcoin 
  where compte="cb boursorama" and budget="mai2026";
select round(sum(debit),2) 
  from bitcoin 
  where compte="cb boursorama" and budget="janvier2026";
select * from bitcoin
  where compte="cc boursorama" and budget="aout2026"
  order by date;
select * from bitcoin
  where compte="cc boursorama" and date between '2026-08-01' and '2026-08-31' and budget="virement"
  order by date;
